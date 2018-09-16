<?php

use yii\db\Migration;
use app\entities\News;
/**
 * Class m180916_174550_add_column_is_active_from_news_table
 */
class m180916_174550_add_column_is_active_from_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn(News::tableName(),'is_active',$this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn(News::tableName(),'is_active');
    }

}
