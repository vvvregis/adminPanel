<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = 'Редактирование категории каталога: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категории каталога', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="catalog-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
