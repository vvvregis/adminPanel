<?php

use yii\db\Migration;

/**
 * Class m180809_103542_add_manufacture_table
 */
class m180809_103542_add_manufacture_table extends Migration
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

        $this->createTable('{{%manufacture}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->null(),
            'image' => $this->string()->null(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%manufacture}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180809_103542_add_manufacture_table cannot be reverted.\n";

        return false;
    }
    */
}
