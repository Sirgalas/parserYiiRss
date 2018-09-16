<?php

use yii\db\Migration;
use app\entities\Category;
/**
 * Class m180916_222956_insert_category

 */
class m180916_222956_insert_category extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert(Category::tableName(), ['title'],[
            ['Бизнес'],
            ['ГЧП']]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete(Category::tableName(), ['in', 'title', [
            ['Бизнес'],
            ['ГЧП']
        ]]);
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180916_222956_insert_category
 cannot be reverted.\n";

        return false;
    }
    */
}
