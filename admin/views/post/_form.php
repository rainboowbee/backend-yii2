<?php

use common\models\Postcategory;
use mihaildev\ckeditor\CKEditor;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\ActiveField;


/** @var yii\web\View $this */
/** @var common\models\Post $model */
/** @var yii\widgets\ActiveForm $form */

?>


<div class="post-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?php
        $category = Postcategory::find()->all();
        $items = ArrayHelper::map($category,'id','name');
        $params = [
            'prompt' => 'Укажите категорию'
        ];


    ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->widget(
        CKEditor::class,
        [
                'editorOptions' => [
                    'preset' => 'basic',
                    'inline' => false,
                ],
        ]
    );
    ?>

    <?= $form->field($model, 'post_category_id')->dropDownList($items, $params) ?>

    <?php
     if(!empty($model->logo)) {
         echo Html::img($model->logo, $options = ['class' => 'postImg', 'style' =>['width' => '180px']]);
     }
    ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>

    <?= $form->field($model, 'status')->dropDownList([
        '0' => 'brandnew',
        '1' => 'published',
        '2' => 'rejected',
    ])
    ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
