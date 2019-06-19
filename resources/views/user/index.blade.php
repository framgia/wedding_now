@extends('layouts.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')

    @include('layouts.section.slider')

    <div class="container mb-20">

        <div class="col-lg-8">

            @include('layouts.section.wedding_plan')

            @include('layouts.section.show_card')
        </div>

        <div class="col-lg-4 pd-0">

            @include('layouts.section.news')
        </div>

    </div>
    
@endsection
