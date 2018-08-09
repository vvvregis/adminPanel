<?php

namespace common\models;

use common\traits\AliasTrait;
use common\traits\UploadImageTrait;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "news".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $text
 * @property int $public
 * @property string $alias
 * @property string $date
 * @property string $image
 */
class BaseEntity extends \yii\db\ActiveRecord
{

    use AliasTrait;
    use UploadImageTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'news';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text'], 'string'],
            [['public'], 'integer'],
            [['alias'], 'required'],
            [['date'], 'safe'],
            [['name', 'title', 'description', 'keywords', 'alias', 'image'], 'string', 'max' => 255],
            [['alias', 'image'], 'unique'],
            [['imageFile'], 'file'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text' => 'Текст',
            'public' => 'Публикация',
            'alias' => 'Алиас',
            'date' => 'Дата',
            'imageFile' => 'Картинка',
        ];
    }
}
