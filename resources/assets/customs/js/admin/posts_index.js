$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    $('.summernote').summernote({
        tabsize: 4,
        height: 400,
        callbacks: {
            onImageUploadError: function(msg, event) {
                toastr.error( Lang.get('base.error') );
            },
            onMediaDelete: function(target) {
                var filename = target[0].src.split('/').pop()
                deleteFile(filename);
            },
            onImageUpload: function(files, editor, welEditable) {
                sendFile(files[0], editor, welEditable);
            }
        }
    })

    function deleteFile(file) {
        $.ajax({
            url: route('posts.delete.file', file),
            type: 'DELETE',
            data: { 'file': file }
        })
        .done()
        .fail(function(message) {
            showError(message)
        })
    }

    function sendFile(file, editor, welEditable) {
        data = new FormData();
        data.append('file', file);

        $.ajax({
            url: route('posts.send.file'),
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: data
        })
        .done(function(path) {
            var urlOrigin = window.location.origin  + '/'; // http://127...8000/path_file_name
            $('.summernote').summernote('insertImage', urlOrigin + path)
        })
        .fail(function(message) {
            showError(message)
        })
    }

    $('#m_select2_modal').on('shown.bs.modal', function() {
        $('#tag').select2({
            placeholder: Lang.get('base.select') + ' ' + Lang.get('base.tag'),
            tags: true
        })
    })

    var Datatable = {
        init:function(data) {
            var e, a;
            e = JSON.parse(data)
            a = $('.m_datatable').mDatatable({
                data: {
                    type: 'local', source: e, pageSize: 10
                },
                layout: {
                    theme: 'default',
                    class: '',
                    scroll: !1,
                    footer: !1
                },
                sortable: !0,
                pagination: !0,
                search: {
                    input: $('#generalSearch')
                },
                columns: [
                    {
                        field: 'id',
                        title: '#',
                        width: 50,
                        sortable: !1,
                        textAlign: 'center',
                        selector: { class: 'm-checkbox--solid m-checkbox--brand' }
                    },
                    {
                        field: 'title',
                        title: Lang.get('base.title')
                    },
                    {
                        field: 'tags',
                        title: Lang.get('base.tag'),
                        template: function(e) {
                            var badge = '';

                            e.tags.forEach(function(element) {
                                badge += '<span class="m-badge m-badge--success m-badge--wide">' + element.name + '</span>';
                            });

                            return badge;
                        }
                    },
                    {
                        field: 'comments_count',
                        title: Lang.get('base.comment'),
                        template:function(e) {
                            return '<span class="m-badge m-badge--success m-badge--wide">' + e.comments_count + '</span>';
                        }
                    },
                    {
                        field: 'user.name',
                        title: Lang.get('base.user')
                    },
                    {
                        field: 'created_at',
                        title: Lang.get('base.created_at'),
                    },
                    // {
                    //     field: 'status',
                    //     title: Lang.get('base.status'),
                    // },
                    {
                        field: 'Actions',
                        title: 'Actions',
                        width: 100,
                        overflow: 'visible',
                        template: function(e, a, i) {
                            return `
                                <div class="dropdown">
                                    <a href="#" class="btn m-btn m-btn--hover-accent m-btn--icon m-btn--icon-only m-btn--pill" data-toggle="dropdown">
                                        <i class="la la-ellipsis-h"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item get-post" data-toggle="modal" data-target="#m_select2_modal" href="#">
                                            <i class="la la-edit"></i> ${Lang.get('base.edit')}
                                        </a>
                                    </div>
                                </div>
                            `;
                        }
                    }
                ]
            }),
            $('#m_form_tag').on('change', function() {
                a.search($(this).val(), 'tags')
            }),
            $('#m_form_tag').selectpicker()
        }
    }

    $('body').on('click', '.get-post', function(event) {
        event.preventDefault()

        var id = $(this).closest('tr').find('td:eq(0) input[type="checkbox"]').val()
        $('#post_id').val(id)

        $.ajax({
            url: route('posts.show', id),
            type: 'GET',
        })
        .done(function(data) {
            $('#title').val(data.title)

            var tag = []
            $.each(data.tags, function(index, val) {
                tag.push(val.name)
            })

            $('#tag').val(tag)
            $('#tag').trigger('change')

            $('.summernote').summernote('code', data.content)
        })
        .fail(function(message) {
            showError(message)
        })
    })

    $('body').on('click', '#update_post', function(event) {
        event.preventDefault()

        var id = $('#post_id').val()

        $.ajax({
            url: route('posts.update', id),
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($('form#formUpdate')[0])
        })
        .done(function(message) {
            reloadDatatable()
            toastr.success(message)
        })
        .fail(function(message) {
            showError(message)
        })
    })

    function showError(message) {
        var getError = $.parseJSON(message.responseText)

        $.each(getError.errors, function (key, value) {
            toastr.error(value);
        })
    }

    function getPostList() {
        $.ajax({
            url: route('posts.list'),
            type: 'GET',
        })
        .done(function(data) {
            Datatable.init(data)
        })
        .fail(function() {
            console.log('error')
        });
    }

    $('#tag').select2({
        placeholder: Lang.get('base.select') + ' ' + Lang.get('base.tag'),
        tags: true
    })

    $('#form').on('click', '#reset', function(event) {
        // remove text from summernote was render
        $('.note-editable').empty()
        $('.select2-selection__rendered').empty()
    })

    getPostList()

    function reloadDatatable() {
        $('.m_datatable').mDatatable().destroy();
        getPostList();
    }
})
