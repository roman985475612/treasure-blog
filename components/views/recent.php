<?php
use yii\helpers\Url;
?>

<aside class="widget pos-padding">
    <h3 class="widget-title text-uppercase text-center">Recent Posts</h3>
    <?php foreach($recent as $article): ?>
        <div class="thumb-latest-posts">
            <div class="media">
                <div class="media-left">
                    <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="popular-img"><img src="<?= $article->getImage(); ?>" alt="">
                        <div class="p-overlay"></div>
                    </a>
                </div>
                <div class="p-content">
                    <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="text-uppercase"><?= $article->title; ?></a>
                    <span class="p-date"><?= $article->getDate(); ?></span>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</aside>
