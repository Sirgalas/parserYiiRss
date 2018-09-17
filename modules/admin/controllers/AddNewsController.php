<?php


namespace app\modules\admin\controllers;

use yii\web\Controller;
use app\services\parser\ParserService;
use app\repositories\parser\ParserRepository;

class AddNewsController extends Controller
{

    public $repository;
    public $service;
    public $patterns;

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
        foreach ($links as $link)
        {
            $xml=$this->XmlFile($link->url);
            $arraySave=$this->service->feed($xml->channel);
            $this->service->saveAll($arraySave);
        }
        \Yii::$app->session->setFlash('success','Новоcти добавлены');
        return $this->redirect('/admin/site');
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
