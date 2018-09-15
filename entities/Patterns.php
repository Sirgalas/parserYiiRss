<?php

namespace app\entities;

use app\forms\PatternForm;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "paterns".
 *
 * @property int $id
 * @property string $text
 * @property string $created_at
 * @property string $updated_at
 */
class Patterns extends \yii\db\ActiveRecord
{

    public static function create(PatternForm $form):self
    {
      $patterns=new static();
      $patterns->text=$form->text;
      return $patterns;
    }

    public function edit(PatternForm $form):void
    {
      $this->text=$form->text;
    }

    public function behaviors()
    {
        return [
            'time'=>[
                'class' =>  TimestampBehavior::class,
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
        return 'paterns';
    }

    /**
     * {@inheritdoc}
     */

}
