<?php
use yii\helpers\Url;
?>

<aside class="widget">
    <h3 class="widget-title text-uppercase text-center">Popular Posts</h3>
    <?php foreach($popular as $article): ?>
        <div class="popular-post">
            <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="popular-img"><img src="<?= $article->getImage(); ?>" alt="">
                <div class="p-overlay"></div>
            </a>
            <div class="p-content">
                <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="text-uppercase"><?= $article->title; ?></a>
                <span class="p-date"><?= $article->getDate(); ?></span>
            </div>
        </div>
    <?php endforeach; ?>
</aside>
