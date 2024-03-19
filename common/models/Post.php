<?php

namespace common\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;
use yii\db\ActiveRecord;
use yii\web\UploadedFile;


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
 * @property int|null $updated_at
 *
 * @property Postcategory $postCategory
 */
class Post extends \yii\db\ActiveRecord
{
    public UploadedFile|string|null $imageFile = null;

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'class' => TimestampBehavior::class,
        ];
    }


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
            [['user_id', 'post_category_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'text', 'image'], 'string', 'max' => 255],
            [['post_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Postcategory::class, 'targetAttribute' => ['post_category_id' => 'id']],
            [['imageFile'], 'file'],

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
            'post_category_id' => 'Категория',
            'status' => 'Статус',
            'image' => 'Изображение',
            'created_at' => 'Создан',
            'updated_at' => 'Обновлен',
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

    public function beforeValidate(): bool
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        return parent::beforeValidate();
    }

    public function beforeSave($insert): bool
    {
        if ($this->imageFile !== null) {
            $htdocs = Yii::getAlias('@public');
            $name = '/uploads/' . Yii::$app->security->generateRandomString() . '.' . $this->imageFile->extension;
            if (!$insert) {
                if (file_exists($htdocs . $this->image) && !is_dir($htdocs . $this->image)) {
                    unlink($htdocs . $this->image);
                }
            }


            $this->image = $name;
            $filePath = $htdocs . $this->image;
            $this->imageFile->saveAs($filePath);
        }

        return parent::beforeSave($insert);
    }

}
