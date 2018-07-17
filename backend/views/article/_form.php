<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(
            \yii\helpers\ArrayHelper::map(\common\models\Article::getCategories(),'id','name')
    ); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'public')->checkbox() ?>

    <?php if(!$model->isNewRecord): ?>

        <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'date')->textInput() ?>

    <?php endif;?>

    <?php if($model->image):?>
        <?= Html::img('/uploads/article/' . $model->image, ['class' => 'backend-preview-img']);?>
    <?php endif;?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'image')->hiddenInput()->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
