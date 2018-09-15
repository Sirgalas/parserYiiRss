<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\entities\News */

$this->title = 'Create News';
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-create">
   <div class="box">
       <div class="box box-body">
           <?= $this->render('_form', [
               'model' => $model,
           ]) ?>
       </div>
   </div>
</div>
