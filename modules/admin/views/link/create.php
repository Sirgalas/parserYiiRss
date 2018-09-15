<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\entities\Link */

$this->title = 'Create Link';
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-create">
   <div class="box">
       <div class="box box-body">
           <?= $this->render('_form', [
               'model' => $model,
           ]) ?>
       </div>
   </div>
</div>
