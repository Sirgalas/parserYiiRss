<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $link app\entities\Link
 *@var $model app\forms\LinkForm
 */

$this->title = 'Update Link: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Links', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $link->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="link-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
