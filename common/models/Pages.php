<?php

namespace common\models;

use common\traits\AliasTrait;
use Yii;

/**
 * This is the model class for table "pages".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $text
 * @property int $public
 * @property string $alias
 */
class Pages extends \yii\db\ActiveRecord
{

    use AliasTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pages';
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
            [['name', 'title', 'description', 'keywords', 'alias'], 'string', 'max' => 255],
            [['alias'], 'unique'],
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
        ];
    }
}
