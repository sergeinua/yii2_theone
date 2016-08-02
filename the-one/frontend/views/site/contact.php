<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ContactForm */
/* @var $contactSettings array */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;



?>



<!--<script src="http://maps.googleapis.com/maps/api/js?libraries=places&language=ru"></script>-->
<script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyD0ZzaItT4aKZlz828sdfPZWCStnH2Bzg8&language=ru" async="" defer="defer" type="text/javascript"></script>
<div class="content contact-page container-content">
    <h1 class="magazine-heading">Контакты</h1>
    <div class="contacts-block">
        <?=$this->render('contact/phones',[
            'phones'=>\yii\helpers\Json::decode($contactSettings['contact_phones'])
        ])?>
        <?=$this->render('contact/emails',[
            'emails' => \yii\helpers\Json::decode($contactSettings['contact_emails'])
        ])?>
        <?=$this->render('contact/adress',[
            'adress' => $contactSettings['contact_adress']
        ])?>

    </div>
    <?=$this->render('contact/socials',[
    ])?>
    <div class="contacts-footer">
        <div class="contact-form">
            <?=$this->render('contact/form',[
                'model' => $form
            ])?>
        </div>
        <div id="contact-map">

        </div>
        <!--script>
            document.addEventListener('DOMContentLoaded',function(){
                window.initContact(<!?=$contactSettings['contactPlace']->lat ?>,<!?=$contactSettings['contactPlace']->lng ?>,"contact-map")
            })
        </script>
        <a href="https://goo.gl/maps/VqLupkfv4sC2" role="link" title="Наше местонахождение" target="_blank" class="map-link">Наше местонахождение</a-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script>
            $(document).ready(function(){
                var myLatLng = {lat: <?= $contactSettings['contactPlace']->lat; ?>, lng: <?= $contactSettings['contactPlace']->lng; ?>};

                var map = new google.maps.Map(document.getElementById('contact-map'), {
                    zoom: 14,
                    center: myLatLng
                });

                var marker = new google.maps.Marker({
                    position: myLatLng,
                    map: map,
                    title: 'The ONE'
                });
            });
        </script>
    </div>
</div>
