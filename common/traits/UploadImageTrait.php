<?php
/**
 * Created by PhpStorm.
 * User: stark
 * Date: 09.08.18
 * Time: 14:01
 */

namespace common\traits;


use yii\web\UploadedFile;

trait UploadImageTrait
{
    /**
     * Uploaded file
     * @var
     */
    public $imageFile;

    /**
     * Upload image file
     * @return bool
     */
    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(\Yii::getAlias('@uploadfile'). '/' . \Yii::$app->controller::$urlString . '/' . $this->imageFile->baseName . '.' . $this->imageFile->extension);
            return true;
        } else {
            return false;
        }
    }

    /**
     * Set filename and save model
     * @return bool
     */
    public function saveModel()
    {
        $this->imageFile = UploadedFile::getInstance($this, 'imageFile');
        if($this->imageFile) {
            if ($this->upload()) {
                $this->image = $this->imageFile->name;
            }
        }
        return $this->save();
    }
}