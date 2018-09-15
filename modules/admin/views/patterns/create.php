<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\entities\Patterns */

$this->title = 'Create Paterns';
$this->params['breadcrumbs'][] = ['label' => 'Paterns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paterns-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
