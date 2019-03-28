@extends('admin.index')

@section('subheader', __('page.title.posts'))

@section('content')
<div class="m-portlet m-portlet--mobile">
    <div class="m-portlet__head">
        <div class="m-portlet__head-caption">
            <div class="m-portlet__head-title">
                <h3 class="m-portlet__head-text">
                {{ __('base.list') . ' ' . __('base.posts') }}
                </h3>
            </div>
        </div>
        @include('admin.head_tools')
    </div>
    <div class="m-portlet__body">
        <!--begin: Search Form -->
        <div class="m-form m-form--label-align-right m--margin-top-20 m--margin-bottom-30">
            <div class="row align-items-center">
                <div class="col-xl-8 order-2 order-xl-1">
                    <div class="form-group m-form__group row align-items-center">
                        <div class="col-md-4">
                            <div class="m-input-icon m-input-icon--left">
                                <input type="text" class="form-control m-input m-input--solid" placeholder="{{ __('base.placeholder.search') }}" id="generalSearch">
                                <span class="m-input-icon__icon m-input-icon__icon--left">
                                    <span>
                                        <i class="la la-search"></i>
                                    </span>
                                </span>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="m-form__group m-form__group--inline">
                                <div class="m-form__label">
                                    <label class="m-label m-label--single">{{ __('base.tag') }}:</label>
                                </div>
                                <div class="m-form__control">
                                    {!! Form::select('m_form_tag', $tag, null, ['class' => 'form-control m-input m-input--solid', 'id' => 'm_form_tag', 'placeholder' => __('base.all')]) !!}
                                </div>
                            </div>
                            <div class="d-md-none m--margin-bottom-10"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 order-1 order-xl-2 m--align-right">
                    <a href="{{ route('posts.create') }}" class="btn btn-accent m-btn m-btn--custom m-btn--icon m-btn--air m-btn--pill">
                        <span>
                            <i class="la la-plus"></i>
                            <span>
                                {{ __('base.create') . ' ' . __('base.posts') }}
                            </span>
                        </span>
                    </a>
                    <div class="m-separator m-separator--dashed d-xl-none"></div>
                </div>
            </div>
        </div>
        <!--end: Search Form -->

        <!--begin: Datatable -->
        <div class="m_datatable" id="local_data"></div>
        <!--end: Datatable -->
    </div>
</div>

<div class="modal fade" id="m_select2_modal" role="dialog" aria-labelledby="" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="">{{ __('base.view') . ' ' . __('base.post') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true" class="la la-remove"></span>
                </button>
            </div>
            {!! Form::open(['method' => 'PUT', 'class' => 'm-form m-form--fit m-form--label-align-right', 'files' => true, 'id' => 'form']) !!}
                <div class="modal-body">
                    <div class="form-group m-form__group row">
                        {!! Form::label('title', __('base.title'), ['class' => 'col-form-label col-lg-2 col-sm-12']) !!}
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            {!! Form::text('title', '', ['class' => 'form-control m-input', 'placeholder' => __('base.enter_your') . ' ' . __('base.title')]) !!}
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        {!! Form::label('tag', __('base.tag'), ['class' => 'col-form-label col-lg-2 col-sm-12']) !!}
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            <select name="tag[]" id="tag" class="form-control m-select2" aria-describedby="emailHelp" multiple>
                                @foreach ($tag as $value)
                                    <option value="{{ $value }}">{{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group m-form__group row">
                        {!! Form::label('content', __('base.content'), ['class' => 'col-form-label col-lg-2 col-sm-12']) !!}
                        <div class="col-lg-10 col-md-10 col-sm-12">
                            {!! Form::textarea('content', '', ['class' => 'summernote']) !!}
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-brand m-btn" data-dismiss="modal">Close</button>
                    <button type="submit" id="update_post" class="btn btn-secondary m-btn">{{ __('base.update') }}</button>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript" async>
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

                console.log(tag)

                $('#tag').val(tag)
                $('#tag').trigger('change')

                $('.summernote').summernote('code', data.content)

                $('#form').on('click', '#update_post', function(event) {
                    event.preventDefault()

                    submitForm(route('posts.update', id), 'PUT')
                })
            })
            .fail(function(message) {
                showError(message)
            })
        })

        function submitForm(route, method) {
            $.ajax({
                url: route,
                type: method,
                cache: false,
                contentType: false,
                processData: false,
                data: new FormData($('form#form')[0])
            })
            .done(function(message) {
                toastr.success(message)
            })
            .fail(function(message) {
                showError(message)
            })
        }

        function showError(message) {
            var getError = $.parseJSON(message.responseText)

            $.each(getError.errors, function (key, value) {
                toastr.error(value);
            })
        }

        function getUserList() {
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

        getUserList()
    })
</script>
@endsection
