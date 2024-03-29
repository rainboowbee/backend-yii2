<?php

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

/**
 * @var $model admin\models\UserAdminSearch
 * @var $form  yii\widgets\ActiveForm
 */
?>

<div class="user-admin-search">

    <?php $form = ActiveForm::begin(['action' => ['index'], 'method' => 'get']); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'auth_key') ?>

    <?= $form->field($model, 'password_hash') ?>

    <?= $form->field($model, 'password_reset_token') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
