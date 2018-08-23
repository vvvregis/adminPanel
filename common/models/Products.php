<?php

namespace common\models;

use common\traits\AliasTrait;
use common\traits\UploadImageTrait;
use dvizh\cart\interfaces\CartElement;
use phpDocumentor\Reflection\Types\Self_;
use Yii;
use yii2mod\cart\models\CartItemInterface;

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
class Products extends \yii\db\ActiveRecord implements CartElement
{
    use AliasTrait;
    use UploadImageTrait;

    public $m_id;
    public $m_name;
    public $m_image;

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

    public function getCartName()
    {
        return $this->name;
    }

    public function getCartId()
    {
        return $this->id;
    }

    public function getCartPrice(): int
    {
        return 1;
    }

    public function getCartOptions()
    {
        return null;
    }


    public static function getProductImage($id)
    {
        return self::find()->select('image')->where(['id' => $id])->one();
    }

    public static function getCartItemCount()
    {
        $productsInCart = Yii::$app->cart->elements;
        return $productsInCart?count($productsInCart):0;
    }
}
