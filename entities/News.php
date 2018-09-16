<?php

namespace app\entities;

use app\forms\NewsForm;
use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $description
 * @property boolean $is_active
 * @property array $categories_ids
 *
 * @property NewsCategory[] $newsCategories
 * @property Category[] $categories
 */
class News extends \yii\db\ActiveRecord
{
    const NOT_ACTIVE=0;
    const ACTIVE=1;

    public static $staus=[
        self::NOT_ACTIVE=>'Новость в буфере',
        self::ACTIVE=>'Новость выводится',
    ];
    //public $categories_ids;
    public static function create(NewsForm $form): self
    {
        $news= new static();
        $news->title=$form->title;
        $news->link=$form->link;
        $news->description=$form->description;
        $news->categories_ids=$form->categories_ids;
        $news->is_active=$form->is_active;
        return $news;
    }


    public function edit(NewsForm $form): void
    {
        $this->title=$form->title;
        $this->link=$form->link;
        $this->description=$form->description;
        $this->categories_ids=$form->categories_ids;
        $this->is_active=$form->is_active;

    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    public function behaviors()
    {
        return [
            [
                'class' => \voskobovich\behaviors\ManyToManyBehavior::class,
                'relations' => [
                    'categories_ids' => 'categories',
                ],
            ],
        ];
    }
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategories()
    {
        return $this->hasMany(NewsCategory::class, ['new_id' => 'id']);
    }

    public function getCategories()
    {
        return $this->hasMany(Category::class,['id'=>'category_id'])
            ->viaTable(NewsCategory::tableName(), ['new_id' => 'id']);
    }

    public function getStatus()
    {
        return self::$staus[$this->is_active];
    }

    public static function listAll($keyField = 'id', $valueField = 'name', $asArray = true)
    {
        $query = static::find();
        if ($asArray) {
            $query->select([$keyField, $valueField])->asArray();
        }

        return ArrayHelper::map($query->all(), $keyField, $valueField);
    }

}
