<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\entities\Category */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Categories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-view">

   <div class="box">
       <div class="box box-body">
           <?= DetailView::widget([
               'model' => $model,
               'attributes' => [
                   'id',
                   'title',
                   'created_at:datetime',
                   'updated_at:datetime',
               ],
           ]) ?>
       </div>
   </div>


</div>
