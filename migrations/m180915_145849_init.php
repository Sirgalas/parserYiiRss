<?php

use yii\db\Migration;

/**
 * Class m180915_145849_init
 */
class m180915_145849_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),

            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%paterns}}',[
            'id'=>$this->primaryKey(),
            'text'=>$this->string()->notNull(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ],$tableOptions);

        $this->createTable('{{%link}}',[
            'id'=>$this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'url'=>$this->string()->notNull(),
            'parser_date'=>$this->integer(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime()
        ],$tableOptions);

        $this->createTable('{{%news}}',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'link'=>$this->string()->notNull(),
            'description'=>$this->string(),
            'author'=>$this->string(),
            'comments'=>$this->string(),
            'enclosure'=>$this->string(),
            'guid'=>$this->string(),
            'pubDate'=>$this->dateTime(),
            'source'=>$this->string()
        ],$tableOptions);

        $this->createTable('{{%category}}',[
            'id'=>$this->primaryKey(),
            'title'=>$this->string()->notNull(),
            'created_at'=>$this->dateTime(),
            'updated_at'=>$this->dateTime(),
        ],$tableOptions);

        $this->createTable('{{%news_category}}',[
           'category_id'=>$this->integer(),
           'new_id'=>$this->integer(),
        ]);

        $this->createIndex('idx_category_id_news_category','{{%news_category}}','category_id');
        $this->addForeignKey(
            'fk_category_id_news_category',
            '{{%news_category}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE');

        $this->createIndex('idx_new_id_news_category','{{%news_category}}','new_id');
        $this->addForeignKey(
            'fk_new_id_news_category',
            '{{%news_category}}',
            'new_id',
            '{{%news}}',
            'id',
            'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->dropForeignKey('fk_new_id_news_category','{{%news_category}}');
       $this->dropIndex('idx_new_id_news_category','{{%news_category}}');
       $this->dropForeignKey('fk_category_id_news_category','{{%news_category}}');
       $this->dropIndex('idx_category_id_news_category','{{%news_category}}');
       $this->dropTable('{{%news_category}}');
       $this->dropTable('{{%category}}');
       $this->dropTable('{{%news}}');
       $this->dropTable('{{%link}}');
       $this->dropTable('{{%paterns}}');
       $this->dropTable('{{%user}}');

    }


}
