<?php

namespace common\models;

use common\traits\AliasTrait;
use common\traits\UploadImageTrait;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $text
 * @property string $image
 * @property int $public
 * @property string $alias
 * @property int $parent_id
 */
class Catalog extends \yii\db\ActiveRecord
{
    use UploadImageTrait;
    use AliasTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'image'], 'string'],
            [['public', 'parent_id'], 'integer'],
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
            'name' => 'Название категории',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text' => 'Текст',
            'image' => 'Картинка',
            'public' => 'Публикация',
            'alias' => 'Алиас',
            'parent_id' => 'Родительская категория',
        ];
    }

    /**
     * get all first level categories
     * @param $id integer
     * @return array
     */
    public static function getFirstLevelCategories($id)
    {
        $categories = self::find()->where(['parent_id' => 0]);
        if ($id) {
            $categories->andWhere(['<>', 'id', $id]);
        }
        $categories = $categories->all();
        return [0 => 'Категория первого уровня'] + ArrayHelper::map($categories, 'id', 'name');
    }

    /**
     * Get child categories from parent id
     * @param $parent_id
     * @return array
     */
    public static function getChildCategories($parent_id)
    {
        $categories = self::find()->where(['parent_id' => $parent_id])->all();
        return ArrayHelper::map($categories, 'id', 'name');
    }
}
