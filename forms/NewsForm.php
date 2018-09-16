<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:32
 */

namespace app\forms;
use app\entities\News;
use yii\base\Model;
use yii\helpers\ArrayHelper;
/**
 * Class NewsForm
 * @package app\forms
 * @property string $title
 * @property string $link
 * @property string $description
 * @property  array $categories_ids
 * @property boolean $is_active
 *
 */
class NewsForm extends Model
{
    public $id;
    public $title;
    public $link;
    public $description;
    public $categories_ids;
    public $is_active;

    public function __construct(News $news=null,$config = [])
    {
        parent::__construct($config);
        if($news){
            $this->title=$news->title;
            $this->link=$news->link;
            $this->description=$news->description;
            $this->categories_ids=ArrayHelper::getColumn($news->categories,'id');
            $this->is_active=$news->is_active;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link','description'], 'required'],
            [['title', 'link', 'description'], 'string', 'max' => 255],
            [['categories_ids'], 'each', 'rule' => ['integer']],
            ['is_active','boolean']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'link' => 'Ссылка',
            'description' => 'Описание',
        ];
    }

}
