@extends('layouts.main')

@section('title')
    {{ __('page.title.timeline') }}
@endsection

@section('page-name')
    {{ __('page.page.timeline') }}
@endsection

@section('main-content')
<section class="timeline">
    <div class="container">
        <div class="timeline-item">
            <div class="timeline-img"></div>
            <div class="timeline-content js--fadeInLeft">
                <div class="task-right">
                    <span class="date">1 MAY 2016 </span>
                    <span class="task-title">Tilte onsectetur adipisicing elit</span>
                    <div class="mt-2">
                        <span class="task-category">Dia diem</span>
                    </div>
                </div>
                <div class="task-panel-wrapper">
                    <div class="product-addto-links-text">
                        <div class="more hideContent">Bài này viết dành cho các bác muốn tìm hiểu về công nghệ nằm dưới Bitcoin, đi vào từng những khái niệm đơn giản đến phần công nghệ nằm dưới nó mang đến một cái nhìn tổng quan về công nghệ Blockchain sử dụng trong cái gọi là Bitcoin Protocol.</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="timeline-item">
            <div class="timeline-img"></div>
            <div class="timeline-content timeline-card js--fadeInRight">
                <div class="task-left">
                    <span class="task-title">Tilte</span>
                    <span class="date">25 MAY 2016</span>
                    <div class="mt-2">
                        <span class="task-category">Dia diem</span>
                    </div>
                </div>
                <div class="task-panel-wrapper">
                    <div class="product-addto-links-text">
                        <div class="more hideContent">Lorem ipsum dolor sit amet consectetur adipisicing elituis</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
