<?php
use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\Menu;
use yii\widgets\Pjax;

/* @var $this yii\web\View
 * @var $category app\entities\Category
 */


$title = (empty($category))? 'Welcome!' : $category->title;
$this->title = Html::encode($title);
?>
<h1><?= Html::encode($title) ?></h1>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-4">
            <?= Menu::widget([
                'items' => $menuItems,
                'options' => [
                    'class' => 'menu',
                ],
            ]) ?>
        </div>
        <div class="col-xs-8">
            <?php
            Pjax::begin([
                'enablePushState' => false, // to disable push state
                'enableReplaceState' => false // to disable replace state
            ]);
                echo ListView::widget([
                    'dataProvider' => $newsDataProvider,
                    'itemView' => '_news',
                ]);
             Pjax::end();
            ?>
        </div>
    </div>
</div>
