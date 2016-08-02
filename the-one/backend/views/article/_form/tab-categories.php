<div role="tabpanel" class="tab-pane" id="profile">
    <?php foreach ($model->termGroups as $k => $v): ?>
        <div class="col-md-6">
            <?= $form->field($model, 'terms[' . $v->id . ']')
                ->dropDownList(
                    \yii\helpers\ArrayHelper::map($v->terms, 'id', 'name'),
                    ['prompt' => 'Выберите..'])
                ->label($v->name); ?>
        </div>
    <?php endforeach; ?>

    <?php if ($category->hasColor): ?>
        <label class="control-label">Цвета</label>
        <div id="reactColor">
        </div>
        <!--TODO:Переместить в ассет-->
        <style>
            .colorBlock{
                cursor:pointer;
                padding:5px;
                float:left;
            }
            .colorSquare{
                text-shadow:1px 1px 1px white;
            }
        </style>
    <?php endif; ?>

    <!--TODO:Переместить в скрипт-->
</div>