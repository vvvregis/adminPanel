<?php

use yii\db\Migration;

/**
 * Class m180809_102600_add_catalog_table
 */
class m180809_102600_add_catalog_table extends Migration
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

        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'title' => $this->string()->null(),
            'description' => $this->string()->null(),
            'keywords' => $this->string()->null(),
            'text' => $this->text()->null(),
            'image' => $this->text()->null(),
            'public' => $this->integer()->null()->defaultValue(1),
            'alias' => $this->string()->notNull()->unique(),
            'parent_id' => $this->integer()->defaultValue(0),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%catalog}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180809_102600_add_catalog_table cannot be reverted.\n";

        return false;
    }
    */
}
