<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use page\Module;

$this->title = 'Страницы';
$this->params['breadcrumbs'][] = $this->title;

?>

<div class="page-index">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <p><?php echo $this->context->getCreateButton('Создать страницу'); ?></p>

<?php Pjax::begin(); ?>

<?php echo GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'title',
        'keywords',
        'description',
        [
            'attribute' => 'layout',
            'filter' => Module::$instance->layoutList,
            'value' => function($data){
                return isset(Module::$instance->layoutList[$data->layout]) ? Module::$instance->layoutList[$data->layout] : $data->layout;
            }
        ],

        $this->context->getActionColumn(),
    ],
]); ?>

<?php Pjax::end(); ?>

</div>
