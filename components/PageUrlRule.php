<?php

namespace page\components;

use page\models\Page;
use yii\web\UrlRule;

class PageUrlRule extends UrlRule
{

    public $route;
    public $mode = 1;

    public function parseRequest($manager, $request)
    {
        return is_null($model = Page::findOne(trim($request->pathInfo, '/'))) ? false : [$this->route, ['model' => $model, ]];
    }

}
