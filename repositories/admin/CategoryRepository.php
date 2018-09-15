<?php

namespace app\repositories\admin;


use app\entities\Category;
use app\models\User;
use http\Exception\RuntimeException;

class CategoryRepository
{
     public function get($id): Category
     {
         if(!$category=Category::findOne($id))
            throw new \RuntimeException('Категория не найдена');
         return $category;
     }

     public function save(Category $category):Category
     {
        if(!$category->save())
            throw new \RuntimeException(print_r($category->errors,1));
        return $category;
     }

    public function remove(Category $category):void
    {
        $category->delete();
    }
}
