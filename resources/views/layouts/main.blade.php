@extends('layouts.app')

@section('content')
    <!-- page banner -->
    @include('layouts.section.banner')
    <!-- end page banner -->
    @yield('main-content')
@endsection
