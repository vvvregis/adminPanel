<?php

namespace backend\controllers;

use Yii;
use common\models\Action;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ActionController implements the CRUD actions for Action model.
 */
class ActionController extends BaseController
{
   public static $modelClass = Action::class;
   public static $urlString = 'action';
}
