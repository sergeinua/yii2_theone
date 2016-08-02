$(document).ready(function(){
    $('#add-article').on('afterValidate',function(evt, messages, attribute){
        notifier.show('You have Errors');
    })

    var notifier = {
        show:function(message){
            $('body').prepend('<div id="notifier">'+message+'</div>');
            $('#notifier').addClass('show');
        }
    }
})


