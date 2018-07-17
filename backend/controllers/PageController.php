<?php

namespace backend\controllers;

use Yii;
use common\models\Pages;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * PageController implements the CRUD actions for Pages model.
 */
class PageController extends BaseController
{

    public static $modelClass = Pages::class;
    public static $urlString = 'page';



    /**
     * Creates a new Pages model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Pages();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/admin/page');
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Pages model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect('/admin/page');
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }
}
