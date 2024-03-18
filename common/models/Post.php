<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "post".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $title
 * @property string|null $text
 * @property int|null $post_category_id
 * @property int|null $status
 * @property string|null $image
 * @property int|null $created_at
 * @property int|null $upadated_at
 *
 * @property Postcategory $postCategory
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
            [['user_id', 'post_category_id', 'status', 'created_at', 'upadated_at'], 'integer'],
            [['title', 'text', 'image'], 'string', 'max' => 255],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Postcategory::class, 'targetAttribute' => ['post_category_id' => 'id']],
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
            'upadated_at' => 'Обновлен',
        ];
    }

    /**
     * Gets query for [[PostCategory]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPostCategory()
    {
        return $this->hasOne(Postcategory::class, ['id' => 'post_category_id']);
    }
}
