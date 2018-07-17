<?php

namespace backend\controllers;

use Yii;
use common\models\Article;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ArticleController implements the CRUD actions for Article model.
 */
class ArticleController extends BaseController
{
    public static $modelClass = Article::class;
    public static $urlString = 'article';
}
