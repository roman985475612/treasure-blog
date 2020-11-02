<div class="container">
    <?php if (\Yii::$app->session->getFlash('success')): ?>
        <div class="alert alert-success" style="margin-bottom:0">
            <?= \Yii::$app->session->getFlash('success') ?>
        </div>
    <?php endif ?>
</div>
