window.PhonesModel = function(phones){
    this.allData = ko.observableArray(phones);
    this.jsonPhones = ko.computed((e)=>{
        return ko.toJSON(this.allData())
    })
    this.phoneNums = ko.observableArray([]);
    this.phoneNum = ko.observable('');
    this.timeToCall = ko.observable('');
    this.addToPhoneNums = ()=>{
        this.phoneNums.push(this.phoneNum());
    }
    this.approveNumber = ()=>{
        this.allData.push({
            nums:this.phoneNums(),
            time:this.timeToCall()
        })
        this.phoneNums([]);
        this.phoneNum('');
        this.timeToCall('');
    }
    this.removeFromData = (e)=>{
        this.allData.remove(e);
    }
}
