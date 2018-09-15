<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\forms\PatternForm
 * @var $pattern app\entities\Patterns;
 */

$this->title = 'Update Paterns: ' . $model->text;
$this->params['breadcrumbs'][] = ['label' => 'Paterns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->text, 'url' => ['view', 'id' => $pattern->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paterns-update">

    <div class="box">
        <div class="box box-body">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
