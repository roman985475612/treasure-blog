<?php

namespace app\components;

use app\models\Category;
use yii\base\Widget;

class CategoriesWidget extends Widget
{
    public function run()
    {
        return $this->render('categories', [
            'categories' => Category::getAll(),
        ]);
    }
}