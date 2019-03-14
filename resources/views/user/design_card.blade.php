@extends('layouts.main')

@section('title')
    {{ __('Design Card') }}
@endsection

@section('page-name')
{{ __('To Do List') }}
@endsection

@section('css')
<style type="text/css" media="screen">
    .text-box {
        padding: 12px;
        line-height: 20px;
        border-radius: 3px;
    }
    .text-box {
        border: none;
        resize: none;
    }
    .draggable:hover .text-box {
        border: 1px dotted black;
    }
</style>
@endsection

@section('main-content')
<section id="to-do-list" class="to-do-list-main-block">
    <div class="container">
        @include('user.sections.to_do_list_tab')
        <div class="design-card">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <ul>
                        <li>
                            <a href="" class="choose-card"><img src="storage/template_card/wedding-card-2.jpg" style="width: 200px;height: 250px"></a>
                        </li>
                        <li>
                            <a href="" class="choose-card"><img src="storage/template_card/wedding-card-3.jpg" style="width: 200px;height: 250px"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="card-wedding" style="background-color: aliceblue;min-height: 760px;position: relative;">
                        <!-- <div class="demo draggable" style="position: relative;display: inline-block;padding-bottom: 10px;width: 200px">
                            <textarea style="background: none"></textarea>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-3">
                        <button class="btn btn-primary btn-create-text-box">Add text box</button>
                        <button class="btn btn-danger btn-delete">Delete</button>
                        <br><br>
                        <div id="edit">
                        <label>Choose Font</label>
                        <select name="" class="form-control choose-font">
                            <option hidden="" value="">Choose Font</option>
                            <option value="aleo, sans-serif" style="font-family: aleo, sans-serif">Aleo, sans-serif</option>
                            <option value="aleo" style="font-family: aleo">aleo</option>
                            <option value="aleoBoldItalic" style="font-family: aleoBoldItalic">aleoBoldItalic</option>
                            <option value="aleoBold" style="font-family: aleoBold">aleoBold</option>
                            <option value="aleoRegular" style="font-family: aleoRegular">aleoRegular</option>
                            <option value="aleoLightItalic" style="font-family: aleoLightItalic">aleoLightItalic</option>
                            <option value="punchbowl" style="font-family: punchbowl">punchbowl</option>
                            <option value="romantically" style="font-family: romantically">romantically</option>
                            <option value="mussica" style="font-family: mussica">mussica</option>
                            <option value="turbayne" style="font-family: turbayne">turbayne</option>
                            <option value="aphrodite" style="font-family: aphrodite">aphrodite</option>
                            <option value="geotica" style="font-family: geotica">geotica</option>
                            <option value="quattrocento" style="font-family: quattrocento">quattrocento</option>
                            <option value="assassin" style="font-family: assassin">assassin</option>
                            <option value="heroe" style="font-family: heroe">heroe</option>
                            <option value="valentina" style="font-family: valentina">valentina</option>
                            <option value="museo" style="font-family: museo">museo</option>
                            <option value="vnCariar" style="font-family: vnCariar">vnCariar</option>
                            <option value="dooType" style="font-family: dooType">dooType</option>
                            <option value="youngblood" style="font-family: youngblood">youngblood</option>
                            <option value="caviar" style="font-family: caviar">caviar</option>
                        </select>
                        <br>
                        <label>Choose Align</label>
                        <select name="" class="form-control choose-align">
                            <option hidden>Choose Align</option>
                            <option value="start">Start</option>
                            <option value="right">Right</option>
                            <option value="center">Center</option>
                            <option value="left">Left</option>
                        </select>
                        <br>
                        <label>Choose Size</label>
                        <input class="form-control choose-size" type="number" placeholder="Choose Font Size">
                        <br>
                        <label>Choose Height Line</label>
                        <input class="form-control choose-line-height" type="number" placeholder="Choose Height Line">
                        <br>
                        <label>Choose Width</label>
                        <input class="form-control choose-width" type="number" placeholder="Choose Width">
                        <br>
                        <label>Choose Height</label>
                        <input class="form-control choose-height" type="number" placeholder="Choose Height">
                        <br>
                        </div>
                        <button class="btn btn-success btn-save">Save</button>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
 
@section('script')
<script type="text/javascript" defer="">
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
                    x = (parseFloat(target.getAttribute('data-x')) || 0) + event.dx,
                    y = (parseFloat(target.getAttribute('data-y')) || 0) + event.dy;
                target.style.webkitTransform =
                target.style.transform = 'translate(' + x + 'px, ' + y + 'px)';
                target.setAttribute('data-x', x);
                target.setAttribute('data-y', y);
            }
        });
        
        $('.choose-card').click(function(event) {

            event.preventDefault();

            let src = $(this).find('img').attr('src');

            $('.card-wedding').css("background-image", "url('" + src +"')");

            $('.card-wedding').css('background-repeat', 'round');
        });

        $('.btn-create-text-box').click(function() {

            let html = '<div class="draggable" style="position: absolute;margin-bottom: 10px;padding-bottom: 10px;width: 200px;height: 46px;"><textarea class="text-box" style="background: none;overflow: hidden;font-size: 14px;height: 46px;" placeholder="Enter Some Text Here"></textarea></div>';

            $(html).hide().appendTo('.card-wedding').fadeIn(1000);

            editCard();

            arrData = [];
        });

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

                    element.find('.text-box').css('width', $(this).val() + 'px');
                }
            });

            $('.choose-height').bind('keyup mouseup',function(event) {

                event.preventDefault();

                if (element != null) {

                    element.find('.text-box').css('height', $(this).val() + 'px');
                }
            });
            
        }

        $('.btn-save').click(function() {

            getData();

            $.ajax({
                url: route('client.add-card'),
                type: 'POST',
                data: {
                    arrData: arrData,
                    arrDelete: arrDelete,
                },
            })
            .done(function(res) {
                    console.log(res)
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

                res.forEach(function(element) {

                    let styles = '';

                    if (element.card_metas != []) {

                        element.card_metas.forEach (function(element) {

                            styles += element.key + ': ' + element.value + ';';
                        });
                    }

                    html += '<div class="' + element.text_box_name + ' draggable" style="' + styles + '" data-id="' + element.id + '"><textarea class="text-box" style="background: none;overflow: hidden" placeholder="Enter Some Text Here">' + element.content +'</textarea></div>';
                })

                $('.card-wedding').html(html);

                editCard();
            })
            .fail(function() {
                toastr.error( Lang.get('page.message.fail') );
            })
        }

        function getData() {

            $('.draggable').each(function() {

                let left = isNaN($(this).css('left').split('px')[0]) ? 0 : parseFloat($(this).css('left').split('px')[0]);

                let top = isNaN($(this).css('top').split('px')[0]) ? 0 : parseFloat($(this).css('left').split('px')[0]);

                if ($(this).css('transform') != 'none') {

                    left += parseFloat($(this).css('transform').split(', ')[4]);

                    top += parseFloat($(this).css('transform').split(', ')[5]);
                }

                let width = $(this).css('width');

                let height = $(this).css('height');

                let size = $(this).find('.text-box').css('font-size');

                let font = $(this).find('.text-box').css('font-family');

                let line_height = $(this).find('.text-box').css('line-height');

                let align = $(this).find('.text-box').css('text-align');

                let id = $(this).attr('data-id') != null ? $(this).attr('data-id') : null;

                let content = $(this).find('.text-box').val();

                let obj = {
                    'card_id': id,
                    'content': content,
                    'metas': {
                        'left': left + 'px',
                        'top': top + 'px',
                        'width': width,
                        'height': height,
                        'font-size': size,
                        'font-family': font,
                        'line-height': line_height,
                        'text-align': align,
                        'position': 'absolute',
                    }
                }

                arrData.push(obj);
           });

            console.log(arrDelete);
        }

        function loadEdit(element)
        {
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
