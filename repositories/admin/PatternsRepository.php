<?php


namespace app\repositories\admin;


use app\entities\Patterns;

class PatternsRepository
{
    public function get($id):Patterns
    {
        if(!$patterns=Patterns::findOne($id))
            throw new \RuntimeException('Ссылка не найдена');
        return $patterns;
    }

    public function save(Patterns $patterns):Patterns
    {
        if(!$patterns->save())
            throw new \RuntimeException(print_r($patterns->errors,1));
        return $patterns;
    }

    public function remove(Patterns $patterns):void
    {
        $patterns->delete();
    }
}
