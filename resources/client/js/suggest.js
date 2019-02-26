jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    let nf = new Intl.NumberFormat();
    let listCategory = $('.list-category');
    let home = $('span.c-name').text();
    showInputBudget();
    showInputNote();

    function getValue() {
        let budget = $('.budget').val();
        $.each(listCategory, function () {
            let percent = $(this).attr('data-percent')
            let price = nf.format((budget * percent / 100).toFixed(2));
            $(this).find('span.currency').text(price);
            $(this).find('.price').val(budget * percent / 100);
        });
    }

    function showInputBudget() {
        $('#item').hide();
        $('#budget').show();
    }

    function hideInputBudget() {
        $('#item').show();
        $('#budget').hide();
    }

    function showInputNote() {
        $('.t-note').hide();
        $('.s-note').show();
    }

    function hideInputNote() {
        $('.t-note').show();
        $('.s-note').hide();
    }

    function getValueItem(budgetOldItem, budgetNewItem) {
        let budget = parseInt($('#budget').val());
        let budgetAfter = budget - budgetOldItem + budgetNewItem;
        $('#budget').val(budgetAfter);
    }

    getValue();

    $('.budget').change(function() {
        getValue();
    });

    $(document).on('click', '.list-category', function(e) {
        e.preventDefault();
        $('.side-bar li').removeClass('active');
        $(this).parent('li').addClass('active');
        $('.close-item').addClass('show');
        $('#budget').removeClass('budget');

        let idTask = $(this).data('id');
        let price = parseFloat($(this).find('span.currency').text().replace(',', '.')) * 1000000;
        let text = $(this).children('span.name').text();

        $('span.c-name').text(text);
        $('#item').val(price);

        let textNote = $(this).find('input.task_note').val();
        $('.t-note').val(textNote);
        hideInputBudget();
        hideInputNote();
    });

    $('.close-item').click(function() {
        $(this).removeClass('show');
        $('#budget').addClass('budget');
        $('.side-bar li').removeClass('active');
        $('span.c-name').text(home);
        showInputBudget();
        showInputNote();
    });

    $('#item').on('focusin', function() {
        $(this).data('val', $(this).val());
    });

    $('#item').on('change', function(){
        let budgetOldItem = parseInt($(this).data('val')) || 0;
        let budgetNewItem = parseInt($(this).val());
        getValueItem(budgetOldItem, budgetNewItem);

        $('.side-bar').find('li.active span.currency').text(nf.format(budgetNewItem));
        $('.side-bar').find('li.active input.price').val(budgetNewItem);
    });

    $('.t-note').change(function() {
        let note = $(this).val();
        $('.side-bar').find('li.active input.task_note').val(note);
    });

    $('.create-cate').on('click', function(e) {
        e.preventDefault();
        let category = $('.new-cate').val();
        let newCate = '<li class="list-group-item">';
            newCate += '<a href="#" data-percent="" class="list-category">';
            newCate += '<span class="name">' + category + '</span>';
            newCate += '<i class="fa fa-angle-right" aria-hidden="true"></i>';
            newCate += '<span class="currency"></span>';
            newCate += '<input class="price" name="price[]" type="hidden">';
            newCate += '<input class="task_note" name="task_note[]" type="hidden">';
            newCate += '</a>';
            newCate += '<input name="task_name[]" type="hidden" value="' + category + '">';
            newCate += '<input name="percent[]" type="hidden" value="">';
            newCate += '<input name="category[]" type="hidden" value="11">';
            newCate += '</li>';
        $('.side-bar ul').append(newCate);
        $('#newCate').modal('hide');
    });

});
