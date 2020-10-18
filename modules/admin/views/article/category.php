<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="offset-md-3 col-md-6">

        <?php $form = ActiveForm::begin(); ?>

            <?= Html::dropDownList('category', $selectedCategory, $categories, ['class' => 'form-select']) ?>

            <div class="mt-3">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        
    </div>
</div>
