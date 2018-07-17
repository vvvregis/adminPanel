<?php

namespace common\models;

use yii\helpers\ArrayHelper;

class Article extends BaseEntity
{

    /**
     * @return string
     */
    public static function tableName()
    {
        return 'articles';
    }

    /**
     * @return array
     */
    public function rules()
    {
        return ArrayHelper::merge(parent::rules(), [
            [['category_id'], 'integer'],
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ArticleCategories::className(), ['id' => 'category_id']);
    }

    /**
     * Get all categories
     * @return array|\yii\db\ActiveRecord[]
     */
    public static function getCategories()
    {
        return ArticleCategories::find()->all();
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return ArrayHelper::merge(parent::attributeLabels(), [
            'category_id' => 'Категория',
        ]);
    }
}