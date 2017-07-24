<?php 

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;

?>

<div class="page-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->field($model, 'id')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'keywords')->textInput(['maxlength' => true]); ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6, 'maxlength' => true]); ?>

    <?php echo $form->field($model, 'layout')->dropDownList($this->context->module->layoutList); ?>

    <?php echo $form->field($model, 'content')->widget(TinyMce::className(), [
        'options' => ['rows' => 12],
        'language' => 'ru',
        'clientOptions' => [
            'plugins' => [
                'advlist autolink lists link charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table contextmenu paste image',
            ],
            'toolbar' => 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
            'file_picker_callback' => alexantr\elfinder\TinyMCE::getFilePickerCallback(Yii::$app->urlManager->createUrl(['elfinder/tinymce'])),
        ],
    ]); ?>

    <div class="form-group">
        <?php echo Html::submitButton('Сохранить', ['class' => 'btn btn-success', ]); ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
