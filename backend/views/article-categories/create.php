<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ArticleCategories */

$this->title = 'Создаьб категорию статьи';
$this->params['breadcrumbs'][] = ['label' => 'Категории статей', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-categories-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
