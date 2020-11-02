<?php
use yii\helpers\{Html, Url};
use yii\widgets\ActiveForm;
?>

<?php if (!empty($comments)): ?>
    <h4 class="numComments"></h4>
    <?php foreach ($comments as $comment): ?>
        <div class="bottom-comment">
            <div class="comment-img">
                <img class="img-circle" src="<?= $comment->user->getAvatar(128) ?>" alt="">
            </div>
            <div class="comment-text">
                <h5><?= $comment->user->username ?></h5>
                <?= Html::tag('p', $comment->getDate(), ['class' => 'comment-date']) ?>
                <?= Html::tag('p', Html::encode($comment->text), ['class' => 'para']) ?>
            </div>
        </div>
    <?php endforeach ?>
<?php endif ?>

<?php if (!Yii::$app->user->isGuest): ?>
    <div class="leave-comment">
        <h4>Leave a reply</h4>
        <br>
        <?php $form = ActiveForm::begin([
            'action' => ['site/comment', 'article_id' => $article->id],
            'options' => ['class' => 'form-horizontal contact-form'],
            'fieldConfig' => [
                'template' => '<div class="col-md-12">{input}</div>',
            ],
        ]) ?>
            <?= $form->field($commentForm, 'comment')->textarea([
                'class' => 'form-control',
                'rows' => '6',
                'placeholder' => 'Write Massage',
            ]) ?>

            <?= Html::submitButton('Post Comment', ['class' => 'btn send-btn']) ?>

        <?php ActiveForm::end() ?>
    </div>
<?php endif ?>
