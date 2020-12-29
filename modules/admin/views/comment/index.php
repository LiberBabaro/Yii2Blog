<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="category-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php if(!empty($comments)):?>

        <table class="table">
            <thead>
            <tr>
                <td>#</td>
                <td>Author</td>
                <td>Article</td>
                <td>Text</td>
                <td>Action</td>
            </tr>
            </thead>

            <tbody>
            <?php foreach($comments as $comment):?>
                <tr>
                    <td><?= $comment->id?></td>
                    <td><?= $comment->user->name?></td>
                    <td><?= $comment->article->title?></td>
                    <td><?= $comment->text?></td>
                    <td>
                        <a class="btn btn-danger" href="<?= Url::toRoute(['comment/delete', 'id' => $comment->id]); ?>">Delete</a>
                    </td>
                </tr>
            <?php endforeach;?>
            </tbody>
        </table>

    <?php endif;?>
</div>