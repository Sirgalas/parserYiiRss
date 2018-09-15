<?php

namespace app\entities;

use app\forms\NewsForm;
use Yii;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $description
 * @property string $author
 * @property string $comments
 * @property string $enclosure
 * @property string $guid
 * @property string $pubDate
 * @property string $source
 *
 * @property NewsCategory[] $newsCategories
 */
class News extends \yii\db\ActiveRecord
{

    public static function create(NewsForm $form): self
    {
        $news= new static();
        $news->title=$form->title;
        $news->link=$form->link;
        $news->description=$form->description;
        $news->author=$form->author;
        $news->comments=$form->comments;
        $news->enclosure=$form->enclosure;
        $news->guid=$form->guid;
        $news->pubDate=$form->pubDate;
        return $news;
    }


    public function edit(NewsForm $form): void
    {
        $this->title=$form->title;
        $this->link=$form->link;
        $this->description=$form->description;
        $this->author=$form->author;
        $this->comments=$form->comments;
        $this->enclosure=$form->enclosure;
        $this->guid=$form->guid;
        $this->pubDate=$form->pubDate;
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }


    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategories()
    {
        return $this->hasMany(NewsCategory::className(), ['new_id' => 'id']);
    }
}
