<?php

namespace page\models;

use yii\db\ActiveRecord;
use page\Module;

class Page extends ActiveRecord
{

    public static function tableName()
    {
        return 'page';
    }

    public function rules()
    {
        return [
            [['id', 'title'], 'required'],
            [['id'], 'match', 'pattern' => '/^[a-z0-9_\-]*$/'],
            [['id', 'title', 'keywords', 'description', 'layout'], 'string', 'max' => 255],
            [['id', 'title', 'keywords', 'description', 'layout'], 'trim'],
            [['layout'], 'in', 'range' => array_keys(Module::$instance->layoutList)],
            [['content'], 'string'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Заголовок',
            'content' => 'Содержимое',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание',
            'layout' => 'Шаблон страницы',
        ];
    }

}
