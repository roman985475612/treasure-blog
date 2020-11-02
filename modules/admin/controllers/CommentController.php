<?php

namespace app\modules\admin\controllers;

use app\models\Comment;
use yii\web\Controller;

class CommentController extends Controller
{
    public function actionIndex()
    {
        $comments = Comment::find()->orderBy('id desc')->all();

        return $this->render('index', [
            'comments' => $comments,
        ]);
    }

    public function actionToggleAllow($id)
    {
        Comment::toggleAllow($id);

        return $this->redirect(['comment/index']);
    }

    public function actionDelete($id)
    {
        $comment = Comment::findOne($id);

        if ($comment->delete()) {
            return $this->redirect(['comment/index']);
        }
    }
}