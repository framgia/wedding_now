jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });
    toastr.options = { "preventDuplicates": true };

    $('#user_avatar').click(function() {
        $('#avatar_file').click();
    });

    // read image file
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#img-avatar').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#avatar_file').change(function(e) {
        e.preventDefault();

        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#user_avatar').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);

            readURL(this);;
        }
    });

    var $el = $('#district');

    $('#city').on('change', function(event) {
        event.preventDefault();

        var city = $(this).val();

        $.ajax({
            url: route('get.districts', city),
            type: 'GET',
        })
        .done(function(data) {
            $el.empty();
            console.log(Lang.get('validation.custom.select.district'));
            $el.append(
                $('<option></option>')
                .attr('value', '').text( Lang.get('validation.custom.select.district') )
            );
            $.each(data, function(key, value) {
                $el.append(
                    $('<option></option>')
                    .attr('value', key).text( value )
                );
            });
        })
        .fail(function(message) {
            toastr.error(message);
        });
    });

    $('#save').click(function(event) {
        event.preventDefault();

        submitForm();
    });

    function submitForm() {
        $.ajax({
            url: route('user.update'),
            type: 'POST',
            cache: false,
            contentType: false,
            processData: false,
            data: new FormData($('form#update_profile')[0]),
        })
        .done(function(data) {
            $('.m-card-profile__name').text( $('#name').val() );
            $('.m-card-profile__email').text( $('#email').val() );

            toastr.success(data.message);
        })
        .fail(function(data) {
            var getError = $.parseJSON(data.responseText);
            $.each(getError.errors, function (key, value) {
                toastr.error(value);
            });
        });
    }
});
