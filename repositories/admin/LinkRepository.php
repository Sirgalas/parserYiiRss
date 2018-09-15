<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:04
 */

namespace app\repositories\admin;


use app\entities\Link;
use app\forms\LinkForm;
use http\Exception\RuntimeException;

class LinkRepository
{
    public function get($id):Link
    {
        if(!$link=Link::findOne($id))
            throw new \RuntimeException('Ссылка не найдена');
        return $link;
    }

    public function save(Link $link):Link
    {
        if(!$link->save())
            throw new \RuntimeException(print_r($link->errors,1));
        return $link;
    }

    public function remove(Link $link):void
    {
        $link->delete();
    }
}
