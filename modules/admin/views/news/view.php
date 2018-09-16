<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\entities\News */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-view">

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
                    'title',
                    'link',
                    'description',
                    [

                        'attribute'=>'is_active',
                        'value'=>function($model){
                            if($model->is_active)
                                return 'Новость выводится';
                            return 'Новость в буфере';
                        },

                    ],
                    [
                        'attribute'=>'categories',
                        'value'=>function()use($model){
                            /**
                             * @var $model app\entities\News;
                             */
                            return implode(' ,',ArrayHelper::getColumn($model->categories,'title'));
                        }
                    ],
                ],
            ]) ?>
        </div>
    </div>


</div>
