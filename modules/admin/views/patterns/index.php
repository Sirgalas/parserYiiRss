<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\PatternsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paterns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paterns-index">

    <p>
        <?= Html::a('Create Paterns', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="box">
        <div class="box box-body">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'id',
                    'text',
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]); ?>
        </div>
    </div>

</div>
