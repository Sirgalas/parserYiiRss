<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\entities\Patterns */

$this->title = 'Create Paterns';
$this->params['breadcrumbs'][] = ['label' => 'Paterns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paterns-create">

    <div class="box">
        <div class="box box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
