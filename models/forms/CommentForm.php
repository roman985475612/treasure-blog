<?php

namespace app\models\forms;

use Yii;
use yii\base\Model;
use app\models\Comment;

class CommentForm extends Model
{
    public $comment;

    public function rules()
    {
        return [
            [['comment'], 'required'],
            [['comment'], 'string', 'length' => [3, 250]],
        ];
    }

    public function saveComment($article_id)
    {
        $comment = new Comment();
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id;
        $comment->article_id = $article_id;
        $comment->created_at = date('Y-m-d H:i:s');
        $comment->status = 0;

        return $comment->save();
    }
}