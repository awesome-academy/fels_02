    @extends('layouts.home.master')
    @section('title')
        @lang('messages.lesson_title')
    @endsection
    @section('content')
<div class="courses_banner">
    <div class="container">
        <h3>{{ $topic->topic_name }}</h3>
        <p class="description">
            {{ $topic->preview }}
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ route('home.index') }}">@lang('messages.btn_home')</a></li>
                <li class="current-page">{{ $topic->topic_name }}</li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="bottom_content">
        <div class="grid_2">
            @foreach($resultLesson as $key => $lesson)
                <div class="col-md-4 portfolio-left">
                    <div class="portfolio-img event-img">
                        <img src="/images/lessons/{{ $lesson->picture }}" class="img-responsive"/>
                        <div class="over-image"></div>
                    </div>
                    <div class="portfolio-description">
                        <h4><a href="#">{{ $lesson->lesson_name }}</a></h4>
                        <p>{{ $lesson->preview }}</p>
                        <a href="{{route('lessondetail.show',$lesson->lesson_id)}}">
                            <span><i class="fa fa-chain chain_1"></i>@lang('messages.btn_viewLesson')</span>
                        </a>
                    </div>
                    <div class="clearfix"> </div>
                </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
    </div>
    <ul class="pagination">
        {{ $resultLesson->links() }}
    </ul>
</div>
@endsection
