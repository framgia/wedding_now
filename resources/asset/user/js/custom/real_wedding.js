jQuery(document).ready(function($) {

    $('body').on('click', '.page-link', function(event) {

        let page = Number($(this).attr('href').split('/?page=')[1]);

        let price_option = $('.filter-by-price').val();

        event.preventDefault();

        $.ajax({
            url: route('client.real-wedding.load'),
            type: 'get',
            data: {
                page: page,
                price_option: price_option,
            },
        }).done(function(res) {
            $('.result-real-wedding').hide().html(res).fadeIn('slow');
            $('html, body').animate({
                scrollTop: $('.result-real-wedding').offset().top - 50
            }, 700);
        }).fail(function() {
            toastr.error(Lang.get('page.message.fail'));
        })
    });

    $('.filter-by-price').change(function(event) {

        event.preventDefault();

        let price_option = Number($(this).val());

        $.ajax({
            url: route('real-wedding.load'),
            type: 'get',
            data: {
                price_option: price_option,
            },
        }).done(function(res) {
            $('.result-real-wedding').hide().html(res).fadeIn('slow');
            $('html, body').animate({
                scrollTop: $('.result-real-wedding').offset().top - 50
            }, 700);
        }).fail(function() {
            toastr.error(Lang.get('page.message.fail'));
        })
    })
});
