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
 * @property boolean $is_active
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
        return $news;
    }


    public function edit(NewsForm $form): void
    {
        $this->title=$form->title;
        $this->link=$form->link;
        $this->description=$form->description;

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
