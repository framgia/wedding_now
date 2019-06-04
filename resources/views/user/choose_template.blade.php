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
        <div class="design-card">
            <h3>{{ __('page.design_card.choose.template') }}</h3>
            <div class="col-lg-12">
                <ul>
                    @foreach ($templates as $template)
                        <div class="col-lg-4 p-20">
                            <li class="template-item"><a href="#" class="choose-template" data-template-id="{{ $template->id }}">
                                <img class="choose-image-template-img w-100-h-100" src="{{ config('asset.card_template') . $template->background_image }}"></a>
                            </li>
                        </div>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')
    <script type="text/javascript">

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $('.choose-template').on('click', function(event) {

            event.preventDefault();

            let id = $(this).attr('data-template-id');
            
            $.ajax({
                url: route('client.choose-template'),
                type: 'post',
                data: {
                    id: id   
                }
            })
            .done(function() {

                 window.location.reload(true);
            })
            .fail(function() {

                toastr.error( Lang.get('page.message.fail') );
            })
        });
    </script>
@endsection
