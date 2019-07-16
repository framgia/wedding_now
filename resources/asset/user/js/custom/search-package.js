jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    $('body').on('keyup', '#keyword_search_package', function (event) {

        event.preventDefault();

        if ($(this).val() !== '') {

            let keyword = $(this).val();

            $.when(search(keyword)).then(function (res) {

                $('#show-result-package').html(res);
            });
            
            $('#show-result-package').removeClass('d-none');

        } else {

            $('#show-result-package').addClass('d-none');
        }
    });

    function search(keyword) {
        return $.ajax({
            url: route('package.seach', { keyword: keyword }),
            type: 'GET',
        });
    }
});
    
