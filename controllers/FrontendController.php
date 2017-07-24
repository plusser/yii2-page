<?php 

namespace page\controllers;

use yii\web\Controller;
use page\components\PageAction;

class FrontendController extends Controller
{

    public function actions()
    {
        return [
            'page' => [
                'class' => PageAction::className(),
            ],
        ];
    }

}
