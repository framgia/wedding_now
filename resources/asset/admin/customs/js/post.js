$(document).ready(function () {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let datatablePost = $('#post-table').mDatatable({
        data: {
            type: 'remote',
            source: {
                read: {
                    url: 'post/get-data',
                    method: 'get',
                },

            },
        },
        layout: {
            theme: 'default',
            class: '',
            scroll: false,
            footer: false
        },
        search: {
            input: $('#generalSearch'),
        },
        columns: [
            {
                field: 'id',
                title: '#',
                width: 50,
                sortable: false,
                textAlign: 'center',
                selector: {
                    class: 'm-checkbox--solid m-checkbox--brand'
                }
            }, {
                field: 'title',
                title: Lang.get('base.title')
            }, {
                field: 'tags',
                title: Lang.get('base.tag'),
                template: function (e) {
                    let badge = '';

                    e.tags.forEach(function (element) {
                        badge += '<span class="m-badge m-badge--success m-badge--wide">' + element.name + '</span>';
                    });

                    return badge;
                }
            }, {
                field: 'comments_count',
                title: Lang.get('base.comment'),
                template: function (e) {
                    return '<span class="m-badge m-badge--success m-badge--wide">' + e.comments_count + '</span>';
                }
            }, {
                field: 'user.name',
                title: Lang.get('base.writer')
            }, {
                field: 'created_at',
                title: Lang.get('base.created_at'),
                template: function (data) {
                    return new Date(data.created_at).toLocaleString('vn-Vn', { weekday: "short", year: "numeric", month: "2-digit", day: "numeric" });
                }
            }, {
                field: 'status',
                title: Lang.get('base.status'),
                template: function (data) {

                    switch (data.status) {
                        case 'public': {
                            return Lang.get('base.post_status.public');
                        }
                        case 'unpublic': {
                            return Lang.get('base.post_status.unpublic');
                        }
                        case 'draft': {
                            return Lang.get('base.post_status.draft');
                        }
                    }
                }
            }, {
                field: 'Actions',
                width: 100,
                overflow: 'visible',
                template: function (e) {
                    return '<div class="dropdown">' +
                        '<a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">' +
                        '<i class="la la-ellipsis-h"></i>' +
                        '</a>' +
                        '<div class="dropdown-menu dropdown-menu-right">' +
                        '<a class="dropdown-item show-post" href="' + route('post.show', { id: e.id }) + '">' +
                        '<i class="la la-file"></i>' + Lang.get('base.show') +
                        '</a>' +
                        '<a class="dropdown-item edit-post" href="' + route('post.edit', { id: e.id }) + '">' +
                        '<i class="la la-edit"></i>' + Lang.get('base.edit') +
                        '</a>' +
                        '<a class="dropdown-item delete-post" href="#" data-id="' + e.id + '">' +
                        '<i class="la la-trash"></i>' + Lang.get('base.delete') +
                        '</a>' +
                        '</div>' +
                        '</div>';
                }
            }
        ]
    });

    $('#contents').ckeditor({
        height: 400,
        filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
        filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
        filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
        filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
    });

    $('body').on('click', '.delete-post', function (event) {

        event.preventDefault();

        let id = $(this).attr('data-id');

        swal({
            title: Lang.get('base.confirm_delete'),
            icon: 'warning',
            buttons: true,
            dangerMode: true,
        }).then((willDelete) => {

            if (willDelete) {

                $.ajax({
                    url: route('post.destroy', id),
                    type: 'delete',
                    data: {
                        id: id,
                    }
                }).done(function (data) {

                    datatablePost.reload();

                    swal(Lang.get('base.delete') + '!', Lang.get('base.success'))
                }).fail(function (message) {
                    toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));
                });
            }
        });
    });

    $('#tag').select2({
        placeholder: Lang.get('base.select') + ' ' + Lang.get('base.tag'),
        tags: true
    });

    $('body').on('click', '#submit-create-post', function (event) {

        event.preventDefault();

        let title = $('#title-post').val().trim();

        let topic = $('#topic-select').val();

        let tags = $('#tag').select2('data').map(function (el) {
            return el.text;
        });

        let contents = CKEDITOR.instances.contents.getData();

        $.ajax({
            url: route('post.store'),
            type: 'post',
            data: {
                title: title,
                topic: topic,
                tags: tags,
                contents: contents,
            },
        }).done(function () {

            window.location.href = route('post.index');
        }).fail(function (xhr) {

            switch (xhr.status) {

                case 422: {
                    Object.entries(JSON.parse(xhr.responseText).errors).forEach(function (error) {

                        toastr.error(error[1][0], Lang.get('base.error_label'))
                    });

                    break;
                }
                case 500: {
                    toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));

                    break;
                }
            }
        });
    });

    $('body').on('click', '#submit-edit-post', function (event) {

        event.preventDefault();

        let id = $('#id-post').val();

        let title = $('#title-post').val().trim();

        let topic = $('#topic-select').val();

        let tags = $('#tag').select2('data').map(function (el) {
            return el.text;
        });

        let contents = CKEDITOR.instances.contents.getData();

        $.ajax({
            url: route('post.update', { id: id }),
            type: 'put',
            data: {
                id: id,
                title: title,
                topic: topic,
                tags: tags,
                contents: contents,
            },
        }).done(function () {

            window.location.href = route('post.index');
        }).fail(function (xhr) {

            switch (xhr.status) {

                case 422: {
                    Object.entries(JSON.parse(xhr.responseText).errors).forEach(function (error) {

                        toastr.error(error[1][0], Lang.get('base.error_label'))
                    });

                    break;
                }
                case 500: {
                    toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));

                    break;
                }
            }
        });
    });

    // $('.form-post').validate({
    //     onkeyup: function (element) {
    //         $(element).valid();
    //     },
    //     onsubmit: function (element) {
    //         $(element).valid();
    //     },
    //     rules: {
    //         title: {
    //             required: true,
    //             minlength: 10,
    //         },
    //         topic: {
    //             required: true,
    //         },
    //         contents: {
    //             required: function(textarea) {
    //                 CKEDITOR.instances[textarea.id].updateElement();
    //                 var editorcontent = textarea.value.replace(/<[^>]*>/gi, '');
    //                 return editorcontent.length === 0;
    //             },
    //             minlength: 50,
    //         },
    //         'tags[]': {
    //             required: true,
    //         },
    //     },
    //     highlight: function (element, errorClass, validClass) {
    //         var elem = $(element);
    //         if (elem.hasClass("select2-hidden-accessible")) {
    //             $("#select2-" + elem.attr("id") + "-container").parent().addClass(errorClass);
    //         } else {
    //             elem.addClass(errorClass);
    //         }
    //      },
    //      unhighlight: function (element, errorClass, validClass) {
    //         var elem = $(element);
    //         if (elem.hasClass("select2-hidden-accessible")) {
    //             $("#select2-" + elem.attr("id") + "-container").parent().removeClass(errorClass);
    //         } else {
    //             elem.removeClass(errorClass);
    //         }
    //      },
    //     success: function(e) {
    //         e.remove();
    //     },
    //     errorPlacement: function(error, element) {
    //         if (element.attr('name') == 'contents') {
    //             error.appendTo(element.parents('.parent-content'));
    //         }
    //         else if (element.attr('name') == 'tags[]') {
    //             error.appendTo(element.parents('.parent-tags'));
    //         } else {
    //             error.insertAfter(element);
    //         }
    //     },
    //     submitHandler: function () {


    //     }
    // });
});
