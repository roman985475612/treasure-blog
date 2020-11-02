<?php
use yii\helpers\{Html, Url};

$this->title = $article->title;
?>
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <article class="post">
                    <div class="post-thumb">
                        <a href="blog.html"><img src="<?= $article->getImage(); ?>" alt=""></a>
                    </div>
                    <div class="post-content">
                        <header class="entry-header text-center text-uppercase">
                            <h6>
                                <a href="<?= Url::toRoute(['site/category', 'category_id' => $article->category->id]); ?>">
                                    <?= $article->category->title; ?>
                                </a>
                            </h6>
                            <h1 class="entry-title"><?= $article->title; ?></h1>
                        </header>
                        <div class="entry-content">
                            <?= $article->content; ?>
                        </div>
                        <div class="decoration">
                            <?php foreach($article->tags as $tag): ?>
                                <a href="<?= Url::toRoute(['tag', 'tag_id' => $tag->id]) ?>" class="btn btn-default"><?= $tag->title; ?></a>
                            <?php endforeach; ?>
                        </div>

                        <div class="social-share">
							<span class="social-share-title pull-left text-capitalize">By <?= $article->author->username ?> On <?= $article->getDate(); ?></span>
                            <ul class="text-center pull-right">
                                <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </article>
                
                <?= $this->render('_comment', [
                    'comments' => $comments,
                    'commentForm' => $commentForm,
                ]) ?>

            </div>
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">
                    <?= \app\components\PopularWidget::widget(); ?>
                    <?= \app\components\RecentWidget::widget(); ?>
                    <?= \app\components\CategoriesWidget::widget(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
