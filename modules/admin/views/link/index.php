<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\LinkSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Links';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="link-index">

    <p>
        <?= Html::a('Create Link', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
     <div class="box">
         <div class="box box-body">
             <?= GridView::widget([
                 'dataProvider' => $dataProvider,
                 'filterModel' => $searchModel,
                 'columns' => [
                     ['class' => 'yii\grid\SerialColumn'],
                     'id',
                     'name',
                     'url:url',
                     ['class' => 'yii\grid\ActionColumn'],
                 ],
             ]); ?>
         </div>
     </div>

</div>
