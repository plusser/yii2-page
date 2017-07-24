<?php 

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Страницы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

$M = $this->context->module;

?>

<div class="page-view">

    <h1><?php echo Html::encode($this->title); ?></h1>

    <p><?php echo $this->context->getUpdateButton($model); ?> <?php echo $this->context->getDeleteButton($model); ?></p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'keywords',
            'description',
            [
                'attribute' => 'layout',
                'value' => isset($M->layoutList[$model->layout]) ? $M->layoutList[$model->layout] : $model->layout,
            ],
            'content:ntext',
        ],
    ]); ?>

</div>
