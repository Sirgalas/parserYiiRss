<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 15.09.18
 * Time: 19:31
 */

namespace app\forms;

use app\entities\Category;
use yii\base\Model;

/**
 * Class CategoryForm
 * @package app\forms
 * @property string $title
 */

class CategoryForm extends Model
{
    public $id;
    public $title;
    public function __construct(Category $category=null,$config = [])
    {
        parent::__construct($config);
        if($category)
            $this->title=$category->title;
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
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
        ];
    }
}
