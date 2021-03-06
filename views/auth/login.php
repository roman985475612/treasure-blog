<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="leave-comment mr0"><!--leave comment-->
                    
                    <h3 class="text-uppercase">Login</h3>
                    <br>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'options' => ['class' => 'form-horizontal contact-form'],
                        'fieldConfig' => [
                            'template' => "<div class=\"col-md-12\">{input}</div>\n<div class=\"col-md-12\">{error}</div>",
                        ],
                    ]); ?>

                        <?= $form->field($model, 'email')->textInput(['autofocus' => true, 'placeholder' => 'Email']) ?>

                        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'password']) ?>

                        <?= $form->field($model, 'rememberMe')->checkbox([
                            'template' => "<div class=\"col-md-12\">{input} {label}</div>\n<div class=\"col-md-12\">{error}</div>",
                        ]) ?>

                        <?= Html::submitButton('Login', ['class' => 'btn send-btn', 'name' => 'login-button']) ?>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>

            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">
                    <?= \app\components\PopularWidget::widget(); ?>
                    <?= \app\components\RecentWidget::widget(); ?>
                    <?= \app\components\CategoriesWidget::widget(); ?>
                    <?= \app\components\InstagramWidget::widget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
