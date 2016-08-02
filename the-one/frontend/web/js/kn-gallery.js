/**
 * Create DragModel class
 * @constructor
 */

function MediaItem(data){
    this.url = data.url;
    this.type = data.type;
    this.id = data.id;
    this.thumbnail_url = data.thumbnail_url;
}
function DragViewModel(video) {
    var vimeoRegexp = /^(http|https):\/\/w{0,3}.?vimeo.com\/(channels\/\w+\/)?(\d+)/;
    var youTubeRegexp =/^(http|https):\/\/w{0,3}.?(youtu.be|youtube.com)\/(watch\?v=)?(.+)$/;
    var self = this;
    self.currentType = ko.observable();

    self.mediaObjectsList = ko.observableArray([]);
    self.sended = ko.observable(false);
    if(video){
        for(var i in video){
            self.mediaObjectsList.push(new MediaItem(video[i]));
        }
    }
    //Поскольку getJSON работает только один раз на
    // ссылку мне пришлось прибегнуть к вот такой вот чепуйхне.
    var cachedThumbs = [];

    /**
     * Отсортированый список
     *
     */

    self.sortedList = ko.computed(function(){
        return ko.toJSON(self.mediaObjectsList());
    });

    /**
     * Подготовленное изображение
     */

    self.preparedImage = ko.observable('');
    self.preparedImageBase64  = ko.observable('')
    /**
     * Подготовленное видео
     */
    self.preparedVideo = ko.observable('');
    self.preparedVideoThumbnail = ko.observable('')
    /**
     * Готовим изображение к загрузке
     */
    self.prepareImage = function (data) {
        var reader = new FileReader();
        reader.readAsDataURL(data);
        reader.onload = function(e){
            self.preparedImageBase64(e.target.result);
            self.preparedImage(data);
        }
    }
    self.removeElement = function(a,b){
        self.sended(true);
        if(confirm('Вы действительно хотите удалить это?')){
            $.ajax({
                url:'/api/profile/remove-gallery-item',
                data:{'item':a},
                dataType: "json",
                type:'post',
                success:function(resp){
                    self.mediaObjectsList.remove(a);
                    self.sended(false);
                    rclNotify('information','Изображение удалено.');
                },
                error:function(resp){
                    rclNotify('error',resp.responseJSON.message);
                    self.sended(false);
                }
            })
        }
    }
    /**
     * Загружаем изображение
     */
    self.uploadImage = function () {
        self.sended(true);
        var formData = new FormData();
        formData.append('image',self.preparedImage());
        $.ajax({
            url:'/api/profile/image-gallery-upload',
            data:formData,
            dataType: "json",
            type:'post',
            processData:false,
            contentType:false,
            success:function(resp){
                self.mediaObjectsList.push(new MediaItem(resp));
                self.preparedImage('');
                self.preparedImageBase64('');
                self.sended(false);
                rclNotify('information','Изображение успешно загружено.')
            },
            error:function(resp){
                self.sended(false);
                rclNotify('error',resp.responseJSON.message);
            }
        })
    }
    /**
     * Загружаем видео
     */
    self.videoInputUpdate = function() {
        if (self.preparedVideo().match(vimeoRegexp)) {
            var matches = self.preparedVideo().match(vimeoRegexp);
            var id = matches[3];
            if(cachedThumbs['id'+id]){
                self.preparedVideoThumbnail(cachedThumbs['id'+id]);
            }else{
                $.getJSON('http://vimeo.com/api/v2/video/' + id + '.json?callback=?',null, function (e) {
                    cachedThumbs['id'+id] = e[0].thumbnail_medium;
                    self.preparedVideoThumbnail(e[0].thumbnail_medium);
                });
            }
            self.currentType('vimeo');
            return true;
        }

        if (self.preparedVideo().match(youTubeRegexp)) {
            var matches = self.preparedVideo().match(youTubeRegexp);
            var id = matches[4];
            self.preparedVideoThumbnail('http://img.youtube.com/vi/'+id+'/0.jpg')
            self.currentType('youtube');
            return true;
        }
        self.currentType(false);
        self.preparedVideoThumbnail('');

    }
    self.uploadVideo = function () {
        if(self.currentType()) {
            var formData = new FormData();
            formData.append('videoThumb', self.preparedVideoThumbnail());
            formData.append('videoUrl', self.preparedVideo())
            $.ajax({
                url: '/api/profile/video-upload',
                data: formData,
                dataType: "json",
                type: 'post',
                processData: false,
                contentType: false,
                success: function (resp) {
                    self.mediaObjectsList.push(new MediaItem(resp));
                    self.preparedVideo('');
                    self.preparedVideoThumbnail('');
                    self.currentType(false);
                    rclNotify('information', 'Видео успешно добавлено');
                },
                error: function (resp) {
                    rclNotify('error', resp.responseJSON.message);
                }
            })
        }else{
            rclNotify('error','Ссылка на видео должна быть с сайта Vimeo или YouTube');
        }
    }
    self.sendChangedOrder = function(){
        var formData = new FormData();
        formData.append('sortedList',self.sortedList());
        $.ajax({
            url:'/api/profile/changed-order',
            data:formData,
            dataType: "json",
            type:'post',
            processData:false,
            contentType:false,
            success:function(resp){
                //self.mediaObjectsList.push(new MediaItem(resp));
                //self.preparedVideo('');
                //self.preparedVideoThumbnail('');
                //rclNotify('information','Отсортировано');
            },
            error:function(resp){
                //rclNotify('error',resp.responseJSON.message);
            }
        })
    }
    self.dropCallback = function(){

    }


    $( window ).unload(function(e) {
        self.sendChangedOrder();
    });
}

