<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use app\entities\Category;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\entities\News */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model,'is_active')->dropDownList(\app\entities\News::$staus) ?>

    <?= $form->field($model, 'categories_ids')->widget(Select2::class, [
    'data' => ArrayHelper::map(Category::getAll(),'id','title'),
    'language' => 'ru',
    'options' => ['placeholder' => 'Выбирите категории'],
    'pluginOptions' => [
        'allowClear' => true,
        'multiple' => true,
    ],
]); ?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
