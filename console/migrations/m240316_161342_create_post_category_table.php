<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%postcategory}}`.
 */
class m240316_161342_create_post_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%postcategory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%postcategory}}');
    }
}
