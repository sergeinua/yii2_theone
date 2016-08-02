/**
 * Create custom class bindings
 */
ko.bindingHandlers['class'] = {
    'update': function(element, valueAccessor) {
        if (element['__ko__previousClassValue__']) {
            $(element).removeClass(element['__ko__previousClassValue__']);
        }
        var value = ko.utils.unwrapObservable(valueAccessor());
        $(element).addClass(value);
        element['__ko__previousClassValue__'] = value;
    }
};

/**
 * Create AlertViewModel class
 *
 * @constructor
 */
function AlertViewModel(){
    var self = this;
    self.alertModel= function(data, delay){
        var self = this;
        self.id = ko.observable(data.id);
        self.message = data.message;
        self.alertClass = ko.observable('alert-' + data.role);
        self.data = new Date();
        self.ticker = null;
        self.visible = ko.observable(false);
        self.delay = delay || 5000;
        self.removeDuration = 400;
        self.removeAlert = function(){
            setTimeout(function(){ self.visible(false) },self.removeDuration);
        };
        /**
         * Showing alert and then remove it method
         */
        self.showSelf = function(){
            self.visible(true);
            self.ticker = setTimeout(function(){
                self.rm = self.alertClass("remove");
                self.removeAlert();
            },self.delay);
        };
        /**
         * Alert remove method
         */
        self.dismiss = function(){
            self.rm = self.alertClass("remove");
            self.removeAlert();
            clearTimeout(self.ticker);
        };
        /**
         *  Stop the removing timer method
         */
        self.stopTicker = function(){
            clearTimeout(self.ticker);
        };
        /**
         * Start the removing timer again
         */
        self.startTicker = function(){
            self.ticker = setTimeout(function(){
                self.rm = self.alertClass("remove");
                self.removeAlert();
            },self.delay);
        };
        self.showSelf();
    };
    /**
     * Create array of alert-messages and fill messagesArray with new alert messages
     */
    self.messagesArray = ko.observableArray([]);
    self.addMessage = function(role, message){
        var count = self.messagesArray().length;
        self.messagesArray.unshift(new self.alertModel({
            message: message,
            role: role,
            id: (count + 1)
        }));
    }
}

/**
 * Create new object with AlertViewModel class
 */
var alertViewModelInstance = new AlertViewModel();
/**
 * Applying bindings
 */
ko.applyBindings(alertViewModelInstance, document.getElementById('alerts-component'));

/**
 * Create vanillaJS extension using AlertViewModel class
 */
window.rclNotify = function(role, message){
    if(typeof role !== 'string' || !message){
        console.error("Watch your parameters!");
    }
    alertViewModelInstance.addMessage(role,message);
};
