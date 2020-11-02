<?php
use yii\helpers\Url;
?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="<?= Url::to('/')?>">Treasure</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto mb-2 mb-lg-0">
      <li class="nav-item">
          <a class="nav-link" href="<?= Url::to('/admin')?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Url::to('/admin/article')?>">Article</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Url::to('/admin/category')?>">Category</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Url::to('/admin/tag')?>">Tag</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= Url::to('/admin/comment')?>">Comment</a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
        <?php if (Yii::$app->user->isGuest): ?>
          <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
          <li class="nav-item"><a class="nav-link" href="/register">Register</a></li>
        <?php else: ?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
              <img src="<?= Yii::$app->user->identity->getAvatar(24) ?>" class="rounded" alt="">
              <?= Yii::$app->user->identity->username; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="userDropdown">
              <?php if (Yii::$app->user->identity->isAdmin): ?>
                  <li><a class="dropdown-item" href="/admin">Profile</a></li>
                  <li><hr class="dropdown-divider"></li>
              <?php endif; ?>
              <li><a class="dropdown-item" href="/logout">Logout</a></li>
            </ul>
          </li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>