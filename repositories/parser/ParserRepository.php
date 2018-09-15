<?php
namespace app\repositories\parser;

use app\entities\Link;

class ParserRepository
{
        public function get():array
        {
            if(!$link=Link::find()->where(['!=','parser_date',date('z',time())])->all())
                throw new \RuntimeException('на сегодня проверок не осталось');
            return $link;
        }

}
