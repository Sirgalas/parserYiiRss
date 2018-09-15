<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\forms\NewsForm
 *@var $news app\entities\News;
 */

$this->title = 'Update News: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'News', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $news->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="news-update">

    <div class="box">
        <div class="box box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>


</div>
