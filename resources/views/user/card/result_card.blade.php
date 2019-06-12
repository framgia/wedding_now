@php
    $first = true;
@endphp
@foreach ($card->pages as $page)
    @if ($first)
<div class="_2fV_WHHHafq510ZMzFrSbO page page-main" data-id="{{ $page->id }}">
    @php
        $first = false;
    @endphp
    @else
        <div class="_2fV_WHHHafq510ZMzFrSbO page d-none" data-id="{{ $page->id }}">
    @endif
        <div class="V6XejnQ8rEFlQzimE1p_D uHudNMvClWL2eGrKYVA2z">
            <div class="I_bUVGZm853-lyKpiaDqF _3xVoQD9L7ZqRisB_kXc31b re0cKcGxZsBmUDfVR7kCl">
                <div class="_2roMyhYIoYCJM809qezZIK _2roMyhYIoYCJM809qezZIK-style">
                    <div class="_191cTEp6xxp0srHdFdIhtG _1z-JWQqxYHVcouNSwtyQUF _3l4uYr79jSRjggcw5QCp88">
                        <div class="BRQRXGYkDm4zlUar6mXYN"></div>
                        <div class="_1EFnTlbnUg_8uSr9k-1Hm8">
                            <div class="">
                                <div>
                                    <div class="_31uWmHO9EAiK-svWrFHsbG">
                                        <button class="_2Rww-JOL60obmcYkaUOyg_ Wqfq1nAfa6if4eEOr6Mza _1z-JWQqxYHVcouNSwtyQUF _3l4uYr79jSRjggcw5QCp88 BtPP5SuPEK2p1AhF7hIuS Wqfq1nAfa6if4eEOr6Mza _1z-JWQqxYHVcouNSwtyQUF _3l4uYr79jSRjggcw5QCp88 _3QJ_C8Lg1l0m5aoIK5piST _2kK9hFUTyqtMKr5EG4GuY4 _1AVQLXYVssdHraRxjGSgbN _18Nu_ahwHkGR_L5AZJs1JN" type="button">
                                            <span class="_3WuwevpUMOqhISoQUjDiY3">
                                                <span class="_263JfgDCA9f05o8eBCAnYw">
                                                    <svg width="20" height="20" viewBox="0 0 20 20"
                                                         fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" clip-rule="evenodd" d="M11.559 13.75l3.191 1.995V13.75H16a.75.75 0 0 0 .75-.75V5a.75.75 0 0 0-.75-.75H4a.75.75 0 0 0-.75.75v8c0 .414.336.75.75.75h7.559zM2 5a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2v1.196a1 1 0 0 1-1.53.848L11.2 15H4a2 2 0 0 1-2-2V5z" fill="currentColor"></path>
                                                    </svg>
                                                </span>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="_3a984HDytkQ1wpz-WNzd7A">
                    <div class="_2lC2QtQshUItjm2q48r14s _2lC2QtQshUItjm2q48r14s-style card-wedding">
                        <div class="background">
                            <img class="img-fluid" data-base-asset="{{ asset(config('asset.card.vertical.background')) }}" src="{{ asset(config('asset.card.vertical.background') . $page->background) }}" alt="">
                        </div>
                        <div class="contain-box">
                            @foreach ($page->cardMetas as $box)
                                <div class="element drag" style="{{ $box->div_style }}"
                                     data-id="{{ $box->id }}">
                                    <textarea class="content" style="{{ $box->textarea_style }}" spellcheck="false">
                                        {{ $box->content }}
                                    </textarea>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach
        
