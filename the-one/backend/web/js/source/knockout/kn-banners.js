if(document.getElementById("banner")&&typeof positions!='undefined') {
    var Banners = function () {
        this.routes = positions;
        this.activeRoute = ko.observable(false);
        this.activePosition = ko.observable(false);
        this.setCurrent = function(){
            if(typeof current!='undefined') {
                this.activeRoute(current.route);
                this.activePosition(current.position);
            }
        };
        this.activeRouteObject = ko.computed(()=> {
            return ko.utils.arrayFirst(this.routes, (e)=> {
                return e.route === this.activeRoute();
            })
        });
        this.setCurrent();
    }
    ko.applyBindings(new Banners(), document.getElementById("banner"));
}