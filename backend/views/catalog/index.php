<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Catalogs';
$this->params['breadcrumbs'][] = $this->title;
$parent = Yii::$app->request->get('parent_id');
?>
<div class="catalog-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Catalog', $parent?['create', 'parent_id' => $parent]:['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'name',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->parent_id == 0) {
                        return Html::a($model->name, ['index', 'parent_id' => $model->id]);
                    } else {
                        return Html::a($model->name, ['products/index', 'parent_id' => $model->parent_id, 'category_id' => $model->id]);
                    }
                },
            ],
            //'parent_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
