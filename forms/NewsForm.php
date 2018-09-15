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

/**
 * Class NewsForm
 * @package app\forms
 * @property string $title
 * @property string $link
 * @property string $description
 * @property string $author
 * @property string $comments
 * @property string $enclosure
 * @property string $guid
 * @property string $source
 * @property string $pubDate
 *
 */
class NewsForm extends Model
{
    public $id;
    public $title;
    public $link;
    public $description;
    public $author;
    public $comments;
    public $enclosure;
    public $guid;
    public $source;
    public $pubDate;

    public function __construct(News $news=null,$config = [])
    {
        parent::__construct($config);
        if($news){
            $this->title=$news->title;
            $this->link=$news->link;
            $this->description=$news->description;
            $this->author=$news->author;
            $this->comments=$news->comments;
            $this->enclosure=$news->enclosure;
            $this->guid=$news->guid;
            $this->source=$news->source;
            $this->pubDate=$news->pubDate;
        }
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'link'], 'required'],
            [['pubDate'], 'safe'],
            [['title', 'link', 'description', 'author', 'comments', 'enclosure', 'guid', 'source'], 'string', 'max' => 255],
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
