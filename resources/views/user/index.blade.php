@extends('layouts.user.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')

    @include('layouts.user.section.slider')

    <div class="container mb-20">

        <div class="col-lg-8">

            @include('layouts.user.section.wedding_plan')

            @include('layouts.user.section.show_card')
        </div>

        <div class="col-lg-4 pd-0">

            @include('layouts.user.section.news')
        </div>

    </div>
    
@endsection
