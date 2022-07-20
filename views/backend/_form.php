<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
use fileManager\Module as FileManagerModule;

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'keywords')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6, 'maxlength' => true]); ?>

    <?php echo $form->field($model, 'layout')->dropDownList($this->context->module->layoutList); ?>

    <?php echo $form->field($model, 'content')->widget(TinyMce::class, [
        'options'       => ['rows' => 12],
        'language'      => 'ru',
        'clientOptions' => [
            'relative_urls'             => false,
            'remove_script_host'        => true,
            'convert_urls'              => true,
            'file_picker_callback'      => \alexantr\elfinder\TinyMCE::getFilePickerCallback(Yii::$app->urlManager->createUrl([FileManagerModule::$instance->id . '/elfinder/tinymce'])),
            'extended_valid_elements'   => 'b,i,b/strong,i/em',
            'toolbar'                   => 'undo redo | styleselect | bold italic | forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
            'plugins'                   => [
                'advlist', 'autolink', 'lists', 'link', 'charmap', 'print', 'preview', 'anchor',
                'searchreplace', 'visualblocks', 'code', 'fullscreen', 'textcolor',
                'insertdatetime', 'media', 'table', 'contextmenu', 'paste', 'image',
            ],
        ],
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success', ]); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
