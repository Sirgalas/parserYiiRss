<?php

namespace app\entities;

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
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
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
            'title' => 'Title',
            'link' => 'Link',
            'description' => 'Description',
            'author' => 'Author',
            'comments' => 'Comments',
            'enclosure' => 'Enclosure',
            'guid' => 'Guid',
            'pubDate' => 'Pub Date',
            'source' => 'Source',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategories()
    {
        return $this->hasMany(NewsCategory::className(), ['new_id' => 'id']);
    }
}
