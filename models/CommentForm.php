<?php

namespace app\models;

use Yii;
use yii\base\Model;

class CommentForm extends Model
{
    public $comment;

    const UNAUTHORIZED_USER_ID = 2;

    public function rules()
    {
        return [
          [['comment'], 'required'],
          [['comment'], 'string', 'length' => [3, 250]]
        ];
    }

    public function saveComment($article_id)
    {
        $comment = new Comment();
        $comment->text = $this->comment;
        $comment->user_id = Yii::$app->user->id ?? self::UNAUTHORIZED_USER_ID;
        $comment->article_id = $article_id;
        $comment->status = 0;
        $comment->date = date('Y-m-d');
        return $comment->save(false);
    }

}