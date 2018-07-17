<?php

use yii\db\Migration;

/**
 * Class m180716_131129_article_categories
 */
class m180716_131129_article_categories extends Migration
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

        $this->createTable('{{%article_categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null()
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%article_categories}}');
    }

}
