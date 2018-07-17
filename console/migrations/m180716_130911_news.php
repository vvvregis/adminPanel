<?php

use yii\db\Migration;

/**
 * Class m180716_130911_news
 */
class m180716_130911_news extends Migration
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

        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'title' => $this->string()->null(),
            'description' => $this->string()->null(),
            'keywords' => $this->string()->null(),
            'text' => $this->text()->null(),
            'public' => $this->integer()->null()->defaultValue(1),
            'alias' => $this->string()->notNull()->unique(),
            'date' => $this->timestamp()->notNull(),
            'image' => $this->string()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%news}}');
    }

}
