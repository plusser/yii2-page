<?php

namespace page\components;

use yii\base\Action;

class PageAction extends Action
{

    public $viewName = 'page';

    public function run($model)
    {
        if(!empty($model->layout)){
            $this->controller->layout = $model->layout;
        }

        return is_null($model) ? NULL : $this->controller->render($this->viewName, [
            'model' => $model,
        ]);
    }

}
