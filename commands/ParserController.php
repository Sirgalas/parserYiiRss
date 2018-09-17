<?php


namespace app\commands;

use app\entities\Link;
use app\entities\Patterns;
use app\services\parser\ParserService;
use app\repositories\parser\ParserRepository;
use yii\console\Controller;
use yii\console\ExitCode;
use yii\helpers\ArrayHelper;
use app\entities\mongo\News;


class ParserController extends Controller
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
        $links_ids=ArrayHelper::getColumn($links,'id');

        foreach ($links as $link)
        {
            $xml=$this->XmlFile($link->url);
            $arraySave=$this->service->feed($xml->channel);
            $this->service->saveAll($arraySave);
        }
        Link::updateAll(
            ['parser_date'=>date('z',time())],
            ['in','id',$links_ids]);
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
