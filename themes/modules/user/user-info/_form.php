<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\Tabs;
use kartik\file\FileInput;
?>
<div class="user-info-form">

	 <?php $form = ActiveForm::begin([
            'options' => ['enctype' => 'multipart/form-data']
        ]);
    $fieldGroups = [];
    $fields = [];
    $fields[] = $form->field($model, 'sex')->dropDownList(['0'=>'男','1'=>'女','2'=>'保密']);
    $fields[] = $form->field($model, 'qq')->textInput();
    $fields[] = $form->field($model, 'birthday')->textInput();
    $fields[] = $form->field($model, 'location')->textInput();
    $fields[] = $form->field($model, 'signature')->textInput();
    $fieldGroups[] = ['label' => '<i class="glyphicon glyphicon-th-large"></i>' . Yii::t('user', 'BasicInfo'), 
                    'content' =>'<div class="panel panel-primary"><div class="panel-body">'. implode('', $fields).'</div></div>'];
    
    $fields = [];
    $fields[] = $form->field($model, 'score')->textInput();
    $fields[] = $form->field($model, 'signin_day')->textInput();
    $fieldGroups[] = ['label' => '<i class="glyphicon glyphicon-list-alt"></i>' . Yii::t('user', 'Score'),
        'content' =>'<div class="panel panel-primary"><div class="panel-body">'. implode('', $fields).'</div></div>'];
    
    $fields = [];
    $fields[] = $form->field($model, 'image')->label(Yii::t('user', 'Image'))->widget(FileInput::classname(), [
        'options' => ['accept' => 'image/*'],
        //这里的更新头像还没有完善！
        
        'pluginOptions' => [
            'initialPreview' => "<img src='" . Yii::$app->params['siteDomain'] . '/' . $model->image . "' >",
            'initialPreviewConfig' => [
                    'caption' => $model->image,
                    //'url' => Url::to(['/catalog/core/item-img/delete', 'id' => $itemImage->img_id]),
                ],
        ]
    ]);
    $fieldGroups[] = ['label' => '<i class="fa fa-file-image-o"></i>' . Yii::t('user', 'Image'),
        'content' =>'<div class="panel panel-primary"><div class="panel-body">'. implode('', $fields).'</div></div>'];
    
    echo Tabs::widget(['items' => $fieldGroups, 'navType' => 'nav-tabs', 'encodeLabels' => false]);
    ?>
    <div class="form-group">
        <?= Html::submitButton(Yii::t('user', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>
    <?php ActiveForm::end(); ?>
</div>