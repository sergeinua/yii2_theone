<div role="tabpanel" class="tab-pane clearfix " id="home">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Изображения в слайдере</div>
            <div class="panel-body">
                <div class="col-md-4">
                    <?php if($model->slide1_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide1_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide1_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide1_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide2_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide2_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide2_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide2_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide3_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide3_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide3_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide3_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide4_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide4_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide4_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide4_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide5_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide5_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide5_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide5_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide6_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide6_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide6_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide6_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide7_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide7_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide7_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide7_link'); ?>
                    </div>
                </div>
                <div class="col-md-4">
                    <?php if($model->slide8_image){
                        $widgetOptions['name'] = '111';
                        $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                            \common\helpers\OneHelper::getImgUrl($model->slide4_image)
                            ,['class'=>'file-preview-image']);
                    } ?>

                    <?= $form->field($model, 'slide8_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>

                    <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                    <div class="slide_link">
                        <?= $form->field($model, 'slide8_link'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Верхний левый блок</div>
            <div class="panel-body">
                <?= $form->field($model,'block_1_heading')->label('Заголовок блока 1'); ?>
                <?= $form->field($model,'block_1_subheading')->label('Подзаголовок блока 1'); ?>
                <?= $form->field($model,'block_1_url')->label('Ссылка'); ?>
                <?php if($model->block_1_image){
                    $widgetOptions['name'] = '111';
                    $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                        \common\helpers\OneHelper::getImgUrl($model->block_1_image)
                        ,['class'=>'file-preview-image']);
                } ?>
                <?= $form->field($model, 'block_1_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>
                <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">Верхний правый блок</div>
            <div class="panel-body">
                <?= $form->field($model,'block_2_heading')->label('Заголовок блока 2'); ?>
                <?= $form->field($model,'block_2_subheading')->label('Подзаголовок блока 2'); ?>
                <?= $form->field($model,'block_2_url')->label('Ссылка'); ?>

                <?php if($model->block_2_image){
                    $widgetOptions['name'] = '111';
                    $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                        \common\helpers\OneHelper::getImgUrl($model->block_2_image)
                        ,['class'=>'file-preview-image']);
                } ?>
                <?= $form->field($model, 'block_2_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>
                <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>

            </div>
        </div>



    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">Блок с цитатой</div>
            <div class="panel-body">
                <?= $form->field($model,'main_page_heading')->label('Заголовок'); ?>
                <?= $form->field($model,'main_page_text')->textarea()->label('Текст '); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Рекламный блок 1</div>
            <div class="panel-body">
                <?php if($model->ads_1_image){
                    $widgetOptions['name'] = '111';
                    $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                        \common\helpers\OneHelper::getImgUrl($model->ads_1_image)
                        ,['class'=>'file-preview-image']);
                } ?>
                <?= $form->field($model, 'ads_1_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>
                <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                <?= $form->field($model,'ads_1_link')->label('Ссылка'); ?>

            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Рекламный блок 2</div>
            <div class="panel-body">
                <?php if($model->ads_2_image){
                    $widgetOptions['name'] = '111';
                    $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                        \common\helpers\OneHelper::getImgUrl($model->ads_2_image)
                        ,['class'=>'file-preview-image']);
                } ?>
                <?= $form->field($model, 'ads_2_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>
                <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                <?= $form->field($model,'ads_2_link')->label('Ссылка'); ?>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Рекламный блок 2</div>
            <div class="panel-body">
                <?php if($model->ads_3_image){
                    $widgetOptions['name'] = '111';
                    $widgetOptions['pluginOptions']['initialPreview'] = \yii\helpers\Html::img(
                        \common\helpers\OneHelper::getImgUrl($model->ads_3_image)
                        ,['class'=>'file-preview-image']);
                } ?>
                <?= $form->field($model, 'ads_3_image')->widget(\reclamare\file\FileInput::className(),$widgetOptions) ?>
                <?php unset($widgetOptions['pluginOptions']['initialPreview']);?>
                <?= $form->field($model,'ads_3_link')->label('Ссылка'); ?>

            </div>
        </div>
    </div>

</div>