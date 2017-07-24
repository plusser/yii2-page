<?php 

namespace page;

use Yii;
use page\components\PageUrlRule;

class Module extends \yii\base\Module
{

    public $frontendRoute = 'page/frontend/page';
    public $layoutList = [];
    public $patternPrefix = 'page';
    public $backendMode = FALSE;

    public static $instance;

    public function init()
    {
        parent::init();

        if(($app = Yii::$app) instanceof \yii\web\Application){
            $app->getUrlManager()->addRules($this->backendMode ? [
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix, 'route' => $this->id . '/backend/index', ],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/create', 'route' => $this->id . '/backend/create', ],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/<id>', 'route' => $this->id . '/backend/view', ],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/update/<id>', 'route' => $this->id . '/backend/update', ],
                ['class' => 'yii\web\UrlRule', 'pattern' => $this->patternPrefix . '/delete/<id>', 'route' => $this->id . '/backend/delete', ],
            ] : [
                ['class' => PageUrlRule::className(), 'pattern' => FALSE, 'route' => $this->frontendRoute, ],
            ], FALSE);
        }

        static::$instance = $this;
    }

}
