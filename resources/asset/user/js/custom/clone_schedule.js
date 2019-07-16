jQuery(document).ready(function ($) {
    $('body').on('click', '.clone-schedule', function (event) {
        
        event.preventDefault();

        $.ajax({
            type: 'POST',
            url: route('client.real-wedding.copy'),
            data: new FormData($('form#form-clone-schedule')[0]),
        }).done(function(event) {
            window.location.href = route('admin.user.index');
        }).fail(function() {
            toastr.error(Lang.get('base.error'), Lang.get('base.error_label'));
        });
    });
});
