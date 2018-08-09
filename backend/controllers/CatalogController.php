<?php

namespace backend\controllers;

use common\models\Catalog;
use yii\data\ActiveDataProvider;

/**
 * CatalogController implements the CRUD actions for Catalog model.
 */
class CatalogController extends BaseController
{
    public static $modelClass = Catalog::class;
    public static $urlString = 'catalog';

    /**
     * Lists all Entity models.
     * @param $parent_id integer
     * @return mixed
     */
    public function actionIndex($parent_id = 0)
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Catalog::find()->where(['parent_id' => $parent_id]),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
