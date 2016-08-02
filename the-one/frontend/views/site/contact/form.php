<?php $form = \yii\widgets\ActiveForm::begin(); ?>
    <div class="input-block required">
        <?= $form->field($model,'name')->textInput(['class'=>'form-input'])  ?>
        <span class="required-icon">*</span>
    </div>
    <div class="input-block">
        <?= $form->field($model,'contact')->textInput(['class'=>'form-input']) ?>
    </div>
    <div class="input-block required">
        <?= $form->field($model,'subject')->textInput(['class'=>'form-input'])  ?>
    </div>
    <div class="input-block">
        <?= $form->field($model,'body')->textarea(['class'=>'form-input'])  ?>
    </div>
    <div class="form-footer">
        <button role="button" type="submit" class="btn-dark fa-paper-plane">Написать</button>
    </div>
<?php $form->end(); ?>