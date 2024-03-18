<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Postcategory $model */

$this->title = 'Update Postcategory: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Postcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="postcategory-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
