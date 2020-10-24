<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */

$this->title = "{$model->title} ({$model->id})";

?>

<div class="row">
    <div class="offset-md-3 col-md-6">

        <h1><?= Html::encode($this->title) ?></h1>

        <?php $form = ActiveForm::begin(); ?>

            <?= Html::dropDownList('tags', $selectedTags, $tags, ['class' => 'form-select', 'multiple' => true]) ?>

            <div class="mt-3">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        
    </div>
</div>
