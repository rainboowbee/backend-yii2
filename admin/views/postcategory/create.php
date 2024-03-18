<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Postcategory $model */

$this->title = 'Create Postcategory';
$this->params['breadcrumbs'][] = ['label' => 'Postcategories', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcategory-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
