<?php

namespace backend\controllers;

use Yii;
use common\models\Manufacture;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ManufactureController implements the CRUD actions for Manufacture model.
 */
class ManufactureController extends BaseController
{
    public static $modelClass = Manufacture::class;
    public static $urlString = 'manufacture';
}
