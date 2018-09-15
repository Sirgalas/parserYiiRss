<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:00
 */

namespace app\services\admin;


use app\entities\Link;
use app\forms\LinkForm;
use app\repositories\admin\LinkRepository;

class LinkService
{
    public $repository;

    public function __construct(LinkRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(LinkForm $form):Link
    {
        $link=Link::create($form);
        $this->repository->save($link);
        return $link;
    }

    public function edit(Link $link, LinkForm $form):void
    {
        $link->edit($form);
        $this->repository->save($link);
    }

    public function remove($id):void
    {
        $link=$this->repository->get($id);
        $this->repository->remove($link);
    }
}
