<?php
use yii\helpers\Url;
use yii\widgets\LinkPager;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach($articles as $article): ?>
                    <article class="post post-list">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="post-thumb">
                                    <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>">
                                        <img src="<?= $article->getImage(); ?>" alt="" class="pull-left">
                                    </a>
                                    <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>" class="post-thumb-overlay text-center">
                                        <div class="text-uppercase text-center">View Post</div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="post-content">
                                    <header class="entry-header text-uppercase">
                                        <h6>
                                            <a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id]); ?>">
                                                <?= $article->category->title; ?>
                                            </a>
                                        </h6>
                                        <h1 class="entry-title">
                                            <a href="<?= Url::toRoute(['site/single', 'id' => $article->id]); ?>">
                                                <?= $article->title; ?>
                                            </a>
                                        </h1>
                                    </header>
                                    <div class="entry-content">
                                        <?= $article->content; ?>
                                    </div>
                                    <div class="social-share">
                                        <span class="social-share-title pull-left text-capitalize">By Rubel On <?= $article->getDate(); ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?= LinkPager::widget(['pagination' => $pages]) ?>
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
<!-- end main content-->
