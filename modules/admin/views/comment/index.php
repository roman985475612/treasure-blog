<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticleSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Text</th>
                <th scope="col">User ID</th>
                <th scope="col">Article ID</th>
                <th scope="col">Created at</th>
                <th scope="col">Status</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($comments as $comment): ?>
                <tr>
                    <th scope="row"><?= $comment->id ?></th>
                    <td><?= $comment->text ?></td>
                    <td><?= $comment->user->username ?></td>
                    <td><?= $comment->article->title ?></td>
                    <td><?= $comment->date ?></td>
                    <td>
                        <?php if ($comment->isAllowed() ): ?>
                            <a href="<?= Url::toRoute(['comment/toggle-allow', 'id' => $comment->id])?>" class="btn btn-sm btn-primary">
                                <i class="fas fa-eye"></i>
                            </a>
                        <?php else: ?>
                            <a href="<?= Url::toRoute(['comment/toggle-allow', 'id' => $comment->id])?>" class="btn btn-sm btn-outline-primary">
                                <i class="fas fa-eye-slash"></i>
                            </a>
                        <?php endif ?>
                    </td>
                    <td>
                        <a href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id])?>" class="btn btn-sm btn-danger">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>
