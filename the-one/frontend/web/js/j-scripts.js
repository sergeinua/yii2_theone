/**
 * An Instagram bindings on homepage
 *
 */

window.onload = function () {

        function InstagramHomeViewModel() {
            var self = this;
            self.photos = ko.observableArray();
            $.getJSON('/api/instagram/photos').success(function ($w) {
                self.photos($w.items);
            });
        }

        var instagramHome = document.getElementById('instagram-home');
        if (instagramHome) {
            ko.applyBindings(new InstagramHomeViewModel(), instagramHome);
        }
        $('.nav a').each(function (index, value) {
            if ($(this).prop("href") === window.location.href) {
                $(this).parent().addClass("active");
            }
        });

        /**
         * Liking of professionals
         */
        if (document.getElementById('professionals-list')) {
            $('button.likes').click(function (e) {
                if(!isLogged){
                    rclNotify('error','Вам необходимо зарегистрироваться,чтобы добавлять пользователей в избранные.')
                    return;
                }
                var _this = $(this);
                var professionalId = _this.data('professional-id');
                $.ajax({
                    url: '/api/social/like',
                    method: 'post',
                    data: {
                        _csrf: $('meta[name="csrf-token"]').attr("content"),
                        professionalId: professionalId
                    },
                    success: function (r) {
                        if(r.liked){
                            _this.addClass('liked');
                            rclNotify('information','Мастер добавлен в закладки');

                        }else{
                            _this.removeClass('liked');
                            rclNotify('information','Мастер удалён из закладок');

                        }
                    }
                });
            })
        }
        /**
         * Liking of articles
         */
        if (document.getElementById('articles')) {
            $('button.likes').click(function (e) {
                if(!isLogged){
                    rclNotify('error','Вам необходимо зарегистрироваться,чтобы добавлять статьи в избранные.')
                    return;
                }
                var _this = $(this);
                var articleId = _this.data('article-id');
                $.ajax({
                    url: '/api/article/like',
                    method: 'post',
                    data: {
                        _csrf: $('meta[name="csrf-token"]').attr("content"),
                        articleId: articleId
                    },
                    success: function (r) {
                        if(r.liked){
                            _this.addClass('liked');
                            rclNotify('information','Статья добавлена в закладки');

                        }else{
                            _this.removeClass('liked');
                            rclNotify('information','Статья удалена из закладок');

                        }
                    }
                });
            })
        }
        /**
         * Liking of article from article page
         */
        if (document.getElementById('art-s')) {
            $('.fa-heart').click(function () {
                if(!isLogged){
                    rclNotify('error','Вам необходимо зарегистрироваться,чтобы добавлять пользователей в избранные.')
                    return;
                }
                var _this = $(this);
                var articleId = _this.data('article-id');
                $.ajax({
                    url: '/api/article/like',
                    method: 'post',
                    data: {
                        _csrf: $('meta[name="csrf-token"]').attr("content"),
                        articleId: articleId
                    },
                    success: function (r) {
                        if (r.liked) {
                            _this.addClass('liked');
                            _this.html(parseInt(_this.html() + 1));


                        } else {
                            _this.removeClass('liked');
                            _this.html(parseInt(_this.html() - 1));
                            rclNotify('information','Мастер удалён из закладки');

                        }
                    }
                });
            })
        }
}
