jQuery(document).ready(function($) {

    $(window).scroll(function() {

        var skip = $('.articles-listing-items-area').attr('data-skip');

        if (skip != null) {

            clearTimeout($.data(this, 'scrollCheck'));

            $.data(this, 'scrollCheck', setTimeout(function() {

                var scroll_position_for_post_load = $(window).height() + $(window).scrollTop();

                if (scroll_position_for_post_load >= ($(document).height() - $('.footer-main-block').height() - 200)) {

                    $.get(route('client.post.loadMore', { skip: skip }), function(data) {

                        $(data).hide().appendTo('.articles-listing-items-area').fadeIn();

                        $('.articles-listing-items-area').attr('data-skip', parseInt(skip) + 10);
                    })
                }
            }, 150));
        }
    });
});
