<?php

namespace app\entities\mongo;

/**
 * Class News
 * @package app\entities\elastic
 * @property string $title
 * @property string link
 * @property string $description
 */

use yii\mongodb\ActiveRecord;

class News extends ActiveRecord
{
    public static function collectionName()
    {
        return 'parser';
    }
    /**
     * @return array the list of attributes for this record
     */
    public function attributes():array
    {
        return ['_id','title', 'link', 'description'];
    }


}
