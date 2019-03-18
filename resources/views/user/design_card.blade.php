@extends('layouts.main')

@section('title')
    {{ __('page.page.design_card') }}
@endsection

@section('page-name')
    {{ __('page.page.design_card') }}
@endsection

@section('main-content')
<section id="to-do-list" class="to-do-list-main-block">
    <div class="container">
        @include('user.sections.to_do_list_tab')
        <div class="design-card">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <ul class="list-template">
                        <li><a href="" class="choose-card"><img class="choose-image-template-img" src="{{ config('asset.card_template') . 'wedding-card-2.jpg' }}"></a></li>
                        <li><a href="" class="choose-card"><img class="choose-image-template-img" src="{{ config('asset.card_template') . 'wedding-card-3.jpg' }}"></a></li>
                    </ul>
                </div>
                <div class="col-lg-6 min-height-400">
                    <div class="card-wedding" id="card-wedding">
                    </div>
                </div>
                <div class="col-lg-3">
                    <button class="btn btn-pink btn-create-text-box">{{ __('page.design_card.add_text_box') }}</button>
                    <button class="btn btn-pink btn-delete">{{ __('page.action.delete') }}</button>
                    <br><br>
                    <div id="edit">
                    <label>{{ __('page.design_card.choose.font') }}</label>
                    <select name="" class="form-control choose-font">
                        <option hidden="" value="">{{ __('page.design_card.choose.font') }}</option>
                        <option value="aleo, sans-serif" class="font-aleo-sans-serif">Aleo, sans-serif</option>
                        <option value="aleo" class="font-aleo">aleo</option>
                        <option value="aleoBoldItalic" class="font-aleoBoldItalic">aleoBoldItalic</option>
                        <option value="aleoBold" class="font-aleoBold">aleoBold</option>
                        <option value="aleoRegular" class="font-aleoRegular">aleoRegular</option>
                        <option value="aleoLightItalic" class="font-aleoLightItalic">aleoLightItalic</option>
                        <option value="punchbowl" class="font-punchbowl">punchbowl</option>
                        <option value="romantically" class="font-romantically">romantically</option>
                        <option value="mussica" class="font-mussica">mussica</option>
                        <option value="turbayne" class="font-turbayne">turbayne</option>
                        <option value="aphrodite" class="font-aphrodite">aphrodite</option>
                        <option value="geotica" class="font-geotica">geotica</option>
                        <option value="quattrocento" class="font-quattrocento">quattrocento</option>
                        <option value="assassin" class="font-assassin">assassin</option>
                        <option value="heroe" class="font-heroe">heroe</option>
                        <option value="valentina" class="font-valentina">valentina</option>
                        <option value="museo" class="font-museo">museo</option>
                        <option value="vnCariar" class="font-vnCariar">vnCariar</option>
                        <option value="dooType" class="font-dooType">dooType</option>
                        <option value="youngblood" class="font-youngblood">youngblood</option>
                        <option value="caviar" class="font-caviar">caviar</option>
                    </select>
                    <br>
                    <label>{{ __('page.design_card.choose.align') }}</label>
                    <select name="" class="form-control choose-align">
                        <option hidden>{{ __('page.design_card.choose.align') }}</option>
                        <option value="start">{{ __('page.design_card.align.start') }}</option>
                        <option value="right">{{ __('page.design_card.align.right') }}</option>
                        <option value="center">{{ __('page.design_card.align.center') }}</option>
                        <option value="left">{{ __('page.design_card.align.left') }}</option>
                    </select>
                    <br>
                    <label>{{ __('page.design_card.choose.size') }}</label>
                    <input class="form-control choose-size" type="number" placeholder="{{ __('page.design_card.placeholder.size') }}">
                    <br>
                    <label>{{ __('page.design_card.choose.height_line') }}</label>
                    <input class="form-control choose-line-height" type="number" placeholder="{{ __('page.design_card.placeholder.line-height') }}">
                    <br>
                    <label>{{ __('page.design_card.choose.width') }}</label>
                    <input class="form-control choose-width" type="number" placeholder="{{ __('page.design_card.placeholder.width') }}">
                    <br>
                    <label>{{ __('page.design_card.choose.height') }}</label>
                    <input class="form-control choose-height" type="number" placeholder="{{ __('page.design_card.placeholder.height') }}">
                    <br>
                    </div>
                    <button class="btn btn-pink btn-save">{{ __('page.action.save') }}</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
<script type="text/javascript">
    jQuery(document).ready(function($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        var element = null;

        var arrData = [];

        var arrDelete = [];

        loadCard();

        interact('.draggable')
            .draggable({
            inertia: true,
            restrict: {
                restriction: "parent",
                endOnly: true,
                elementRect: { top: 0, left: 0, bottom: 1, right: 1 }
            },
            autoScroll: true,
            onmove: function (event) {
                var target = event.target,
                    x = parseInt((parseInt(target.getAttribute('data-x')) || 0) + event.dx),
                    y = parseInt((parseInt(target.getAttribute('data-y')) || 0) + event.dy);
                target.style.webkitTransform =
                target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
                target.setAttribute('data-x', x);
                target.setAttribute('data-y', y);
            }
        });

        $('.choose-card').click(function(event) {

            event.preventDefault();

            let src = $(this).find('img').attr('src');

            $('.card-wedding').css('background-image', 'url("' + src + '")');

            $('.card-wedding').css('background-repeat', 'round');
        });

        $('.btn-create-text-box').click(function() {

            let html = '<div class="draggable"><textarea class="text-box" placeholder="' + Lang.get('page.design_card.placeholder.text_box') + '"></textarea></div>';

            $(html).hide().appendTo('.card-wedding').fadeIn(600);

            editCard();

            arrData = [];
        });

        $('.btn-save').click(function() {

            getData();

            let background = $('.card-wedding').css('background-image').replace(/(?:^url\(["']?|["']?\)$)/g, "").split('/').slice(-1)[0];

            $.ajax({
                url: route('client.add-card'),
                type: 'POST',
                data: {
                    arrData: arrData,
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

        function loadCard() {
            $.ajax({
                url: route('client.load-card'),
                type: 'GET',
            })
            .done(function(res) {

                let html = '';

                if(res.background) {

                    $('.card-wedding').css('background-image', 'url("' + res.background + '")');
                }

                $('.card-wedding').css('background-repeat', 'round');

                res.textBox.forEach(function(element) {

                    let stylesTextBox = '';

                    if (element.card_metas != []) {

                        element.card_metas.forEach (function(element) {

                            stylesTextBox += element.key + ': ' + element.value + ';';
                        });
                    }

                    html += '<div class="' + element.text_box_name + ' draggable" style="' + element.style + '" data-id="' + element.id + '"><textarea class="text-box" style="background: none;overflow: hidden;' + stylesTextBox + '" placeholder="' + Lang.get('page.design_card.placeholder.text_box') + '">' + element.content + '</textarea></div>';
                })

                $('.card-wedding').html(html);

                editCard();
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            })
        }

        function editCard() {

            $('.draggable').on('click', function(event) {

                event.preventDefault();

                element = $(this);

                $('.draggable').find('.text-box').css('border', 'none');

                element.find('.text-box').css('border', '1px dotted black');

                loadEdit(element);
            });

            $('.btn-delete').on('click', function(event) {

                event.preventDefault();

                if (element != null) {

                    element.remove();

                    let id = element.attr('data-id');

                    arrDelete.push(id);
                }
            });

            $('.text-box').textareaAutoSize();

            $('.choose-font').change(function(event) {

                event.preventDefault();

                if (element != null) {

                    element.find('.text-box').css('font-family', $(this).val());
                }
            });

            $('.choose-size').bind('keyup mouseup',function(event) {

                event.preventDefault();

                if (element != null) {

                    element.find('.text-box').css('font-size', $(this).val() + 'px');
                }
            });

            $('.choose-align').change(function(event) {

                event.preventDefault();

                if (element != null) {

                    element.find('.text-box').css('text-align', $(this).val());
                }
            })

            $('.choose-line-height').bind('keyup mouseup',function(event) {

                event.preventDefault();

                if (element != null) {

                    element.find('.text-box').css('line-height', $(this).val() + 'px');
                }
            });

            $('.choose-width').bind('keyup mouseup',function(event) {

                event.preventDefault();

                if (element != null) {

                    element.css('width', $(this).val() + 'px');

                    element.find('.text-box').css('width', $(this).val() + 'px');
                }
            });

            $('.choose-height').bind('keyup mouseup',function(event) {

                event.preventDefault();

                if (element != null) {

                    element.css('height', $(this).val() + 'px');

                    element.find('.text-box').css('height', $(this).val() + 'px');
                }
            });
        }

        function getData() {

            arrData = [];

            $('.draggable').each(function() {

                let left = isNaN($(this).css('left').split('px')[0]) ? 0 : parseInt($(this).css('left').split('px')[0]);

                let top = isNaN($(this).css('top').split('px')[0]) ? 0 : parseInt($(this).css('top').split('px')[0]);

                if ($(this).css('transform') != 'none') {

                    left += parseInt($(this).attr('data-x'));

                    top += parseInt($(this).attr('data-y'));
                }

                let style = 'top: ' + top + 'px'+ ';left: ' + left + 'px' + ';height: ' + $(this).css('height');

                let obj = {
                    'card_id': $(this).attr('data-id') != null ? $(this).attr('data-id') : null,
                    'content': $(this).find('.text-box').val(),
                    'style': style,
                    'metas': {
                        'width': $(this).css('width'),
                        'height': $(this).css('height'),
                        'font-size': $(this).find('.text-box').css('font-size'),
                        'font-family': $(this).find('.text-box').css('font-family'),
                        'line-height': $(this).find('.text-box').css('line-height'),
                        'text-align': $(this).find('.text-box').css('text-align'),
                    }
                }

                arrData.push(obj);
           });
        }

        function loadEdit(element) {

            let align = element.find('.text-box').css('text-align');

            let width = element.find('.text-box').css('width').split('px')[0];

            let height = element.find('.text-box').css('height').split('px')[0];

            let line_height = element.find('.text-box').css('line-height').split('px')[0];

            let size = element.find('.text-box').css('font-size').split('px')[0];

            let font = element.find('.text-box').css('font-family');

            $('.choose-font').val(font);

            $('.choose-width').val(width);

            $('.choose-height').val(height);

            $('.choose-size').val(size);

            $('.choose-align').val(align);

            $('.choose-line-height').val(line_height);
        }
    });
</script>
@endsection
