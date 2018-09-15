<?php

namespace app\entities;

use Yii;

/**
 * This is the model class for table "link".
 *
 * @property int $id
 * @property string $name
 * @property string $url
 * @property string $created_at
 * @property string $updated_at
 */
class Link extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['name', 'url'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'url'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'url' => 'Url',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
