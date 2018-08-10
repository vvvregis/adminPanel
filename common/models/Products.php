<?php

namespace common\models;

use common\traits\AliasTrait;
use common\traits\UploadImageTrait;
use Yii;

/**
 * This is the model class for table "products".
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
 * @property int $category_id
 * @property int $manufacture_id
 */
class Products extends \yii\db\ActiveRecord
{
    use AliasTrait;
    use UploadImageTrait;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['text', 'image'], 'string'],
            [['public', 'category_id', 'manufacture_id'], 'integer'],
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
            'name' => 'Название продукта',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'text' => 'Text',
            'image' => 'Картинка',
            'public' => 'Публикация',
            'alias' => 'Алиас',
            'category_id' => 'Категория продукта',
            'manufacture_id' => 'Производитель продукта',
        ];
    }

    public function getParentCatalogId()
    {
        $category = Catalog::find()->where(['id' => $this->category_id])->one();
        if($category) {
            return $category->parent_id;
        }
        return null;
    }
}
