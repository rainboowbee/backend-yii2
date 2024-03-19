<?php

use common\models\Post;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Посты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать пост', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
    const status_list = [
        '0' => 'brandnew',
        '1' => 'published',
        '2' => 'rejected',
    ]
    ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'user_id',
            'title',
            'text',
            [
                'attribute' => 'Категория',
                'value' => static fn (Post $post) => $post->postCategory?->name
            ],
            [
                'attribute' => 'Статус',
                'value' => function ($model) {
                    return match ($model->status) {
                        0 => 'brandnew',
                        1 => 'published',
                        2 => 'rejected',
                        default => $model->status,
                    };
                }
            ],
            'image',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'php:Y-m-d']
            ],
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Post $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
