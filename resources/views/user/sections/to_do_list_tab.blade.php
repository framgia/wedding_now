<ul class="to-do-list-tabs general-nav-tabs tabs">
    <li>
        <a href="{{ route('client.schedule') }}"
            class="btn btn-default @if(Route::currentRouteName() === 'client.schedule') active @endif"
            >
            <span class="badge">{{ __('page.my_wedding') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('client.to-do-list') }}"
            class="btn btn-default @if(Route::currentRouteName() === 'client.to-do-list') active @endif"
            >
            <span class="badge">{{ __('page.page.to_do_list') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('client.design-card') }}" target="_blank" class="btn btn-default @if(Route::currentRouteName() === 'client.design-card') active @endif">
            <span class="badge">{{ __('page.page.wedding_card') }}</span>
        </a>
    </li>
</ul>
