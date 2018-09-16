<?php

namespace app\repositories\admin;


use app\entities\News;
use app\entities\NewsCategory;
use yii\helpers\ArrayHelper;

class NewsRepository
{
    public function get($id):News
    {
        if(!$news=News::findOne($id))
            throw new \RuntimeException('Ссылка не найдена');
        return $news;
    }

    public function save(News $news):News
    {
        if(!$news->save())
            throw new \RuntimeException(print_r($news->errors,1));
        return $news;
    }

    public function remove(News $news):void
    {
        $news->delete();
    }

    public function newQuery($id)
    {
        $newQuery = News::find()->where(['is_active'=>News::ACTIVE]);
        if ($id !== null && isset($categories[$id])) {
            $id = ArrayHelper::getColumn(NewsCategory::find()->where(['category_id'=>$id])->all(),'new_id');
            $newQuery->andWhere(['in','id', $id]);
        }
        return $newQuery;
    }
}
