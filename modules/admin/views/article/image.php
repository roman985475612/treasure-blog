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

        <div class="form-file mt-3">

            <?= $form->field($model, 'image', [
                'template' => "{input}",
                'labelOptions' => ['class' => 'form-file-label']
            ])->fileInput([
                'class' => 'form-file-input'
            ]) ?>
            <label class="form-file-label" for="imageupload-image">
                <span class="form-file-text">Choose file...</span>
                <span class="form-file-button">Browse</span>
            </label>

        </div>

            <div class="mt-3">
                <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
            </div>

        <?php ActiveForm::end(); ?>
        
    </div>
</div>
