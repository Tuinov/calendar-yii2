<?php

use yii\db\Migration;

/**
 * Class m190917_191932_addColumn_users_table
 */
class m190917_191932_addColumn_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('users','created_at','string');
        $this->addColumn('users','updated_at','string');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190917_191932_addColumn_users_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190917_191932_addColumn_users_table cannot be reverted.\n";

        return false;
    }
    */
}
