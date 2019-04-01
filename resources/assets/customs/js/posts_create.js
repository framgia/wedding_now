$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })

    function showError(message) {
        var getError = $.parseJSON(message.responseText)

        $.each(getError.errors, function (key, value) {
            toastr.error(value);
        })
    }

    $('#form').on('click', '#submit', function(event) {
        event.preventDefault()

        submitForm(route('posts.store'), 'POST')
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

    $('#summernote').summernote({
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
            $('#summernote').summernote('insertImage', urlOrigin + path)
        })
        .fail(function(message) {
            showError(message)
        })
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
})
