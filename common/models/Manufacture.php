<?php

namespace common\models;

use common\traits\UploadImageTrait;
use Yii;

/**
 * This is the model class for table "manufacture".
 *
 * @property int $id
 * @property string $name
 * @property string $image
 */
class Manufacture extends \yii\db\ActiveRecord
{

    use UploadImageTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'manufacture';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'image'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название производителя',
            'image' => 'Картинка',
        ];
    }
}
