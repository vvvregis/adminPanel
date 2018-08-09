<?php

namespace backend\controllers;

use Yii;
use common\models\Products;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends BaseController
{
    public static $modelClass = Products::class;
    public static $urlString = 'products';

    /**
     * Lists all Entity models.
     * @param $category_id integer
     * @return mixed
     */
    public function actionIndex($category_id = 0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Products::find()->where(['category_id' => $category_id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $model
     * @return string
     */
    public function createRedirectUrl($model)
    {
        $url = '/admin/products/index?parent_id='.$model->getParentCatalogId().'&category_id='.$model->category_id;
        return $url;
    }
}
