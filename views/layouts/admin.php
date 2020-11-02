<?php

use yii\helpers\Html;

\app\assets\AdminAsset::register($this);
?>

<?php $this->beginPage(); ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
    <header>
        <?= $this->render('_navbar') ?>
    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-2"><?= $this->render('_left-navbar') ?></div>
            <div class="col-md-10"><?= $content ?></div>
        </div>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>