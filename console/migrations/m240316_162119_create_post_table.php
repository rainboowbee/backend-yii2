<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%postcategory}}`
 */
class m240316_162119_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(),
            'text' => $this->string(),
            'post_category_id' => $this->integer(),
            'status' => $this->integer(),
            'image' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        // creates index for column `post_category_id`
        $this->createIndex(
            '{{%idx-post-post_category_id}}',
            '{{%post}}',
            'post_category_id'
        );

        // add foreign key for table `{{%postcategory}}`
        $this->addForeignKey(
            '{{%fk-post-post_category_id}}',
            '{{%post}}',
            'post_category_id',
            '{{%postcategory}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%postcategory}}`
        $this->dropForeignKey(
            '{{%fk-post-post_category_id}}',
            '{{%post}}'
        );

        // drops index for column `post_category_id`
        $this->dropIndex(
            '{{%idx-post-post_category_id}}',
            '{{%post}}'
        );

        $this->dropTable('{{%post}}');
    }
}
