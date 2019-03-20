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
        <a href="#" class="btn btn-default">
            <span class="badge">{{ __('page.page.my_budget') }}</span>
        </a>
    </li>
    <li>
        <a href="#" class="btn btn-default">
            <span class="badge">{{ __('page.page.vendor_manager') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('client.design-card') }}" class="btn btn-default @if(Route::currentRouteName() === 'client.design-card') active @endif">
            <span class="badge">{{ __('page.page.wedding_card') }}</span>
        </a>
    </li>
    <li>
        <a href="{{ route('real-wedding.index') }}"
            class="btn btn-default @if(Route::currentRouteName() === 'real-wedding.index' || Route::currentRouteName() === 'real-wedding.show') active @endif"
            >
            <span class="badge">{{ __('page.page.real_wedding') }}</span>
        </a>
    </li>
</ul>
