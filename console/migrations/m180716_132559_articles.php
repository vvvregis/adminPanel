<?php

use yii\db\Migration;

/**
 * Class m180716_132559_articles
 */
class m180716_132559_articles extends Migration
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

        $this->createTable('{{%articles}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'title' => $this->string()->null(),
            'description' => $this->string()->null(),
            'keywords' => $this->string()->null(),
            'text' => $this->text()->null(),
            'public' => $this->integer()->null()->defaultValue(1),
            'category_id' => $this->integer()->null()->defaultValue(1),
            'alias' => $this->string()->notNull()->unique(),
            'date' => $this->timestamp()->notNull(),
            'image' => $this->string()->null(),
        ], $tableOptions);

        $this->addForeignKey('fk_article_category', '{{%articles}}', 'category_id', '{{%article_categories}}', 'id', 'cascade', 'cascade');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_article_category', '{{%articles}}');

        $this->dropTable('{{%articles}}');
    }

}
