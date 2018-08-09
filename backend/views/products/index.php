<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
$category_id = Yii::$app->request->get('category_id');
$parent_id = Yii::$app->request->get('parent_id');
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Products', $category_id && $parent_id?['create', 'parent_id' => $parent_id,'category_id' => $category_id]:['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'title',
            'description',
            'keywords',
            //'text:ntext',
            //'image:ntext',
            //'public',
            //'alias',
            //'category_id',
            //'manufacture_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
