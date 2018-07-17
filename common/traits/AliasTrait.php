<?php
/**
 * Created by PhpStorm.
 * User: stark
 * Date: 16.07.18
 * Time: 18:11
 */

namespace common\traits;


trait AliasTrait
{
    public function behaviors()
    {
        return [
            'slug' => [
                'class' => 'common\behaviors\Slug',
                'in_attribute' => 'name',
                'out_attribute' => 'alias',
                'translit' => true
            ]
        ];
    }
}