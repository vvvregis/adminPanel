<?php

namespace backend\controllers;
use common\models\News;

/**
 * NewsController implements the CRUD actions for News model.
 */
class NewsController extends BaseController
{
    public static $modelClass = News::class;
    public static $urlString = 'news';
}
