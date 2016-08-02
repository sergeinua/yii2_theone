<?php
use yii\helpers\Json;

$user = Yii::$app->user->identity;
?>
<main id="the-one_profile" class="content container-content">
    <h1 class="magazine-heading">Галерея</h1>
    <?= $this->render('_sidebar') ?>
    <section class="profile-create-block">
        <div class="professionals-form">
            <p>Для того,чтобы добавить изображение в галерею, перетащите его на квадрат и нажмите плюс. </p>
            <div id="media-gallery" class="gallery-form">
                <input type="hidden" data-bind="value:sortedList">
                <div class="gallery-input input-block image">

                    <label for="image-file">Изображение</label>
                    <div class="image-drop">
                        <div class="image-status" data-bind="visible:!$root.preparedImageBase64() ">Добавить изображение</div>
                        <div class="image-status active" data-bind="visible:$root.preparedImageBase64()">
                            <img data-bind="attr:{src:$root.preparedImageBase64}">
                        </div>
                        <input type="file" id="image-file" data-bind="event : {
                        dragover : function(data, e){ $root.dragover(e);},
                        change : function() { prepareImage( $element.files[0]); }}">
                    </div>
                    <div data-bind="click : uploadImage" class="plus-button"></div>
                </div>
                <div class="gallery-input input-block video ">
                    <label for="video-file">Видео</label>
                    <div class="videoThumb">
                        <img data-bind="attr:{src:preparedVideoThumbnail}">
                    </div>
                    <input type="text" id="video-file" placeholder="Add video url" data-bind="value : preparedVideo,event:{change:videoInputUpdate,keyup:videoInputUpdate} " class="form-input">
                    <div data-bind="click : uploadVideo" class="plus-button"></div>
                </div>
                <p style="clear:both">Вы можете отсортировать элементы галлереи перетаскивая их.В таком же порядке они будут отображаться на вашей страничке для пользователей</p>
                <p>Чтобы удалить элемент нажмите на значек корзины.</p>
                <div id="sortable-gallery">
                    <ul data-bind="sortable : {data:mediaObjectsList, afterMove: dropCallback}" class="gallery-list">
                        <li class="gallery-list-item" data-bind="attr:{class:'gallery-list-item '+type}">
                            <span >
                                <img data-bind="attr:{src:thumbnail_url}"  alt=""/>
                            </span>
                            <i data-bind="click: $root.removeElement" class="fa fa-trash-o"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <script>
        document,addEventListener('DOMContentLoaded',function(){
            ko.applyBindings(new DragViewModel(<?=Json::encode($user->userMedia) ?>), document.getElementById("media-gallery"));
        })
    </script>
</main>