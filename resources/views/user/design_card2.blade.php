@extends('layouts.main')

@section('title')
    {{ __('Design Card') }}
@endsection

@section('page-name')
{{ __('To Do List') }}
@endsection
 
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/demo/demo.css') }}">
<style>
    .card-text-input:hover {
        border: 0.3px dotted black !important;
        cursor: pointer;
    }

    .edit-text:before {
        content: "";
        vertical-align: middle;
        margin: auto;
        position: absolute;
        display: block;
        bottom: calc(100% - 8px);
        width: 12px;
        height: 12px;
        transform: rotate(-47deg);
        border: 1px solid black;
        border-color: #ccc transparent transparent #ccc;
        background-color: white;
        left: -7px;
        top: 277px;
        border-top: 1px solid;
        border-left: 1px solid;
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
                        <textarea class="draggable card-text-input" style="text-align: center;color: rgb(0, 0, 0);font-family: com4t_fine_regular;font-size: 21px;line-height: 21px;padding: 3px;margin: 0;outline: none;border: none;overflow: hidden;background: none;font-style: normal;resize: both;height: 25px;padding-bottom: 2px 10px;font-family: valentina;max-width: 300px"></textarea>
                        <textarea class="draggable card-text-input" style="text-align: center;color: rgb(0, 0, 0);font-family: com4t_fine_regular;font-size: 21px;line-height: 21px;padding: 3px;margin: 0;outline: none;border: none;overflow: hidden;background: none;font-style: normal;resize: both;height: 25px;padding-bottom: 2px 10px;font-family: valentina;max-width: 300px"></textarea>
                    </div>
                </div>
                
            </div>
            <div class="edit-text" style="display: none;position: absolute;width: 200px;background-color: white;border-radius: 3px;box-shadow: inset;padding: 5px;border: 1px solid black;z-index: 10">
                    <header style="text-align: center;padding: 3px;font-size: 15px;font-family: monospace;font-weight: 550;">
                        Style Your Message
                    </header>
                    <div class="box-content" style="padding: 5px 15px;font-size: 14px;">
                        <div class="select-font" style="padding-bottom: 10px">
                            <select class="form-control font-value" style="font-size: 15px;width: 100%;padding: 3px 3px 3px 10px;height: 34px;border-radius: 3px;font-weight: 600;">
                                <option class="valua-font" value="" hidden="">Choose Font</option>
                                <option class="valua-font" value="aleo" style="font-family: aleo;height: 20px">aleo</option>
                                <option class="valua-font" value="punchbowl" style="font-family: punchbowl">punchbowl</option>
                                <option class="valua-font" value="romantically" style="font-family: romantically">romantically</option>
                                <option value="mussica" style="font-family: mussica">mussica</option>
                                <option value="turbayne" style="font-family: turbayne">turbayne</option>
                                <option value="aphrodite" style="font-family: aphrodite">aphrodite</option>
                                <option value="geotica" style="font-family: geotica">geotica</option>
                                <option value="assassin" style="font-family: assassin">assassin</option>
                                <option value="heroe" style="font-family: heroe">heroe</option>
                                <option value="youngblood" style="font-family: youngblood">youngblood</option>
                                <option value="caviar" style="font-family: caviar">caviar</option>
                            </select>
                        </div>
                        <div class="select-size" style="padding-bottom: 25px">
                            <input type="number" class="form-control size-value" name="" placeholder="Choose Size" style="float: right;height: 34px !important;padding: 3px 3px 3px 10px;border-radius: 3px;margin-bottom: 3px">
                        </div>
                        <hr>
                        <div class="select-color">
                            <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #001320;border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                            <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #5e7984;border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                            <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #553033;border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                            <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #5c7d37;border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                            <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;" class="load-more-color-three-dot">
                                <img style="padding-bottom: 10px" src="https://img.icons8.com/material-two-tone/24/000000/more.png">
                            </label>
                            <div class="load-more-color" style="display: none">
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #FFB400;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #E53D39;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #2C91DE;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #000000;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #FFFFFF;border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;    border-color: #e8e8e8;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #970E65;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #650633;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #F3A2A3;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #D44F70;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #CA0B15;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #FFFAA3;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #C0CFAF;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #553033;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #5c7d37;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #001320;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                            </div>
                        </div>
                        <hr>
                        <div class="select-align">
                            <div class="message-text-alignment _justify-content" style="text-align: justify;    height: 22px;">
                                <input type="radio" id="left" name="align" style="position: absolute;left: -1500%;">
                                <label for="left" class="icon-text-left" style="display: inline-block;position: relative;vertical-align: middle;top: -1px;margin-right: 5px;border: none;background-color: none;background-repeat: no-repeat;cursor: pointer;"> <svg fill="#cdd0d5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="17px" viewBox="0 0 24 17" enable-background="new 0 0 24 17" xml:space="preserve">
                                <rect y="15" width="12" height="2"></rect>
                                <rect y="10" width="24" height="2"></rect>
                                <rect y="5" width="12" height="2"></rect>
                                <rect width="24" height="2"></rect>
                                </svg>
                                </label>
                                <input type="radio" checked="yes" id="center" name="align" style="position: absolute;left: -1500%;">
                                <label for="center" class="icon-text-center" style="display: inline-block;position: relative;vertical-align: middle;top: -1px;margin-right: 5px;border: none;background-repeat: no-repeat;cursor: pointer;margin-left: 34px;margin-right: 34px;"> <svg fill="#CDD0D5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="17px" viewBox="0 0 24 17" enable-background="new 0 0 24 17" xml:space="preserve">
                                <rect x="6" y="15" fill-rule="evenodd" clip-rule="evenodd" width="12" height="2"></rect>
                                <rect y="10" fill-rule="evenodd" clip-rule="evenodd" width="24" height="2"></rect>
                                <rect x="6" y="5" fill-rule="evenodd" clip-rule="evenodd" width="12" height="2"></rect>
                                <rect y="0" fill-rule="evenodd" clip-rule="evenodd" width="24" height="2"></rect>
                                </svg>
                                </label>
                                <input type="radio" id="right" name="align" style="position: absolute;left: -1500%;">
                                <label for="right" class="icon-text-right" style="display: inline-block;position: relative;vertical-align: middle;top: -1px;margin-right: 5px;border: none;background-repeat: no-repeat;cursor: pointer;"> <svg fill="#CDD0D5" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="24px" height="17px" viewBox="0 0 24 17" enable-background="new 0 0 24 17" xml:space="preserve">
                                <rect x="12" y="15" fill-rule="evenodd" clip-rule="evenodd" width="12" height="2"></rect>
                                <rect y="10" fill-rule="evenodd" clip-rule="evenodd" width="24" height="2"></rect>
                                <rect x="12" y="5" fill-rule="evenodd" clip-rule="evenodd" width="12" height="2"></rect>
                                <rect y="0" fill-rule="evenodd" clip-rule="evenodd" width="24" height="2"></rect>
                                </svg>
                                </label>
                            </div>  
                        </div>
                        <hr>
                        <button type="" class="btn btn-success" style="width: 75px">Done</button>
                        <button type="" class="btn btn-warning close-edit-text" style="float: right;width: 75px">Cancel</button>
                    </div>
                    <footer></footer>
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
                    edit_text_position(y, x);
                }
            });
        $('.choose-card').click(function(event) {

            event.preventDefault();

            let src = $(this).find('img').attr('src');

            $('.card-wedding').css("background-image", "url('" + src +"')");

            $('.card-wedding').css('background-repeat', 'round');
        });

        $('.card-text-input').on('change keyup keydown paste cut', function(event) {

            event.preventDefault();

            $(this).css('height','auto');

            $(this).height(this.scrollHeight);
        });

        $('.load-more-color-three-dot').click(function(event) {

            if ($('.load-more-color').is(':visible')) {

                $('.load-more-color').fadeOut();
            } else {

                $('.load-more-color').fadeIn();
            }
        });

        $('.card-text-input').focusin(function(event) {

            let ele = $(this);

            event.preventDefault();

            let offset = $(this).offset();

            let height = $(this).width();

            $('.edit-text').attr({
                'data-top': offset.top,
                'data-left': offset.left + height
            });

            edit_text_position(offset.top, offset.left + height);

            $('.font-value').change(function(event) {

                event.preventDefault();

                ele.css('font-family', $(this).val());
            });

            $('.size-value').keyup(function(event) {

                event.preventDefault();

                console.log($(this).val())

                ele.css('font-size', $(this).val());
            });
        });

        // $('.card-text-input').focusout(function(event) {
        //     $(this).css('border', 'none');
        // });

        function edit_text_position(top, left) {

            let valueTop = parseFloat($('.edit-text').attr('data-top'));

            let valueLeft = parseFloat($('.edit-text').attr('data-left'));

            if (valueTop > top) {

                valueTop = parseFloat($('.edit-text').attr('data-top')) + top;
            }

            if (valueLeft > left) {

                valueLeft = parseFloat($('.edit-text').attr('data-left')) + left;
            }

            $('.edit-text').css('left', valueLeft + 13);

            $('.edit-text').css('top', valueTop - 130);

            $('.edit-text').show();
        }

        $('.close-edit-text').on('click', function() {
            $(this).closest('.edit-text').hide();
        });
    });
</script>
@endsection
