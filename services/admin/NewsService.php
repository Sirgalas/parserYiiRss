<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:00
 */

namespace app\services\admin;


use app\entities\News;
use app\forms\NewsForm;
use app\repositories\admin\NewsRepository;

class NewsService
{
    public $repository;

    public function __construct(NewsRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(NewsForm $form):News
    {
        $news=News::create($form);
        $this->repository->save($news);
        return $news;
    }

    public function edit(News $news, NewsForm $form):void
    {
        $news->edit($form);
        $this->repository->save($news);
    }

    public function remove($id):void
    {
        $news=$this->repository->get($id);
        $this->repository->remove($news);
    }
}
