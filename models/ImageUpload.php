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
            [['image'], 'file', 'extensions' => 'jpg,png'],
        ];
    }

    public function uploadImage(UploadedFile $file, $currentImage) {
        $this->image = $file;

        if ($this->validate()) {
            $this->deleteCurrentImage($currentImage);

            return $this->saveImage();
        }
    }

    private function getUploadsFolder() {
        return Yii::getAlias('@web') . 'uploads/';
    }

    private function generateFilename() {
        return strtolower(md5(uniqid($this->image->baseName)) . '.' . $this->image->extension);
    }

    public function deleteCurrentImage($currentImage) {
        if ($this->fileExists($currentImage)) {
            unlink($this->getUploadsFolder() . $currentImage);
        }
    }

    public function fileExists($filename) {
        if (!empty($filename) && $filename !== null) {
            return file_exists($this->getUploadsFolder() . $filename);
        }
    }

    public function saveImage() {
        $filename = $this->generateFilename();
        $this->image->saveAs($this->getUploadsFolder() . $filename);
        return $filename;
    }
}