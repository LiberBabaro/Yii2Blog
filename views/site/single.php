<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\CommentForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

use yii\helpers\Url;
?>
<div class="col-md-8">
    <?php if (!Yii::$app->user->isGuest && (Yii::$app->user->id == $article->author->id || Yii::$app->user->identity->isAdmin)): ?>
        <?= Html::a('Update', ['article/article-edit', 'id' => $article->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Set image', ['article/set-image', 'id' => $article->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Set category', ['article/set-category', 'id' => $article->id], ['class' => 'btn btn-default']) ?>
    <?php endif;  ?>
    <article class="post">
        <div class="post-thumb">
            <span href=""><img src="<?= $article->getImage(); ?>" alt=""></span>
        </div>
        <div class="post-content">
            <header class="entry-header text-center text-uppercase">
                <h6><a href="<?= Url::toRoute(['site/category', 'id' => $article->category->id ?? '']); ?>"> <?= $article->category->title ?? ''; ?></a></h6>

                <h1 class="entry-title"><h1 href=""><?= $article->title; ?></h1></h1>


            </header>
            <div class="entry-content">
                <?= $article->content; ?>
            </div>
            <div class="decoration">
                <a href="#" class="btn btn-default">Decoration</a>
                <a href="#" class="btn btn-default">Decoration</a>
            </div>

            <div class="social-share">
                <span
                    class="social-share-title pull-left text-capitalize">By <?= $article->author->name ?> On <?= $article->getDate(); ?></span>
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
    <?= $this->render('/partials/comment', [
            'article' => $article,
            'comments' => $comments,
            'commentForm' => $commentForm,
    ]); ?>
</div>

<?= $this->render('/partials/sidebar', [
    'popular' => $popular,
    'recent' => $recent,
    'categories' => $categories,
]); ?>
