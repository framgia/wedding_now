jQuery(document).ready(function($) {

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $('.dash-couple-btn-edit').click(function(event) {

        event.preventDefault();

        getScheduleInfo().then(function(res) {

            presentScheduleInfoModal(res);
        }, function() {

            toastr.error(Lang.get('page.message.fail'));
        });
    });

    function getScheduleInfo() {

        return $.ajax({
            url: route('client.get-schedule-info'),
            type: 'GET',
        });
    }

    function presentScheduleInfoModal(object) {

        let my_name = object.user.name;

        let my_avatar = null;

        let partner_name = null;

        let partner_avatar = null;

        let address = object.location != null ? object.location.address : null;

        $('#dateWedding').val(object.marriage_day);

        if (object.schedule_metas.length !== 0) {

            let arr = object.schedule_metas;

            arr.forEach(function(element, index) {

                switch (element.key) {
                    case 'my_name':
                        {
                            my_name = element.value;
                            break;
                        }
                    case 'my_avatar':
                        {
                            my_avatar = element.value;
                            break;
                        }
                    case 'partner_name':
                        {
                            partner_name = element.value;
                            break;
                        }
                    case 'partner_avatar':
                        {
                            partner_avatar = element.value;
                            break;
                        }
                }
            });

            let path = $('.avatar-left').attr('data-path');

            if (my_avatar != null) {

                $('.avatar-left').attr('src', path + '/' + my_avatar);
            }

            if (partner_avatar != null) {

                $('.avatar-right').attr('src', path + '/' + partner_avatar);
            }
        }

        $('#txtNameLeft').val(my_name);

        $('#txtNameRight').val(partner_name);

        $('#txtVenue').val(address);
    }

    $('.dash-btn-change-photo').click(function(event) {

        event.preventDefault();

        $('.img-file').click();
    });

    $('.img-file').change(function(event) {

        event.preventDefault();

        $.ajax({
            url: route('client.schedule-upload-image'),
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: new FormData($('form#upload-image-schedule')[0]),
        }).done(function(res) {


        }).fail(function(xhr) {

            switch (xhr.status) {

                case 422:
                    {

                        var message = JSON.parse(xhr.responseText);

                        var errors = Object.entries(message.errors);

                        errors.forEach(function(value, index) {

                            toastr.error(value[1][0], 'Error!');
                        });

                        break;
                    }
                case 500:
                    {

                        toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));

                        break;
                    }
            }
        })
    });

    $('.save-schedule-info').click(function(event) {

        event.preventDefault();

        $.ajax({
            url: route('client.schedule-update'),
            type: 'POST',
            cache: false,
            processData: false,
            contentType: false,
            data: new FormData($('form#scheduleInfo')[0]),
        }).done(function(res) {

            $('#myModal').modal('hide');

            window.location.reload();

        }).fail(function(xhr, status, error) {

            switch (xhr.status) {

                case 422:
                    {

                        var message = JSON.parse(xhr.responseText);

                        var errors = Object.entries(message.errors);

                        errors.forEach(function(value, index) {

                            toastr.error(value[1][0], 'Error!');
                        });

                        break;
                    }
                case 500:
                    {

                        toastr.error(Lang.get('page.message.fail'), Lang.get('base.error_label'));

                        break;
                    }
            }
        })
    });

    $('.avatar-left').click(function(event) {

        event.preventDefault();

        $('.avatar-left-input').click();
    });

    $('.avatar-left-input').change(function() {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('.avatar-left').attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    $('.avatar-right').click(function(event) {

        event.preventDefault();

        $('.avatar-right-input').click();
    });

    $('.avatar-right-input').change(function() {

        if (this.files && this.files[0]) {

            var reader = new FileReader();

            reader.onload = function(e) {

                $('.avatar-right').attr('src', e.target.result);
            };

            reader.readAsDataURL(this.files[0]);
        }
    });

    let timeoutSearchVenue = null;

    $('#txtVenue').keyup(function(event) {

        event.preventDefault();

        let keyword = $(this).val();

        clearTimeout(timeoutSearchVenue);

        if ('' !== keyword) {

            timeoutSearchVenue = setTimeout(function() {
                $.ajax({
                    url: route('client.get-district', { keyword: keyword }),
                    type: 'GET',
                    beforeSend: function() {
                        $('.spin-custom').removeClass('d-none');
                    }
                }).done(function(res) {

                    let html = '';

                    res.forEach(function(element) {

                        let li = '<li><p data-id=' + element.id + '>' + element.name + ', ' + element.city.name + '</p></li>';

                        html += li;
                    });

                    $('.list-venue').html(html);

                    if (0 !== res.length) {

                        $('.search-venue').show();
                    } else {

                        $('.search-venue').hide();
                    }

                    setTimeout(function() {

                        $('.spin-custom').addClass('d-none');
                    }, 300);
                }).fail(function() {

                    $('.search-venue').hide();
                });
            }, 500);


        } else {

            $('.search-venue').hide();
        }
    });

    $('body').on('click', '.list-venue p', function(event) {

        event.preventDefault();

        $('#txtVenue').val($(this).text());

        $('.search-venue').hide();

        $('#district').val($(this).attr('data-id'));
    })

    $('body').on('click', '.delete-schedule-info', function(event) {

        event.preventDefault();

        if (confirm(Lang.get('page.question.delete'))) {

            $.ajax({
                url: route('client.delete-schedule'),
                type: 'delete',
            }).done(function(res) {

                location.href = route('client.to-do-list');
            }).fail(function() {

                toastr.error(Lang.get('page.message.fail'));
            })
        }
    });
});
