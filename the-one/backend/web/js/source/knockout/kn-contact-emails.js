window.EmailsModel = function(emails){
    this.allData = ko.observableArray(emails);
    this.jsonEmails = ko.computed((e)=>{
        return ko.toJSON(this.allData());
    })
    this.email = ko.observable('');

    this.addEmail = ()=>{
        this.allData.push(this.email());
        this.email('')
    }

    this.removeEmail = (e)=>{
        this.allData.remove(e);
    }

}