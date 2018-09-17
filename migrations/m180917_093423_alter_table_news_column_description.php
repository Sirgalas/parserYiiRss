<?php

use yii\db\Migration;
use app\entities\News;
/**
 * Class m180917_093423_alter_table_news_column_description
 */
class m180917_093423_alter_table_news_column_description extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
       $this->alterColumn(News::tableName(),'description',$this->text());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->alterColumn(News::tableName(),'description',$this->string());
    }

}
