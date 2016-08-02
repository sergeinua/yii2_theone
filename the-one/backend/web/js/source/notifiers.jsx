var ReactDOM = require('react-dom');
var React = require('react');
var NotificationSystem = require('react-notification-system');

var  NotifyComponent =  React.createClass({
    componentDidMount:function(){
        var params = this.props.params;
        if(params.length){
            for(var i in params){
                this.refs.notificationSystem.addNotification(params[i]);
            }
        }else{
            this.refs.notificationSystem.addNotification(params);
        }
    },
    render:function(){
        return <NotificationSystem ref="notificationSystem"/>
    }
})
module.exports=  function (params){
        document.getElementById('notify').innerHTML = "";
        ReactDOM.render(
            < NotifyComponent params={params}/>, document.getElementById('notify')
        );
    }
