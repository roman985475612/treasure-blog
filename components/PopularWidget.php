<?php

namespace app\components;

use app\models\Article;
use yii\base\Widget;

class PopularWidget extends Widget
{
    public function run()
    {
        return $this->render('popular', [
            'popular' => Article::getPopular(),
        ]);
    }
}