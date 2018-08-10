<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Catalog */
/* @var $form yii\widgets\ActiveForm */
$parent = Yii::$app->request->get('parent_id');
if($parent && $model->isNewRecord){
    $selectParams = ['options' =>[ $parent => ['Selected' => true]]];
} else {
    $selectParams = [];
}
?>

<div class="catalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'parent_id')->dropDownList(\common\models\Catalog::getFirstLevelCategories($model->getPrimaryKey()), $selectParams); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'full'
    ]) ?>

    <?php if($model->image):?>
        <?= Html::img('/uploads/catalog/' . $model->image, ['class' => 'backend-preview-img']);?>
    <?php endif;?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'image')->hiddenInput()->label(false);?>

    <?= $form->field($model, 'public')->checkbox() ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
