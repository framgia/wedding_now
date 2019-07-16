jQuery(document).ready(function ($) {

    autosize($('.reply-editor'));


    $('body').on('click', '.reply', function (event) {

        let element = $(this);

        let idComment = $(this).attr('data-comment-id');

        let idPost = $(this).attr('data-post-id');

        event.preventDefault();

        $.ajax({
            url: route('post.reply-view'),
            data: {
                idComment: idComment,
                idPost: idPost,
            },
        }).done(function (res) {

            if (element.closest('.box-content').find('.reply-editor-box').length === 0) {

                element.closest('.box-content').append(res);

                autosize($('.reply-editor'));
            }

        }).fail(function () {
            toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
        });
    });

    $('body').on('keydown', '.reply-editor', function (event) {

        if (event.keyCode === 13) {

            if (!event.shiftKey) {

                let contents = $(this).val();

                let idPost = $('.post-id').val();

                if (contents !== '') {

                    $.ajax({
                        url: route('post.reply'),
                        type: 'post',
                        data: {
                            idPost: idPost,
                            contents: contents,
                        },
                    }).done(function (res) {
                        // $('.comment-block').append(res);
                    }).fail(function () {
                        toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
                    });
                }
            }
        }
    });

    $('body').on('keydown', '.comment-editor', function (event) {

        if (event.keyCode === 13) {

            if (!event.shiftKey) {

                let contents = $(this).val();

                let idPost = $('.post-id').val();

                if (contents !== '') {

                    $.ajax({
                        url: route('post.comment'),
                        type: 'post',
                        data: {
                            idPost: idPost,
                            contents: contents,
                        },
                    }).done(function (res) {
                        $('.comment-block').append(res);
                    }).fail(function () {
                        toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
                    });
                }
            }
        }
    });

    $('body').on('click', '.reply-user', function (event) {

        let element = $(this);

        let id = element.attr('data-id');

        $.ajax({
            url: route('post.load-reply', {id: id}),
            type: 'get',
        }).done(function (res) {
            element.closest('.box-content').append(res)
        }).fail(function () {
            toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
        });
    });

});