<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:01
 */

namespace app\services\admin;


use app\entities\Patterns;
use app\forms\PatternForm;
use app\repositories\admin\PatternsRepository;

class PatternsService
{
    public $repository;

    public function __construct(PatternsRepository $repository)
    {
        $this->repository=$repository;
    }

    public function create(PatternForm $form):Patterns
    {
        $pattern=Patterns::create($form);
        $this->repository->save($pattern);
        return $pattern;
    }

    public function edit(Patterns $patterns, PatternForm $form):void
    {
        $patterns->edit($form);
        $this->repository->save($patterns);
    }

    public function remove($id):void
    {
        $patterns=$this->repository->get($id);
        $this->repository->remove($patterns);
    }
}
