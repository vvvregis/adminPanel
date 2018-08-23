<?php

namespace frontend\controllers;


use common\models\Article;
use common\models\ArticleCategories;
use yii\web\Controller;

class ArticlesController extends Controller
{
    public function actionList($id = null)
    {
        $articlesList = Article::find()->where(['public' => 1]);

        if($id) {
            $articlesList->andWhere(['category_id' => $id]);
        }

        $articlesList = $articlesList->all();
        $categoriesList = ArticleCategories::find()->all();

        return $this->render('categoriesList', ['articlesList' => $articlesList, 'categoriesList' => $categoriesList]);
    }

    public function actionIndex($alias)
    {
        $article = Article::find()->where(['alias' => $alias])->one();
        return $this->render('article', ['article' => $article]);
    }
}