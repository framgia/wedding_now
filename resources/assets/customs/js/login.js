jQuery(document).ready(function($) {
    var $el = $('#district');

    function getCity(city) {
        $.ajax({
            url: route('get.districts', city),
            type: 'GET',
        })
        .done(function(data) {
            $el.empty();
            $el.append(
                $('<option></option>')
                .attr('value', '').text( Lang.get('validation.custom.select.district') )
            );
            $.each(data, function(key, value) {
                $el.append(
                    $('<option></option>')
                    .attr('value', key).text(value)
                );
            });
        })
        .fail(function(message) {
            toastr.error(message);
        });
    }

    if ($('#city').val() != 0) {
        var city = $('#city').val();

        getCity(city);
    }

    $('#city').on('change', function(event) {
        event.preventDefault();

        var city = $(this).val();

        getCity(city);
    });

    $('#btnAgree').prop('checked', false);

    $('#btnAgree').click(function(event) {
        $('#btnRegister').prop('disabled', function(index, value) {
            return !value;
        });
    });
});
