<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\Pagination;

/**
 * This is the model class for table "article".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 * @property string|null $content
 * @property string|null $date
 * @property string|null $image
 * @property int|null $viewed
 * @property int|null $user_id
 * @property int|null $status
 * @property int|null $category_id
 *
 * @property ArticleTag[] $articleTags
 * @property Tag[] $tags
 * @property Comment[] $comments
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['title'], 'string', 'max' => 255],
            [['title', 'description', 'content'], 'string'],
            [['date'], 'date', 'format' => 'php:Y-m-d'],
            [['date'], 'default', 'value' => date('Y-m-d')],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
            'content' => 'Content',
            'date' => 'Date',
            'image' => 'Image',
            'viewed' => 'Viewed',
            'user_id' => 'User ID',
            'status' => 'Status',
            'category_id' => 'Category ID',
        ];
    }

    /**
     * Gets query for [[ArticleTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArticleTags()
    {
        return $this->hasMany(ArticleTag::class, ['article_id' => 'id']);
    }

    /**
     * Gets query for [[Tags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags()
    {
        return $this
            ->hasMany(Tag::class, ['id' => 'tag_id'])
            ->viaTable('article_tag', ['article_id' => 'id']);
    }


    public function getSelectedTags()
    {
        $selectedTags = $this->getTags()->select('id')->asArray()->all();

        return ArrayHelper::getColumn($selectedTags, 'id');
    }

    public function saveTags(array $tags)
    {
        $this->clearCurrentTags();

        foreach ($tags as $tag_id) {
            $tag = Tag::findOne($tag_id);
            $this->link('tags', $tag);
        }
    }

    public function clearCurrentTags()
    {
        ArticleTag::deleteAll(['article_id' => $this->id]);
    }

    /**
     * Gets query for [[Comments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getComments()
    {
        return $this->hasMany(Comment::class, ['article_id' => 'id']);
    }

    public function getImage()
    {
        return ($this->image) ? "/uploads/$this->image" : "https://fakeimg.pl/200x100/CCCCCC/?text=No%20image";
    }

    public function saveImage($filename)
    {
        $this->image = $filename;
        return $this->save(false);
    }

    public function deleteImage()
    {
        $imageUploadModel = new ImageUpload();
        $imageUploadModel->deleteFile($this->image);
    }

    public function beforeDelete()
    {
        $this->deleteImage();

        return parent::beforeDelete();
    }

    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    public function saveCategory($category_id)
    {
         $category = Category::findOne($category_id);
         
         if ($category != null) {
            $this->link('category', $category);

            return true;
        }
    }

    public function getDate()
    {
        return Yii::$app->formatter->asDate($this->date);
    }

    public static function getAll(int $pageSize = 1)
    {
        $query = Article::find();
        
        $count = $query->count();

        $pages = new Pagination(['totalCount' => $count, 'pageSize' => $pageSize]);

        $articles = $query->offset($pages->offset)
            ->limit($pages->limit)
            ->all();

        return [
            'pages' => $pages,
            'articles' => $articles,
        ];
    }

    public static function getPopular()
    {
        return Article::find()
            ->orderBy('viewed desc')
            ->limit(3)
            ->all();
    }

    public static function getRecent()
    {
        return Article::find()
            ->orderBy('date desc')
            ->limit(3)
            ->all();
    }
}
