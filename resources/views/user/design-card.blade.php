@extends('layouts.main')

@section('title')
    {{ __('page.page.design_card') }}
@endsection

@section('page-name')
    {{ __('page.page.design_card') }}
@endsection

@section('main-content')
<section class="card-main-block">
    <div class="container">
        @include('user.sections.to_do_list_tab')
        <div class="container col-lg-12 list-action">
            <button class="btn btn-pink btn-create-text-box" title="{{ __('page.design_card.add_text_box') }}">
                <i class="fa fa-plus"></i>
            </button>
            <button class="btn btn-pink change-background" title="{{ __('page.design_card.change_background') }}">
                <i class="fa fa-image"></i>
            </button>
            <button class="btn btn-pink btn-save" title="{{ __('page.action.save') }}">
                <i class="fa fa-save"></i>
            </button>
            <button class="btn btn-pink btn-download" title="{{ __('page.action.download') }}">
                <i class="fa fa-download"></i>
            </button>
        </div>
        <div class="design-card">
            <input type="hidden" name="cardId" value="{{ $card->id ?? $card }}" id="card">
            <div class="col-lg-12">
                <div class="col-lg-6 min-height-400 pd-0">
                    <div class="card-wedding" id="card-wedding">
                    </div>
                    <div class="edit-text d-none">
                        <header class="edit-text-header">
                            {{ __('page.design_card.style_your_message') }}
                        </header>
                        <div class="box-content">
                            <form id="edit-text">
                            <div class="enter-text">
                                <textarea class="text-value" spellcheck="false" name="value"></textarea>
                            </div>
                            <div class="select-font">
                                <select class="form-control font-value cursor-pointer">
                                    <option class="valua-font" value="" hidden="">{{ __('page.design_card.choose.font') }}</option>
                                    <option class="valua-font .font-aleo-sans-serif" value="aleo, sans-serif">aleo</option>
                                    <option class="valua-font font-punchbowl" value="punchbowl">punchbowl</option>
                                    <option class="valua-font font-romantically" value="romantically">romantically</option>
                                    <option class="valua-font font-mussica" value="mussica">mussica</option>
                                    <option class="valua-font font-turbayne" value="turbayne">turbayne</option>
                                    <option class="valua-font font-aphrodite" value="aphrodite">aphrodite</option>
                                    <option class="valua-font font-geotica" value="geotica">geotica</option>
                                    <option class="valua-font font-assassin" value="assassin">assassin</option>
                                    <option class="valua-font font-heroe" value="heroe">heroe</option>
                                    <option class="valua-font font-youngblood" value="youngblood">youngblood</option>
                                    <option class="valua-font font-caviar" value="caviar">caviar</option>
                                </select>
                            </div>
                            <div class="select-size">
                                <input type="number" class="form-control size-value" name="number_size" placeholder="Choose Size">
                            </div>
                            <hr>
                            <div class="select-align">
                                <div class="col-lg-4">
                                    <img class="align-value" src="{{ asset('storage/icon/left.svg') }}" data-align="left">
                                </div>
                                <div class="col-lg-4">
                                    <img class="align-value" src="{{ asset('storage/icon/center.svg') }}" data-align="center">
                                </div>
                                <div class="col-lg-4">
                                    <img class="align-value" src="{{ asset('storage/icon/right.svg') }}" data-align="right">
                                </div>
                            </div>
                            <hr class="pd-top-0">
                            <div class="select-color">
                                <label class="choose-color" data-color="#001320"><span class="background-color-001320"></span></label>
                                <label class="choose-color" data-color="#5e7984"><span class="background-color-5e7984"></span></label>
                                <label class="choose-color" data-color="#553033"><span class="background-color-553033"></span></label>
                                <label class="choose-color" data-color="#5c7d37"><span class="background-color-5c7d37"></span></label>
                                <label class="load-more-color-three-dot cursor-pointer">
                                    <img src="{{ asset(config('define.card.icon_load_more')) }}">
                                </label>
                                <div class="load-more-color display-none">
                                    <label class="choose-color" data-color="#FFB400" data-color="#FFB400"><span class="background-color-"></span></label>
                                    <label class="choose-color" data-color="#E53D39"><span class="background-color-E53D39"></span></label>
                                    <label class="choose-color" data-color="#2C91DE"><span class="background-color-2C91DE"></span></label>
                                    <label class="choose-color" data-color="#000000"><span class="background-color-000000"></span></label>
                                    <label class="choose-color" data-color="#FFFFFF"><span class="background-color-FFFFFF"></span></label>
                                    <label class="choose-color" data-color="#970E65"><span class="background-color-970E65"></span></label>
                                    <label class="choose-color" data-color="#650633"><span class="background-color-650633"></span></label>
                                    <label class="choose-color" data-color="#F3A2A3"><span class="background-color-F3A2A3"></span></label>
                                    <label class="choose-color" data-color="#D44F70"><span class="background-color-D44F70"></span></label>
                                    <label class="choose-color" data-color="#CA0B15"><span class="background-color-CA0B15"></span></label>
                                    <label class="choose-color" data-color="#FFFAA3"><span class="background-color-FFFAA3"></span></label>
                                    <label class="choose-color" data-color="#C0CFAF"><span class="background-color-C0CFAF"></span></label>
                                    <label class="choose-color" data-color="#42f4d4"><span class="background-color-42f4d4"></span></label>
                                    <label class="choose-color" data-color="#c9229c"><span class="background-color-c9229c"></span></label>
                                    <label class="choose-color" data-color="#159604"><span class="background-color-159604"></span></label>
                                </div>
                            </div>
                            <hr class="pd-top-0">
                            <button class="btn btn-danger delete-drag-choose">{{ __('base.delete') }}</button>
                            <button class="btn btn-success done-edit-text">{{ __('base.done') }}</button>
                            </form>
                        </div>
                        <footer></footer>
                    </div>
                </div>
                <div class="col-lg-6 min-height-400 pd-0">
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">

    $('.btn-download').click(function() {
        domtoimage.toBlob(document.getElementById('card-wedding'))
        .then(function(blob) {
          window.saveAs(blob, 'card.png');
        });
    });

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        }
    });

    var arrTextBox = [];

    var arrDelete = [];

    loadCard();
    
    $('.choose-card').on('click', function(event) {

        event.preventDefault();

        let src = $(this).find('img').attr('src');

        $('.card-wedding').css('background-image', 'url("' + src + '")');

        $('.card-wedding').css('background-repeat', 'round');
    });

    $('.btn-save').on('click', function() {

        getData();

        let background = $('.card-wedding').css('background-image').replace(/(?:^url\(["']?|["']?\)$)/g, "").split('/').slice(-1)[0];

        $.ajax({
            url: route('client.add-card'),
            type: 'POST',
            data: {
                arrTextBox: arrTextBox,
                arrDelete: arrDelete,
                background: background,
            },
        })
        .done(function(res) {
            toastr.success( Lang.get('base.success') );
        })
        .fail(function() {
            toastr.error( Lang.get('page.message.fail') );
        })
    });

    $('body').on('click mousedown', '.drag', function(event) {

        event.preventDefault();

        $('.card-wedding').find('.text-box').removeClass('choose');

        $('.card-wedding').find('.drag-choose').removeClass('drag-choose');

        $(this).find('.text-box').addClass('choose');

        $(this).addClass('drag-choose');

        $('.edit-text').removeClass('d-none');

        $('#edit-text')[0].reset();

        let text = $('.choose').val();

        let font = $('.choose').css('font-family');

        let size = $('.choose').css('font-size').split('px')[0];

        let color = $('.choose').css('color');

        setValueEditText(text, font,size, color);

        $('.edit-text').css({
            top: parseInt($(this).closest('.drag').position().top) - parseInt($('.edit-text').height()) / 2,
            left: parseInt($(this).closest('.drag').position().left) + parseInt($(this).width()) + 25 + 'px'
        });

        drag();
    });

    $('.btn-create-text-box').click(function(event) {

        event.preventDefault();

        $('.card-wedding').find('.text-box').removeClass('choose');

        $('.card-wedding').find('.drag-choose').removeClass('drag-choose');

        let html = '<div class="drag drag-choose new-text-box"><textarea wrap="off" disabled class="text-box choose" spellcheck="false"></textarea></div>';

        $(html).hide().appendTo('.card-wedding').fadeIn(300);

        drag();
    });

    $('.text-value').on('keyup keydown change copy paste focus input', function(event) {

        $('.choose').val($(this).val());

        resize();
    });

    $('.font-value').on('change', function(event) {

        event.preventDefault();

        $('.choose').css('font-family', $(this).val());

        resize();
    });

    $('.size-value').on('keyup mouseup',function(event) {

        event.preventDefault();

        $('.choose').css('font-size', $(this).val() + 'px');

        resize();
    });

    $('.align-value').on('click', function(event) {

        event.preventDefault();

        console.log($(this).attr('data-align'));

        $('.choose').css('text-align', $(this).attr('data-align'));
    });

    $('.choose-color').on('click', function(event) {

        event.preventDefault();

        var color = $(this).attr('data-color');

        $('.choose').css('color', color);
    });

    $('.load-more-color-three-dot').on('click', function(event) {

        if ($('.load-more-color').is(':visible')) {

            $('.load-more-color').fadeOut();
        } else {

            $('.load-more-color').fadeIn();
        }
    });

    $('.delete-drag-choose').on('click', function(event) {

        event.preventDefault();

        let id = $('.drag-choose').attr('data-id');

        arrDelete.push(id);

        $('.drag-choose').remove();

        $('.edit-text').addClass('d-none');
    });

    $('.done-edit-text, .close-edit-text').on('click', function(event) {

        event.preventDefault();

        $('.card-wedding').find('.drag-choose').removeClass('drag-choose');

        $('.card-wedding').find('.choose').removeClass('choose');

        $('.edit-text').addClass('d-none');
    });

    function loadCard() {

        if ($('#card').val()) {

            $.ajax({
                url: route('client.load-card'),
                type: 'GET',
            })
            .done(function(res) {

                let html = '';

                if (res.background != null && res.background != 'none') {

                    $('.card-wedding').css('background-image', 'url("' + res.background + '")');
                }

                $('.card-wedding').css('background-repeat', 'round');

                res.textBoxs.forEach(function(element) {

                    let stylesTextBox = '';

                    html += '<div class="drag" style="' + element.div_style + '" data-id="' + element.id + '"><textarea spellcheck="false" wrap="off" disabled class="text-box" style="' + element.textarea_style + '">' + element.content + '</textarea></div>';
                })

                html+= '<hr class="v-line"/><hr class="h-line"/>';

                $('.card-wedding').html(html);
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            })
        }
    }

    function getData() {

        arrTextBox = [];

        $('.drag').each(function() {

            let left = isNaN($(this).position().left) ? 0 : parseInt($(this).position().left);

            let top = isNaN($(this).position().top) ? 0 : parseInt($(this).position().top);

            let style = 'position: absolute;top: ' + top + 'px'+ ';left: ' + left + 'px';

            let text_box = {
                'id': $(this).attr('data-id') != null ? $(this).attr('data-id') : null,
                'div_style': style,
                'textarea_style': $(this).find('.text-box').attr('style'),
                'content': $(this).find('.text-box').val(),
            };

            arrTextBox.push(text_box);
       });
    }

    function drag() {

        let arrDrag = [];

        let element = document.querySelector('.drag-choose');

        displacejs(element, {

            constrain: false,

            relativeTo: null,

            onMouseDown: function() {

                arrDrag = [];

                $('.drag').not('.drag-choose').each(function(index, el) {

                    let width = parseInt($(this).width());

                    let height = parseInt($(this).height());

                    let topArr = [
                        parseInt($(this).position().top),
                        parseInt($(this).position().top) + parseInt(height / 2),
                        parseInt($(this).position().top) + height
                    ];

                    let leftArr = [
                        parseInt($(this).position().left),
                        parseInt($(this).position().left) + parseInt(width / 2),
                        parseInt($(this).position().left) + width
                    ];

                    arrDrag.push({ top: topArr, left: leftArr });
                });
            },

            onMouseMove: function() {

                $('.edit-text').hasClass('d-none') ? '' : $('.edit-text').addClass('d-none');

                element.style.opacity = 0.35;

                let obj = {
                    start_top: parseInt($(element).position().top) - 2,
                    midd_top: parseInt($(element).position().top) + parseInt($(element).height() / 2) - 2,
                    end_top: parseInt($(element).position().top) + parseInt($(element).height()) - 2,
                    start_left: parseInt($(element).position().left) - 2,
                    midd_left: parseInt($(element).position().left) + parseInt($(element).width() / 2) - 2,
                    end_left: parseInt($(element).position().left) + parseInt($(element).width() + 2) - 2,
                };

                arrDrag.forEach(function(element) {

                    element.top.every(function(el) {

                        let show = false;

                        switch(el) {
                            case obj.start_top: {
                                show = true;
                                break;
                            }
                            case obj.midd_top: {
                                show = true;
                                break;
                            }
                            case obj.end_top: {
                                show = true;
                                break;
                            }
                        }

                        if (show) {

                            $('.h-line').css('top', el + 'px');

                            $('.h-line').show();
                        } else {

                            $('.h-line').hide();
                        }
                    });

                    element.left.every(function(el) {

                        let show = false;

                        switch(el) {
                            case obj.start_left: {
                                show = true;
                                break;
                            }
                            case obj.midd_left: {
                                show = true;
                                break;
                            }
                            case obj.end_left: {
                                show = true;
                                break;
                            }
                        }

                        if (show) {

                            $('.v-line').css('left', el + 'px');

                            $('.v-line').show();
                        } else {

                            $('.v-line').hide();
                        }
                    });
                });
            },

            onMouseUp: function() {

                element.style.opacity = 1;

                $('.v-line').hide();

                $('.h-line').hide();
            }
        });
    }

    function setValueEditText(text, font, size, color) {
        $('.text-value').val(text);
        $('.font-value').val(font);
        $('.size-value').val(size);
    }

    function resize() {
        $('.edit-text').css({
            left: parseInt($('.drag-choose').css('left')) + parseInt($('.choose')[0].scrollWidth) + 25 + 'px'
        });

        $('.choose').width(10).height(30).width($('.choose')[0].scrollWidth).height($('.choose')[0].scrollHeight);
    }
</script>
@endsection
