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

        $this->batchInsert('{{%postcategory}}', ['name'], [
            ['Категория 1'],
            ['Категория 2'],
            ['Категория 3'],
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
