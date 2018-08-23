<?php
namespace frontend\controllers;

use common\models\Catalog;
use common\models\Manufacture;
use common\models\Pages;
use common\models\Pivo;
use common\models\Products;
use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        $categories = Catalog::find()->where(['parent_id' => 0, 'public' => 1])->all();
        return $this->render('index', ['categories' => $categories]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            $model->password = '';

            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

    public function actionCatalog($alias)
    {
        $category = Catalog::find()->where(['alias' => $alias])->one();
        if($category) {
            $categoryList = Catalog::find()->where(['parent_id' => $category->id])->all();
            return $this->render('catalog', ['categoryInfo' => $category, 'categoryList' => $categoryList]);
        }
        return null;

    }

    public function actionSubcategory($alias)
    {
        $category = Catalog::find()->where(['alias' => $alias])->one();
        if($category) {
            $manufactures = Products::find()
                ->select('manufacture.id as m_id, manufacture.name as m_name, manufacture.image as m_image')
                ->leftJoin('manufacture', 'products.manufacture_id = manufacture.id')
                ->where(['products.public' => 1, 'products.category_id' => $category->id])
                ->groupBy('products.manufacture_id')
                ->all();

            return $this->render('subcategory', ['categoryInfo' => $category, 'categoryList' => $manufactures]);
        }
        return null;
    }

    public function actionProducts($alias, $manufacture_id)
    {
        $category = Catalog::find()->where(['alias' => $alias])->one();
        if($category){
            $products = Products::find()
                ->where(['category_id' => $category->id, 'manufacture_id' => $manufacture_id, 'public' => 1])
                ->all();

            return $this->render('products', ['categoryInfo' => $category, 'products' => $products]);
        }
        return null;
    }

    public function actionProduct($alias)
    {
        $product = Products::find()->where(['alias' => $alias, 'public' => 1])->one();
        return $this->render('product', ['product' => $product]);
    }

    public function actionAddToCart()
    {
        $qty = Yii::$app->request->post('qty');
        $productId = Yii::$app->request->post('id');
        $product = Products::find()->where(['id' => $productId])->one();

        if($product) {
            $cartElement = Yii::$app->cart->put($product, $qty, []);
            $elements = Yii::$app->cart->elements;
            $response['error'] = false;
            $response['count'] = count($elements);
        } else {
            $response['error'] = true;
            $response['msg'] = 'Данного товара не существует';
        }

        return json_encode($response);

    }

    public function actionCart()
    {
        $productsInCart = Yii::$app->cart->elements;
        return $this->render('cart', ['productsInCart' => $productsInCart]);
    }

    public function actionPage($alias)
    {
        $page = Pages::find()->where(['alias' => $alias, 'public' => 1])->one();
        return $this->render('page', ['page' => $page]);
    }
}
