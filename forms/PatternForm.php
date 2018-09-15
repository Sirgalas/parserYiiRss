<?php

namespace app\forms;

use app\entities\Patterns;
use yii\base\Model;

/**
 * Class PatternForm
 * @package app\forms
 * @property string $text
 */
class PatternForm extends Model
{
    public $id;
    public $text;

    public function __construct(Patterns $patterns=null, $config = [])
    {
        parent::__construct($config);
        $this->text=$patterns->text;
    }

    public function rules()
    {
        return [
            [['text'], 'required'],
            [['text'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
