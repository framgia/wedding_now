@extends('layouts.app')

@section('title')
    {{ __('page.title.home') }}
@endsection

@section('content')
    <!-- home revolution slider  -->
    @include('layouts.section.slider')
    <!-- end home revolution slider -->

    <!-- wedding plan -->
    @include('layouts.section.wedding_plan')
    <!-- end wedding plan -->

    <!-- wedding location -->
    @include('layouts.section.wedding_location')
    <!-- end wedding location -->

    <!-- wedding gallery -->
    @include('layouts.section.wedding_gallery')
    <!-- end wedding gallery -->

    <!-- feature wedding -->
    @include('layouts.section.feature_wedding')
    <!-- end feature wedding -->

    <!-- call out -->
    @include('layouts.section.call_out')
    <!-- end call out -->

    <!-- why choose -->
    @include('layouts.section.choose')
    <!-- end why choose -->

    <!-- testimonial -->
    @include('layouts.section.testimonial')
    <!-- end testimonial -->

    <!-- news and update -->
    @include('layouts.section.news')
    <!-- end news and update -->

@endsection
