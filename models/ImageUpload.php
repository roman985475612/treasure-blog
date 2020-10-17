<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class ImageUpload extends Model
{
    public $image;

    public function rules()
    {
        return [
            [['image'], 'required'],
            [['image'], 'file', 'extensions' => 'jpg,jpeg,png,gif']
        ];
    }

    public function uploadFile(UploadedFile $file, $currentImage)
    {
        $this->image = $file;

        if ($this->validate()) {

            $this->deleteFile($currentImage);

            return $this->saveImage();
        }
    }

    public function deleteFile($filename)
    {
        if ($this->fileExists($filename)) {
            unlink($this->getFolder() . $filename);
        }
    }

    public function fileExists($filename)
    {
        if ($filename != null) {
            return file_exists($this->getFolder() . $filename);
        }
    }

    private function generateFilename()
    {
        return strtolower(md5(uniqid($this->image->baseName))) . '.' . $this->image->extension;
    }

    public function saveImage()
    {
        $filename = $this->generateFilename();
    
        $this->image->saveAs($this->getFolder() . $filename);

        return $filename;
    }

    public function getFolder()
    {
        return Yii::getAlias('@web'). 'uploads/';
    }
}