<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string|null $text
 * @property int $post_category_id
 * @property int $status
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'post';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'title', 'post_category_id', 'status', 'image', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'post_category_id', 'status'], 'integer'],
            [['text'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Код',
            'user_id' => 'Код пользователя',
            'title' => 'Заголовок',
            'text' => 'Текст',
            'post_category_id' => 'Код категории',
            'status' => 'Статус',
            'image' => 'Изображение',
            'created_at' => 'Создан',
            'updated_at' => 'Обнавлен',
        ];
    }
}
