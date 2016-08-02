<div role="tabpanel" class="tab-pane active clearfix " id="contacts">
    <div id="phoneAdder" class="clearfix">
        <?= $form->field($model, 'contact_phones')->hiddenInput([
            'data'=>[
                'bind'=>'value:$root.jsonPhones'
            ]
        ])->label('Контактные номера'); ?>
        <div class="col-md-3 panel panel-default">
            <div class="panel-heading">
                Форма добавление номера
            </div>
            <div class="panel-body">
                <span>Номера телефонов</span>
                <ul data-bind="foreach:$root.phoneNums">
                    <li data-bind="text:$data">

                    </li>
                </ul>
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Введите номер" data-bind="value:phoneNum" >
                    <span class="input-group-btn">
                        <button data-bind="click:addToPhoneNums" class="btn btn-default">+</button>
                </div>
            </div>
            <div>
                <span>Время:</span>
                <div class="form-group">
                <input type="text" data-bind="value:$root.timeToCall" class="form-control">
                    </div>
                <div class="form-group">
                <button data-bind="click:approveNumber" class="btn btn-default">Добавить блок</button>
                </div>
            </div>
        </div>
        <ul data-bind="foreach:$root.allData" class="col-md-9">
            <div class="col-md-3 phoneBlockData panel panel-default">
                <button data-bind="click:$root.removeFromData" class="purge btn btn-danger">X</button>
                <label for="">Номера:</label>
                <ul data-bind="foreach:nums">
                    <li data-bind="text: $data"></li>
                </ul>
                <label for="">Время:</label>
                <span data-bind="text:time"></span>
            </div>
        </ul>


    </div>
    <div id="emailAdder" >
        <div class="col-md-6 panel panel-default">
            <div class="panel-body">
        <?= $form->field($model, 'contact_emails')->hiddenInput([
            'data'=>[
                'bind'=>'value:$root.jsonEmails'
            ]
        ])->label('Emails'); ?>

            <div data-bind="foreach:$root.allData" class="badges clearfix">
                <a  data-bind="attr:{href:'mailto:'+$data}">
                    <span data-bind="text:$data "></span><span class="badge" data-bind="click:$root.removeEmail">x</span>
                </a>
            </div>
            <div class="input-group">
                <input type="text" class="form-control" placeholder="Введите email" data-bind="value:email" >
                    <span class="input-group-btn">
                        <button data-bind="click:addEmail" class="btn btn-default">+</button>
            </div>
        </div>
        </div>
    </div>
    <div id="contacts">
        <div class="col-md-6 panel panel-default">
            <div class="panel-body">
                <?= $form->field($model,'contact_adress')->textarea()->label('Адрес') ?>
            </div>
        </div>
    </div>
    <div id="map-marker">
        <div class="col-md-12">
            <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&libraries=places"></script>
            <script>
                var defCoordinates = {
                    lat:<?=$model->contactPlace->lat ?>,
                    lng:<?=$model->contactPlace->lng ?>
                }
            </script>
            <div class="map-block">
                <div class="enter-adress-block">
                    <label for="address-input">Кликните куда нибудь чтобы поместить маркер</label>
                    <input type="hidden" id="address-input" placeholder="Введите Ваш адрес" name="name-adress"
                           value ='<?=$model->contactPlace?$model->contactPlace->address:'' ?>'
                           class="form-control">
                    <?=$form->field($model,'contact_place_id')->hiddenInput(['id'=>'coordinates'])->label(false) ?>
                </div>
                <div id="prof-map" style="width:100%;height:300px;"></div>
            </div>
            <script>
                window.addEventListener('DOMContentLoaded',function(){
                    document.getElementById('initmap').addEventListener('click', function () {
                        initialize();
                    })
                })



            </script>
        </div>
    </div>


    <script>
        document.addEventListener("DOMContentLoaded",function(){
            ko.applyBindings(new PhonesModel(<?=$model->contact_phones?>), document.getElementById("phoneAdder"));
            ko.applyBindings(new EmailsModel(<?=$model->contact_emails ?>), document.getElementById('emailAdder'))
        })
    </script>
</div>