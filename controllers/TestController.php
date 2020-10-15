<?php


namespace app\controllers;

use yii\web\View;

class TestController extends AppController
{
    public $layout = 'test';

    public function actions()
    {
        return [
            'test' => [
                'class' => 'app\components\TestAction',
            ]
        ];
    }

    public function actionIndex($name = 'John Dow')
    {
        \Yii::$app->view->on(View::EVENT_END_BODY, function () {
            echo '(c) 2020';
        });
        
        $this->view->title = 'Тестовая страница';
        
        $this->view->registerMetaTag(['name' => 'description', 'content' => 'Тестовая страница...'], 'description');
        
        return $this->render('index', ['name' => $name]);
    }
}