<?php

namespace app\controllers;

use app\models\Article;
use app\models\Category;
use app\models\User;
use yii\data\Sort;
use yii\web\Controller;

class FilterController extends Controller
{

    /**
     * Displays filter page.
     *
     * @return string
     */
    public function actionIndex($author = null, $date = null)
    {
        $sort = new Sort();
        $data = Article::getAll(5, $sort);

        if ($author)
            $data = User::getArticlesByAuthor($author);
        elseif ($date)
            $data = Category::getArticlesByDate($date);

        return $this->render('index', [
            'articles' => $data['articles'],
            'pagination' => $data['pagination']
        ]);
    }

}