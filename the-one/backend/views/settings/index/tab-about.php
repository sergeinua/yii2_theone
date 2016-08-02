<div role="tabpanel" class="tab-pane clearfix " id="about">
    <div class="col-md-12 ">
        <div class="panel panel-default">
            <div class="panel-heading">Контент первого блока</div>
            <div class="panel-body">
                <div class="col-md-5">
                    <?php if ($model->about_block1_image) {
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->about_block1_image)
                            , ['class' => 'file-preview-image']);
                    } ?>
                    <?= $form->field($model, 'about_block1_image')->widget(\reclamare\file\FileInput::className(), $widgetOptions) ?>
                    <?php unset($widgetOptions['pluginOptions']['initialPreview']); ?>
                </div>
                <div class="col-md-7">
                    <?= $form->field($model, 'about_block1_text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
//                        'preset' => 'full',
                        'clientOptions' => [
                            'filebrowserUploadUrl' => '/img/upload'
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Контент второго блока</div>
            <div class="panel-body">
                <?=$form->field($model,'about_block2_heading') ?>
                    <?= $form->field($model, 'about_block2_text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'clientOptions' => [
                            'filebrowserUploadUrl' => '/img/upload'
                        ]
                    ]); ?>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Контент третьего блока</div>
            <div class="panel-body">

                <div class="col-md-6">
                    <?=$form->field($model,'about_block3_heading') ?>
                    <?= $form->field($model, 'about_block3_text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'clientOptions' => [
                            'filebrowserUploadUrl' => '/img/upload'
                        ]
                    ]); ?>
                </div>
                <div class="col-md-5">
                    <?php if ($model->about_block3_image) {
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->about_block3_image)
                            , ['class' => 'file-preview-image']);
                    } ?>
                    <?= $form->field($model, 'about_block3_image')->widget(\reclamare\file\FileInput::className(), $widgetOptions) ?>
                    <?php unset($widgetOptions['pluginOptions']['initialPreview']); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Контент четвёртого блока</div>
            <div class="panel-body">
                <div class="col-md-6">
                    <?php if ($model->about_block4_image) {
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->about_block4_image)
                            , ['class' => 'file-preview-image']);
                    } ?>
                    <?= $form->field($model, 'about_block4_image')->widget(\reclamare\file\FileInput::className(), $widgetOptions) ?>
                    <?php unset($widgetOptions['pluginOptions']['initialPreview']); ?>
                </div>
                <div class="col-md-6">
                    <?=$form->field($model,'about_block4_heading') ?>
                    <?= $form->field($model, 'about_block4_text')->widget(\dosamigos\ckeditor\CKEditor::className(), [
                        'options' => ['rows' => 6],
                        'clientOptions' => [
                            'filebrowserUploadUrl' => '/img/upload'
                        ]
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
</div>