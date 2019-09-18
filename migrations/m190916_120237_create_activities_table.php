<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%activities}}`.
 */
class m190916_120237_create_activities_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%activities}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'dayStart' => $this->string(),
            'dayEnd' => $this->string(),
            'userID' => $this->integer(),
            'description' => $this->text(),
            'repeat' => $this->boolean(),
            'blockDay' => $this->boolean(),
            // 'attachments' => '',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%activities}}');
    }
}
