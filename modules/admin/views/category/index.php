<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categories';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

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
                     'title',

                     ['class' => 'yii\grid\ActionColumn'],
                 ],
             ]); ?>
         </div>
     </div>
</div>
