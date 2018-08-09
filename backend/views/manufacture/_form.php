<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Manufacture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="manufacture-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php if($model->image):?>
        <?= Html::img('/uploads/manufacture/' . $model->image, ['class' => 'backend-preview-img']);?>
    <?php endif;?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'image')->hiddenInput()->label(false);?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
