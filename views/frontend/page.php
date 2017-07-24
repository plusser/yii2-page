<?php 

$this->title = $model->title;

$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $model->keywords,
]);

$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->description,
]);

echo $model->content;
