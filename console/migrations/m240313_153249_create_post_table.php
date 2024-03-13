<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m240313_153249_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(255),
            'text' => $this->text(),
            'post_category_id' => $this->integer(),
            'status' => $this->integer(),
            'image' => $this->string(255),
            'created_at' => $this->dateTime(),
            'updated_at' => $this->dateTime(),

        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post}}');
    }
}
