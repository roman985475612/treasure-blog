<?php

namespace app\components;

use app\models\Article;
use yii\base\Widget;

class RecentWidget extends Widget
{
    public function run()
    {
        return $this->render('recent', [
            'recent' => Article::getRecent(),
        ]);
    }
}