<?php


namespace app\commands;

use app\services\parser\ParserService;
use app\repositories\parser\ParserRepository;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\ArrayHelper;


class ParserController extends Controller
{
    public $repository;
    public $service;

    public function __construct(
        string $id,
        $module,
        ParserRepository $repository,
        ParserService $service,
        $config = [])
    {
        parent::__construct($id, $module, $config);
        $this->repository=$repository;
        $this->service=$service;
    }

    public function actionIndex()
    {

        $links=$this->repository->get();
        $links_ids=ArrayHelper::getColumn($links,'id');
        foreach ($links as $link)
        {
            $news = $this->XmlFile($link->url);
            foreach ($news as $new){
                var_dump($new->item);
            }
        }
    }

    private function XmlFile($files){
        libxml_use_internal_errors(true);
        if(!simplexml_load_file($files)){
            $errors=array();
            foreach (libxml_get_errors() as $error) {
                $er['error']=$error;
                $er['site']=$files;
                $errors[]=$er;
            }
            libxml_clear_errors();

        }
        return simplexml_load_file($files);
    }
}
