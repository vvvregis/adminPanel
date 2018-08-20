<?php
/**
 * Created by PhpStorm.
 * User: stark
 * Date: 20.08.18
 * Time: 11:52
 */

namespace frontend\controllers;


use common\models\News;
use yii\web\Controller;

class NewsController extends Controller
{

    public function actionList()
    {
        $this->layout = false;
        $newsList = News::find()->where(['public' => 1])->all();
        return $this->render('newsList', ['newsList' => $newsList]);
    }


    public function actionIndex($alias)
    {
        $this->layout = false;
        $news = News::find()->where(['public' => 1, 'alias' => $alias])->one();
        return $this->render('news', ['news' => $news]);
    }
}