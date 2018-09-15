<?php

namespace app\repositories\admin;


use app\entities\News;

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
}
