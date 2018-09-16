<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:01
 */

namespace app\services\admin;


use app\entities\Category;
use app\forms\CategoryForm;
use app\repositories\admin\CategoryRepository;

class CategoryService
{

    public $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(CategoryForm $form):Category
    {
        $category=Category::create($form);
        $this->repository->save($category);
        return $category;
    }

    public function edit($category, CategoryForm $form):void
    {

        $category->edit($form);
        $this->repository->save($category);
    }

    public function remove($id):void
    {
        $category=$this->repository->get($id);
        $this->repository->remove($category);
    }

    public function getMenuItems($categories, $activeId = null)
    {
        $menuItems = [];
        foreach ($categories as $category) {
            $menuItems[$category->id] = [
                'active' => $activeId === $category->id,
                'label' => $category->title,
                'url' => ['site/index', 'id' => $category->id],
            ];
        }
        return $menuItems;
    }
}
