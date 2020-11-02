<?php
use yii\helpers\Url;
?>
<h2>Models</h2>
<div class="list-group" id="left-navbar">
    <a class="list-group-item list-group-item action" href="<?= Url::to('/admin/article') ?>">Article</a>
    <a class="list-group-item list-group-item action" href="<?= Url::to('/admin/category') ?>">Category</a>
    <a class="list-group-item list-group-item action" href="<?= Url::to('/admin/tag') ?>">Tag</a>
    <a class="list-group-item list-group-item action" href="<?= Url::to('/admin/comment') ?>">Comment</a>
</div>
