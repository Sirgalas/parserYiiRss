<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Modal;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\search\NewsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'News';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="news-index">

   <div class="box">
       <div class="box box-body">
           <?= GridView::widget([
               'dataProvider' => $dataProvider,
               'filterModel' => $searchModel,
               'columns' => [
                   ['class' => 'yii\grid\SerialColumn'],

                   'id',
                   'title',
                   [

                     'attribute'=>'is_active',
                     'value'=>function($model){
                        return $model->status;
                     },

                   ],
                   [
                       'attribute'=>'category',
                       'header'=>'Category',
                       'value'=>function($model){
                           /**
                            * @var $model app\entities\News
                            */

                            return implode(',',ArrayHelper::getColumn($model->categories,'title'));
                       }
                   ],
                   ['class' => 'yii\grid\ActionColumn',
                     'template'=>'{update} {delete}',
                        'buttons'=>[
                            'update' => function($url,$model,$key){
                                $btn = Html::a("<span class='glyphicon glyphicon-pencil'></span>",'#',[
                                'value'=>Yii::$app->urlManager->createUrl($url),
                                'class'=>'update-modal-click grid-action',
                                'data-toggle'=>'tooltip',
                                'data-placement'=>'bottom',
                                'title'=>'Update'
                                ]);
                                return $btn;
                                 }
                        ]
                   ],
               ],
           ]); ?>
       </div>
   </div>

</div>
<?php
Modal::begin([
    'header'=>'<h4>Update Model</h4>',
    'id'=>'update-modal',
    'size'=>'modal-lg'
]);

echo "<div id='updateModalContent'></div>";

Modal::end();

$script = <<< JS
   $(function () {
    $('.update-modal-click').click(function () {
        $('#update-modal')
            .modal('show')
            .find('#updateModalContent')
            .load($(this).attr('value'));
    });
});
JS;
//маркер конца строки, обязательно сразу, без пробелов и табуляции
$this->registerJs($script, yii\web\View::POS_READY);
?>


