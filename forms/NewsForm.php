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
 *
 */
class NewsForm extends Model
{
    public $id;
    public $title;
    public $link;
    public $description;

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
        ];
    }

}
