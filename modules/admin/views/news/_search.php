<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\search\NewsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="news-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'link') ?>

    <?= $form->field($model, 'description') ?>

    <?= $form->field($model, 'author') ?>

    <?php // echo $form->field($model, 'comments') ?>

    <?php // echo $form->field($model, 'enclosure') ?>

    <?php // echo $form->field($model, 'guid') ?>

    <?php // echo $form->field($model, 'pubDate') ?>

    <?php // echo $form->field($model, 'source') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
