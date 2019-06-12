<div id="choose-orientation" class="modal modal-center fade" role="dialog">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3>{{ __('base.choose') . __('base.orientation') }}</h3>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="container col-md-12">
                    <div class="row">
                        <div class="col-md-6 pointer choose-orientation" data-dismiss="modal" data-orientation="vertical">
                            <img src="{{ asset(config('asset.card.orientation') . 'vertical.png') }}" alt="{{ __('base.vertical') }}">
                        </div>
                        <div class="col-md-6 pointer choose-orientation" data-dismiss="modal" data-orientation="horizontal">
                            <img src="{{ asset(config('asset.card.orientation') . 'horizontal.png') }}" alt="{{ __('base.horizontal') }}">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
