var TelephonesViewModel = function(telephones){
    var _this= this;
    _this.allPhones = ko.observableArray(telephones);
    _this.jsonPhones = ko.computed(function(e){
        return ko.toJSON(_this.allPhones());
    });
    _this.phone = ko.observable('');

    _this.addPhone = function(){
        if(_this.phone()){
            _this.allPhones.push(_this.phone());
            _this.phone('')
        }else{
            rclNotify('error','Вы не ввели номер')
        }
    };
    _this.checkForNumbers = function(v,e){
        return event.charCode >= 48 && event.charCode <= 57;

    };
    _this.lessThanThree = ko.computed( function(){
        return _this.allPhones().length<3;
    });
    _this.removePhone =function (e){
        _this.allPhones.remove(e);
    }
}