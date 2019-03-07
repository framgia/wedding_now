@extends('layouts.main') 
@section('title') {{ __('To Do List') }}
@endsection
 
@section('page-name') {{ __('To Do List') }}
@endsection
 
@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/demo/demo.css') }}">
<style>
    .card-text-input:hover {
        border: 0.3px dotted black !important;
        cursor: pointer;
    }
    .card-text-input:focus { 
        height: 25px;
    }
    .edit-text:before {
        content: "";
        vertical-align: middle;
        margin: auto;
        position: absolute;
        display: block;
        bottom: calc(100% - 6px);
        width: 12px;
        height: 12px;
        transform: rotate(-50deg);
        border: 1px solid;
        border-color: #ccc transparent transparent #ccc;
        background-color: white;
        left: -7px;
        top: 280px;
    }
</style>
@endsection
@section('main-content')
<section id="to-do-list" class="to-do-list-main-block">
    <div class="container">
        <ul class="to-do-list-tabs general-nav-tabs tabs">
            <li><a href="{{ route('client.schedule') }}" class="btn btn-default"><span class="badge">{{ __('page.page.dashboard') }}</span></a></li>
            <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.profile') }}</span></a></li>
            <li><a href="{{ route('client.to-do-list') }}" class="btn btn-default"><span class="badge">{{ __('page.page.to_do_list') }}</span></a></li>
            <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.my_budget') }}</span></a></li>
            <li><a href="{{ route('client.design-card') }}" class="active btn btn-default"><span class="badge">{{ __('page.page.card') }}</span></a></li>
            <li><a href="#" class="btn btn-default"><span class="badge">{{ __('page.page.real_wedding') }}</span></a></li>
        </ul>
        <div class="design-card">
            <div class="col-lg-12">
                <div class="col-lg-3">
                    <ul>
                        <li>
                            <a href="" class="choose-card"><img src="storage/wedding/card/wedding-card.jpg" style="width: 200px;height: 250px"></a>
                        </li>
                        <li>
                            <a href="" class="choose-card"><img src="storage/wedding/card/wedding-card-2.jpg" style="width: 200px;height: 250px"></a>
                        </li>
                        <li>
                            <a href="" class="choose-card"><img src="storage/wedding/card/wedding-card-3.jpg" style="width: 200px;height: 250px"></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6" style="min-height: 400px;">
                    <div class="card-wedding" style="background-color: aliceblue;min-height: 760px;position: relative;">
                        <textarea class="draggable card-text-input" style="text-align: center;color: rgb(0, 0, 0);font-family: com4t_fine_regular;font-size: 21px;line-height: 21px;width: 100px;height: 21px;padding: 0;margin: 0;outline: none;border: none;overflow: hidden;background: none;font-style: normal;resize: both;height: 25px;padding-bottom: 2px 10px"></textarea>
                        <textarea class="draggable card-text-input" style="text-align: center;color: rgb(0, 0, 0);font-family: com4t_fine_regular;font-size: 21px;line-height: 21px;width: 100px;height: 21px;padding: 0;margin: 0;outline: none;border: none;overflow: hidden;background: none;font-style: normal;resize: both;height: 25px;padding-bottom: 2px 10px"></textarea>
                    </div>
                    
                </div>
                <div class="edit-text" style="display: none;position: absolute;width: 200px;background-color: white;border-radius: 3px;box-shadow: inset;padding: 5px;border: 1px solid black;z-index: 10">
                        <header style="text-align: center;padding: 3px;font-size: 15px;font-family: monospace;font-weight: 550;">
                            Style Your Message
                        </header>
                        <div class="box-content" style="padding: 5px 15px;font-size: 14px;">
                            <div class="select-font" style="padding-bottom: 10px">
                                <select class="form-control" style="font-size: 15px;width: 100%;padding: 3px 3px 3px 10px;height: 34px;border-radius: 5px;font-weight: 600;">
                                    <option value="">option</option>
                                </select>
                            </div>
                            <div class="select-font-size" style="padding-bottom: 10px">
                                <span style="width: 20%;font-size: 15px;font-family: sans-serif;padding-right: 3%;">Size</span>
                                <input type="number" class="form-control" name="" style="width: 74%;float: right;height: 25px !important">
                            </div>
                            <hr>
                            <div class="select-color">
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #001320;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #5e7984;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #553033;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;"><span style="background-color: #5c7d37;    border: 2px solid transparent;pointer-events: none;display: inline-block;width: 18px;height: 18px;border-radius: 100%;margin: 2px;"></span></label>
                                <label style="margin: 0 2px;cursor: pointer;display: inline-block;width: 22px;height: 22px;border-radius: 100%;font-weight: normal;color: #acacac;" class="load-more-color-three-dot">
                                    <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="16px" height="20px" viewBox="0 0 16 20" enable-background="new 0 0 16 20" xml:space="preserve"><g><path fill="#B2B2B2" d="M2.33,8.11c-1.04,0-1.89,0.851-1.89,1.89c0,1.039,0.85,1.89,1.89,1.89c1.039,0,1.89-0.851,1.89-1.89C4.22,8.96,3.37,8.11,2.33,8.11z M13.67,8.11c-1.04,0-1.89,0.851-1.89,1.89c0,1.039,0.851,1.89,1.89,1.89c1.04,0,1.89-0.851,1.89-1.89C15.56,8.96,14.71,8.11,13.67,8.11z M8,8.11C6.961,8.11,6.11,8.96,6.11,10c0,1.039,0.851,1.89,1.89,1.89S9.89,11.04,9.89,10C9.89,8.96,9.039,8.11,8,8.11z"></path></g></svg>
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
                    edit_text_position(y, x + 121 * 4);
                }
            });
        $('.choose-card').click(function(event) {

            event.preventDefault();

            let src = $(this).find('img').attr('src');

            $('.card-wedding').css("background-image", "url('" + src +"')");

            $('.card-wedding').css('background-repeat', 'round');
        });

        $('.card-text-input').on('change keyup keydown paste cut', function() {

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

            event.preventDefault();

            let positionTop = $(this).position();

            let offsetLeft = $(this).offset();

            edit_text_position(positionTop.top, offsetLeft.left);
        });

        function edit_text_position(top, left) {

            $('.edit-text').css('left', left);

            $('.edit-text').css('top', top - 130);

            $('.edit-text').show();
        }

        $('.close-edit-text').on('click', function() {
            $(this).closest('.edit-text').hide();
        })
    });
</script>
@endsection
