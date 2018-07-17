<?php

use yii\db\Migration;

/**
 * Class m180716_134150_pages
 */
class m180716_134150_pages extends Migration
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

        $this->createTable('{{%pages}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'title' => $this->string()->null(),
            'description' => $this->string()->null(),
            'keywords' => $this->string()->null(),
            'text' => $this->text()->null(),
            'public' => $this->integer()->null()->defaultValue(1),
            'alias' => $this->string()->notNull()->unique(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%pages}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180716_134150_pages cannot be reverted.\n";

        return false;
    }
    */
}
