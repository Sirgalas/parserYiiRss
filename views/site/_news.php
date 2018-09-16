<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\entities\News */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

?>
<div class="col-md-12">
    <div class="caption">
         <h3 class="center"><?=Html::a($model->title,$model->link); ?></h3>
        <p><?= $model->description; ?></p>
    </div>
</div>
