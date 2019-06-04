@extends('layouts.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')
    @include('layouts.section.slider')

    @include('layouts.section.news2')

    @include('layouts.section.wedding_plan')

    {{-- @include('layouts.section.wedding_location') --}}

    {{-- @include('layouts.section.feature_wedding') --}}

    {{-- @include('layouts.section.call_out') --}}

    {{-- @include('layouts.section.choose') --}}

    {{-- @include('layouts.section.testimonial') --}}
@endsection
