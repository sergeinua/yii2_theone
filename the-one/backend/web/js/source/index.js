var ReactDOM = require('react-dom');
var React = require('react');
var TermGroupComponent = require('./attribute-pick.jsx');
window.notify = require('./notifiers.jsx');
require('./color-pick.jsx');
require('./knockout/kn-select2-binding.js');
require('./knockout/kn-banners.js');
require('./knockout/kn-contact-emails.js');
require('./knockout/kn-contact-phones.js');
require('./knockout/kn-social-select.js');

var CommentsComponent = require('./admin-comments.jsx');
window.onload = function () {


    /**
     * Terms for attributes page
     */
    $('#load-terms').on('change', function () {
        if ($(this).val() !== '')
            $.getJSON('/terms/get-term-groups?parentId=' + $(this).val())
                .done(function (c) {
                    $('#react_thing').empty();
                    ReactDOM.render(
                        < TermGroupComponent terms={c}/>, document.getElementById('react_thing')
                    );
                });
    });
    /**
     * React comments in user edit page
     */

    if ($('#react-admin-comments').length) {
        ReactDOM.render(
            <CommentsComponent comments={comments}/>, document.getElementById('react-admin-comments')
        );
    }
    /**
     * A list of articles for any select2 e lement
     */
    if ($('.select2.articles').length) {
        $('.select2.articles').select2({

        });
    }

    if ($('.select2.maps').length){
        $('.select2.maps')
    }
}