<?php

namespace app\entities;

use app\forms\LinkForm;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "link".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property integer $parser_date
 * @property string $created_at
 * @property string $updated_at
 */
class Link extends \yii\db\ActiveRecord
{

    public static function create(LinkForm $form):Link
    {
        $link=new static();
        $link->name=$form->name;
        $link->url=$form->url;
        $link->parser_date=0;
        return $link;
    }

    public  function edit(LinkForm $form):void
    {
        $this->name=$form->name;
        $this->url=$form->url;
    }



    public function behaviors()
    {
        return [
            'time'=>[
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'link';
    }

    /**
     * {@inheritdoc}
     */

}
