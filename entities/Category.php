<?php

namespace app\entities;

use app\forms\CategoryForm;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $title
 * @property string $created_at
 * @property string $updated_at
 *
 * @property NewsCategory[] $newsCategories
 */
class Category extends \yii\db\ActiveRecord
{

    public static function create(CategoryForm $form):self
    {
       $category= new static();
       $category->title=$form->title;
       return $category;
    }

    public function edit(CategoryForm $form):void
    {
        $this->title=$form->title;
    }


    public function behaviors()
    {
        return [
            'time'=>[
                'class' => TimestampBehavior::class,
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'created_at',
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }



    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsCategories()
    {
        return $this->hasMany(NewsCategory::className(), ['category_id' => 'id']);
    }
}
