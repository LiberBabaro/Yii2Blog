<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<?php if (!empty($comments)): ?>
    <?php foreach ($comments as $comment): ?>
        <div class="bottom-comment"><!--bottom comment-->
            <div class="comment-img">
                <img width="70" class="img-circle" src="<?= $comment->user->getImage(); ?>" alt="">
            </div>

            <div class="comment-text">
                <a href="#" class="replay btn pull-right"> Replay</a>
                <h5><?= $comment->user->name; ?></h5>

                <p class="comment-date">
                    <?= $comment->getDate(); ?>
                </p>


                <p class="para"><?= $comment->text; ?></p>
            </div>
        </div>
        <!-- end bottom comment-->
    <?php endforeach; ?>
<?php endif; ?>


<div class="leave-comment"><!--leave comment-->
    <h4>Leave a reply</h4>

    <?php $form = ActiveForm::begin([
        'action' => ['site/comment', 'id' => $article->id],
        'options' => ['class' =>'form-horizontal contact-form', 'role' => 'form']
    ]);?>


    <div class="form-group">
        <div class="col-md-12">
            <?= $form->field($commentForm, 'comment')
                ->textarea([
                    'class' => 'form-control',
                    'placeholder' => 'Write Message',
                    'rows' => 6
                ])->label(false); ?>
        </div>
    </div>
    <?= Html::submitButton('Post Comment', ['class' => 'btn send-btn', 'name' => 'comment-button']) ?>

    <?php ActiveForm::end(); ?>
</div><!--end leave comment-->