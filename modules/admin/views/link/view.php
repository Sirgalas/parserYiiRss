<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\entities\Link */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
     <div class="box">
         <div class="box box-body">
             <?= DetailView::widget([
                 'model' => $model,
                 'attributes' => [
                     'id',
                     'name',
                     'url:url',
                     'created_at:datetime',
                     'updated_at:datetime',
                 ],
             ]) ?>
         </div>
     </div>
</div>
