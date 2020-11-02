<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\Response;
use app\models\Article;
use app\models\Category;
use app\models\Tag;
use app\models\ContactForm;
use app\models\forms\CommentForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $data = Article::getAll();

        return $this->render('index', [
            'articles'   => $data['articles'],
            'pages'      => $data['pages'],
            'popular'    => Article::getPopular(),
            'recent'     => Article::getRecent(),
            'categories' => Category::getAll(),
        ]);
    }

    public function actionSingle($id)
    {
        $article = Article::find()
            ->where(['id' => $id])
            ->with('comments')
            ->one();

        $article->viewedCounter();
        $comments = $article->getArticleComments();
        $commentForm = new CommentForm();

        return $this->render('single', [
            'article'     => $article,
            'comments'    => $comments,
            'commentForm' => $commentForm,
        ]);
    }

    public function actionComment($article_id)
    {
        $model = new CommentForm();          
        if ($model->load(Yii::$app->request->post())) {
            Yii::$app->getSession()->setFlash('success', 'Your comment will be added soon!');
            $model->saveComment($article_id);
        }

        return $this->redirect(['site/single', 'id' => $article_id]);
    }

    public function actionCategory($category_id)
    {
        $categoryName = Category::find()
            ->select(['title'])
            ->where(['id' => $category_id])
            ->one()
            ->title;

        $data = Article::getAllByCategory($category_id, 2);

        return $this->render('category', [
            'articles' => $data['articles'],
            'pages'    => $data['pages'],
            'title'    => 'Category::' . $categoryName,
        ]);
    }

    public function actionTag($tag_id)
    {
        $tagName = Tag::find()
            ->select(['title'])
            ->where(['id' => $tag_id])
            ->one()
            ->title;

        $data = Article::getAllByTag($tag_id, 2);

        return $this->render('category', [
            'articles' => $data['articles'],
            'pages'    => $data['pages'],
            'title'    => 'Tag::' . $tagName,
        ]);
    }

    
    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }
}
