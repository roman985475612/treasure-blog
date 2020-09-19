<?php


namespace app\controllers\admin;

use yii\web\Controller;

class MyController extends Controller
{
    public $defaultAction = 'my-test';

    public function actionMyTest()
    {
        return __METHOD__;
    }
}