<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Catalog */

$this->title = 'Создать категорию каталога';
$this->params['breadcrumbs'][] = ['label' => 'Категории каталога', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
