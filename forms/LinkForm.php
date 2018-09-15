<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:31
 */

namespace app\forms;

use app\entities\Link;
use yii\base\Model;

/**
 * Class LinkForm
 * @package app\forms
 * @property string $name
 * @property string $url
 */

class LinkForm extends Model
{
    public $id;
    public $name;
    public $url;

    public function __construct(Link $link=null,$config = [])
    {
        parent::__construct($config);
        if($link)
        {
            $this->name=$link->name;
            $this->url=$link->url;
        }
    }

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
            'name' => 'Название',
            'url' => 'Ссылка',
        ];
    }
}
