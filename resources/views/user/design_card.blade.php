<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>Untitled Design</title>
    <meta name="viewport"
          content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no, viewport-fit=cover">
    <link href="{{ asset(config('asset.users.images.index') . 'favicon.ico') }}" rel="icon" type="image/x-icon"/>
    @routes
    {{ Html::script('messages.js') }}
    <link href="{{ asset('css/design_card/design_card.css') }}" rel="stylesheet">
</head>

<body>
@include('user.card.file')
@include('user.card.select_font')
@include('user.card.select_size')
<div id="root">
    <div class="_29dFFT66p2ix2AqEl1i9BW">
        <div class="_29dFFT66p2ix2AqEl1i9BW">
            <main class="iclQqo4_Y8ip6YTOzL60X QqTckhtB10nzgqYLi6rbI" tabindex="-1">
                @include('user.card.header')
                <section class="HrQrJKrVoI4gXhpKupPzO">
                    <div class="PlUB--YjA6fwzeSdoW7r8">
                        <div class="_3y29Q17r8v43pfVrD9KAMZ">
                            @include('user.card.left_content')
                            @include('user.card.right_content')
                        </div>
                    </div>
                </section>
            </main>
        </div>
    </div>
</div>

</body>
<script type="text/javascript" src="{{ asset('js/design_card/design_card.js') }}"></script>
</html>
