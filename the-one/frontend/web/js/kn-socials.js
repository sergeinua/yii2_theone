
window.SocialsModel = function(allSocials,selected){
    var self = this;
    self.opened = ko.observable(false);
    this.allSocials = allSocials;
    this.url = ko.observable('');
    this.selectedState= ko.observable(false);
    this.clickOption = function(d){
        self.opened(false);
        self.selectedState(d);
    }
    this.placeholder = ko.computed(function(){
        console.log(self.selectedState().site);
        return self.selectedState().site;
    })
    this.buttonText = ko.computed(function(){
        var selected = self.selectedState();
        if(!selected){
            return 'Выбрать <i class="fa fa-arrow-down "></i>'
        }
        return '<i class="'+selected.class+'"></i>'+selected.name;
    })
    this.releaseDropdown = function(e,v){
        v.stopPropagation();
        // console.log('adasdasd');
        self.opened(!self.opened())
    }

    if(selected){
        this.url(selected.url);
        this.selectedState(selected.social)
    }
}

window.multipleSocials  = function(allSocials,selectedSocials){
    var self = this;

    self.allSocials = allSocials;
    self.socialModels = ko.observableArray([]);
    self.socialsJson = ko.computed(function(){
        var a = [];
        var socialModels = self.socialModels();
        for ( var i in socialModels){
            var  el = {};
            el.social = socialModels[i].selectedState();
            el.url = socialModels[i].url();
            a.push(el)
        }
        return ko.toJSON(a);
    })
    self.addSocialModel = function(){
        self.socialModels.push(new SocialsModel(self.allSocials))
    }
    self.removeSocial = function (social) {
        self.socialModels.remove(social);
    }
    self.limitIsReached = ko.computed(function(){
        return self.socialModels().length<7;
    })
    document.addEventListener('mouseup',function(){
        var socialModels = self.socialModels();
        for(var i in socialModels){
            socialModels[i].opened(false);
        }

    })
    if(selectedSocials){
        for (var i in selectedSocials){
            console.log(selectedSocials[i]);
            self.socialModels.push(new SocialsModel(self.allSocials,selectedSocials[i]))
        }
    }

}