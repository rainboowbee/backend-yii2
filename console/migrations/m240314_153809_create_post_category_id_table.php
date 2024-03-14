<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post_category_id}}`.
 */
class m240314_153809_create_post_category_id_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%postCategory}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%post_category_id}}');
    }
}
