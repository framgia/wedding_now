<div id="show-card">
    <h3 class="text-center">{{ __('page.page.show_card') }}</h3>

    <div class="content show-card-content">
        <h5>{{ __('page.page.card_vertical') }}</h5>
        @foreach ($templateHorizontal as $template)
            <div class="col-lg-4">
                <a href="">
                    <div class="border-template">
                        <img class="w-100" alt="" src="{{ asset(config('asset.card.present.horizontal') . $template->present_img) }}">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
    
    <div class="content show-card-content">
        <h5>{{ __('page.page.card_horizontal') }}</h5>
        @foreach ($templateVertical as $template)
            <div class="col-lg-4">
                <a href="">
                    <div class="border-template">
                        <img class="w-100" alt="" src="{{ asset(config('asset.card.present.vertical') . $template->present_img) }}">
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
