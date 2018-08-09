<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */


if($model->isNewRecord){
    $parent_id = Yii::$app->request->get('parent_id');
    $category_id = Yii::$app->request->get('category_id');
    $selectParams = ['options' =>[ $category_id => ['Selected' => true]]];
} else {
    $parent_id = $model->getParentCatalogId();
    $selectParams = [];
}
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?php if($model->image):?>
        <?= Html::img('/uploads/products/' . $model->image, ['class' => 'backend-preview-img']);?>
    <?php endif;?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'image')->hiddenInput()->label(false);?>

    <?= $form->field($model, 'public')->checkbox() ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'category_id')->dropDownList(\common\models\Catalog::getChildCategories($parent_id), $selectParams) ?>

    <?= $form->field($model, 'manufacture_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\models\Manufacture::find()->all(), 'id', 'name')) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
