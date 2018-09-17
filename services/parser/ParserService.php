<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 23:19
 */

namespace app\services\parser;


use app\entities\News;
use app\entities\Patterns;
use yii\helpers\ArrayHelper;
use Yii;

class ParserService
{
    public $patterns;
    public function __construct()
    {
        $this->patterns=ArrayHelper::getColumn(Patterns::getAll(),'text');
    }

    public function feed($channel)//:array
    {
        $arrayFeed=[];
        foreach ($channel->item as $item){

            if(!$this->strposinDescription($item->description,$this->patterns))
                continue;
            $arrayFeed[]=[
                (string)$item->title[0],
                (string)$item->link[0],
                (string)$item->description[0]
            ];
        }
        return $arrayFeed;
    }


    public function saveAll(array $insert)
    {
        Yii::$app->db->createCommand()->batchInsert(News::tableName(),['title','link','description'],$insert)->execute();
    }


    private function strposinDescription($haystack, $needles) {

        if ( !is_array($needles) )
            return false;
        foreach ($needles as $str) {
            if($pos = strpos($haystack, " ".$str." "))
                return true;
        }
        return false;
    }


}
