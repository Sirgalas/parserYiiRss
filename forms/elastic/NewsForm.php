<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:32
 */

namespace app\forms\elastic;
use app\entities\News;
use yii\base\Model;

/**
 * Class NewsForm
 * @package app\forms
 * @property string $title
 * @property string $link
 * @property string $description
 */
class NewsForm extends Model
{
    public $id;
    public $title;
    public $link;
    public $description;

    public function __construct(string  $title,string $link,string $description,$config = [])
    {
        parent::__construct($config);
            $this->title=$title;
            $this->link=$link;
            $this->description=$description;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link','description'], 'required'],
            [['title', 'link', 'description'], 'string', 'max' => 255],
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
            'author' => 'Автор',
            'comments' => 'Коментарии',
            'enclosure' => 'Медиа объект ',
            'guid' => 'Guid',
            'pubDate' => 'Дата опубликования',
            'source' => 'Ссылка на канал',
        ];
    }

}
