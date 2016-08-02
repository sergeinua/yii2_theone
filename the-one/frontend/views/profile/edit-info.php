<main id="the-one_profile" class="content container-content">
    <style>
        /** TODO:Move to .css*/
        #kn-telephones li {
            height: 48px;
            margin-top: 5px;
            clear: both;
            line-height: 48px;
        }

        .minus-button {
            cursor: pointer;
        }

        .span-desc {
            color: #aaa;
            font-size: 13px;
        }
    </style>

    <script>
    <?php if($model->user->place) { ?>
        var defCoordinates = {
            "lat": <?= $model->user->place->lat ?>,
            "lng": <?= $model->user->place->lng ?>
        };
    <?php  }?>
    </script>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD0ZzaItT4aKZlz828sdfPZWCStnH2Bzg8" async="" defer="defer" type="text/javascript"></script>
    <!--script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=<!?= Yii::$app->params['googleApiKey']; ?>" async="" defer="defer" type="text/javascript"></script-->

    <h1 class="magazine-heading">Создание / редактирование профиля</h1>
    <?= $this->render('_sidebar') ?>
    <section class="profile-create-block">
        <?php $form = \yii\widgets\ActiveForm::begin(['id'=>'user-profile-form']); ?>
        <!--        FirstName-->
        <div class="input-block">
            <?= $form->field($model->user, 'first_name')->textInput(['class' => 'form-input'])->label('Введите ваше имя') ?>
        </div>
        <!--        /FirstName-->
        <!--        LastName-->
        <div class="input-block">
            <?= $form->field($model->user, 'last_name')->textInput(['class' => 'form-input'])->label('Введите вашу фамилию') ?>
        </div>
        <!--        /Last Name-->
        <!--        LastName-->

        <!--        /Last Name-->
        <!--        Phones-->
        <div class="input-added-block" id="kn-telephones">
            <?= $form->field($model->user, 'phone')->hiddenInput([
                'data' => [
                    'bind' => 'value:$root.jsonPhones'
                ]
            ])->label('Телефон<br/><span style="color:#aaa;font-size:13px">(Вы можете разместить до 3-х телефонов)</span>
') ?>
            <ul data-bind="foreach:$root.allPhones" style="clear:both;">
                <li style="clear:both">
                    <b>
                        <span data-bind="text:$data"></span>
                    </b>

                    <div class="minus-button" data-bind="click:$root.removePhone"></div>
                </li>
            </ul>
            <div class="input-block required input-buttons" data-bind="visible:$root.lessThanThree">
                <input type="phone" id="phone" data-bind="value:$root.phone,event:{keyup:$root.checkForNumbers}" class="form-input">
            </div>
            <div class="input-add-buttons" data-bind="visible:$root.lessThanThree">
                <div class="plus-button" style="display:block;" data-bind="click:$root.addPhone"></div>
                <!--                        <div class="minus-button"></div>-->
            </div>

        </div>

        <!--        /Phones-->
        <!--div class="map-block">
            <div class="enter-adress-block">
                <label for="address-input">Введите адрес (или нажмите на место на карту)</label>
                <input type="text" id="address-input" placeholder="Введите Ваш адрес" name="name-adress"
                       value ='<!?=$model->user->place?$model->user->place->address:'' ?!>'
                       class="form-input">
                <!?=$form->field($model,'placeId')->hiddenInput(['id'=>'coordinates'])->label(false) ?!>
            </div>
            <div id="prof-map"></div>
        </div-->


        <!--        Email-->
        <div class="input-block">
            <label for="email">E-mail<br>
                <span style="color:#aaa;font-size:13px">(Если почтовый адрес под которым вы зарегистрировались (<span
                        style="color:black"><?= $model->user->email ?></span>) является вашим контактным,то можете оставить это поле пустым)</label>
            <?= $form->field($model->user, 'contact_email')->textInput(['class' => 'form-input'])->label(false) ?>
        </div>
        <!--        /Email-->

        <?php if (Yii::$app->user->can('admin')) { ?>
            <p>Вы являетесь администратором сайта</p>
        <?php } else { ?>
            <!--        Role-->
            <div class="input-block">

                <label for="">Выберите кем вы хотите быть на сайте:</label>


                    <div class="input-radio-block">
                        <?= \frontend\components\OneHtml::activeRadio($model->user, 'role', ['id' => 'professional', 'value' => 'professional']); ?>

                        <label for="professional" class="professional">Профессионал</label>
                    </div>
                    <div class="input-radio-block">
                        <?= \frontend\components\OneHtml::activeRadio($model->user, 'role', ['id' => 'user', 'value' => 'user']); ?>
                        <label for="user">Молодожён</label>
                    </div>

            </div>
        <?php } ?><br><br><br>
        <!--        /Role-->
        <!-- Socials Profile -->

        <!--/ Socials Profile -->
        <div class="professionals-form " style=" <?= $model->user->role === 'professional' ? 'display:block' : 'display:none' ?>">
            <div id="multipleSocials">
                <h3>Добавьте ваш профиль в социальной сети</h3>
                <?=$form->field($model->user,'socials')->hiddenInput([
                    'data'=>[
                        'bind'=>'value:socialsJson'
                    ]
                ])->label(false) ?>
                <input type="hidden" data-bind="value:socialsJson">
                <ul data-bind="foreach:socialModels">
                    <li class="socialElement">
                        <div class="socialDropdown">
                            <div class="dropdown">
                                <div aria-haspopup="true" aria-expanded="true" data-bind="event :{ click : $data.releaseDropdown}, html : buttonText" class="btn btn-primary socialTrigger"></div>
                                <ul data-bind="foreach : allSocials,visible:opened" class="dropdown-menu">
                                    <li data-bind="event : {click : $parent.clickOption}" class="dropdown-item"><span data-bind="attr : {class:'fa '+$data.class}"></span><span data-bind="text : $data.name"></span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="social-link">
                            <input type="text" data-bind="value:url,attr:{placeholder:placeholder}" class="form-input">
                        </div>
                        <div data-bind="click : $root.removeSocial" class="minus-button"></div>
                    </li>
                </ul>
                <button type="button" data-bind="event : { click : addSocialModel}, visible : limitIsReached" class="btn btn-default">Добавить</button>
            </div>
            <div class="input-block">
                <label for="">Введите уникальный идентификатор<br>
            <span class="span-desc">
                Страница вашего профиля будет доступна по адресу <?= Yii::$app->params['frontEndDomain'] ?>
                /professional/ваш_ID
            </span>
                </label>
                <?= $form->field($model->user, 'slug')->textInput(['class' => 'form-input'])->label(false) ?>
            </div>
            <?= $form->field($model->userProfessionalInfo, 'organisation_name', ['options' => ['class' => 'input-block']])
                ->textInput(['class' => 'form-input'])->label('Введите имя или название компании') ?>

            <div class="input-block">
                <?= $form->field($model->userProfessionalInfo, 'organisation_info')->textarea()->label('Информация о компании'); ?>
            </div>

            <div class="input-block">
                <?= $form->field($model, 'professionalGroupsIDs', [
                ])->checkboxList(\yii\helpers\ArrayHelper::map($professionalGroups, 'id', 'name'),
                        ['prompt' => 'Выберите..',
                            'class' => 'specialities',
                            'style' => "clear:both;",
                            'template' => '<div class="checkbox">{input}{label}</div>',
                            'item' => function ($index, $label, $name, $checked, $value) {
                                $id = 'chk' . $value;
                                return \yii\helpers\Html::checkbox($name, $checked, [
                                    'value' => $value,
                                    'id' => $id,
                                    'label' => "<label for='{$id}'>{$label}</label>",
                                    'labelOptions' => [
                                        'class' => 'checkbox',
                                        'tagName' => 'div'
                                    ],
                                ]);
                            }
                        ])->label('Выберите специализацию') ?>

            </div>
        </div>
        <div class="guest-form" style=" <?= $model->user->role === 'user' ? 'display:block' : 'display:none' ?>">
            <div class="input-block required">
                <label for="link">Дата свадьбы</label>
                <?=$form->field($model->user,'wedding_date')->widget(\yii\jui\DatePicker::className(),[
                    'options'=>[
                        'class'=>'form-input',
                        'defaultDate'=>date('Y-m-d')],
                    'language' => 'ru',
                    'dateFormat' => 'yyyy-MM-dd',

                ])->label(false); ?>
            </div>
        </div>
        <button class="btn btn-sm" type="button" onclick="document.getElementById('user-profile-form').submit()">
            Сохранить
        </button>
        <?php $form->end(); ?>
    </section>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            ko.applyBindings(new multipleSocials(<?=\yii\helpers\Json::encode(Yii::$app->params['socials']) ?>,<?=$model->user->socials?$model->user->socials:'[]' ?>),document.getElementById('multipleSocials'));

            ko.applyBindings(new AvatarModel('<?=$model->user->avatar?$this->getImgUrl($model->user->avatar):''; ?>'), document.getElementById("kn-avatar"));

            ko.applyBindings(new TelephonesViewModel(<?=$model->user->phone?$model->user->phone:'[]'?>), document.getElementById("kn-telephones"));
            $('.select2').select2();
        });
    </script>
</main>