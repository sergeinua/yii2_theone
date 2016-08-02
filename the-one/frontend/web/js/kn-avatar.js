var AvatarModel = function(image){
    var allowedFileSize = 6000000;
    var allowedFormats = ['gif','jpg','png'];
    var _this = this;
    _this.imgSrc= ko.observable(image||'/images/no-image.gif');
    _this.uploadImage = function(data){
        if(data.size>allowedFileSize){
            rclNotify('error','Файл слишком большой')
            return false;
        }
        if(!$.inArray(data.name.split('.').pop(),allowedFormats)){
            rclNotify('error','Неподдерживаемый тип файла');
            return false;
        };
        var formData = new FormData();
        formData.append('avatar',data);
        $.ajax({
            url:'/api/profile/img-upload',
            data:formData,
            type:'post',
            processData:false,
            contentType:false,
            success:function(resp){
                _this.imgSrc(resp.imgUrl);
            },
            error:function(resp){
                console.log(resp);
                rclNotify('error',resp.statusText);
            }
        })


    }

}