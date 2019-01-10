@extends('layouts.home.master')
@section('title')
    @lang('messages.lb_topic')
@endsection
@section('content')
<div class="courses_banner">
    <div class="container">
        <h3>@lang('messages.lb_topic')</h3>
        <p class="description">
            @lang('messages.lesson_decription')
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ route('home.index') }}">@lang('messages.lb_home')</a></li>
                <li class="current-page">@lang('messages.lb_topic')</li>
            </ul>
        </div>
    </div>
</div>
<div class="admission">
    <div class="container">
        <div class="Topic_bottom">
            @foreach($topicPaginate as $key => $topic)
                <div class="col-md-4 Topic_grid">
                    <figure class="team_member">
                        <img src="/images/topics/{{ $topic->picture }}" class="img-responsive wp-post-image" alt=""/>
                        <div></div>
                        <figcaption>
                            <h3 class="person-title"><a href="{{ route('lesson.show', $topic->topic_id) }}">{{ $topic->topic_name }}</a></h3>
                            <span class="person-deg">{{ $topic->preview }}</span>
                            <p><a href="">0/20</a></p>
                            <div class="person-social">
                                <ul class="social-person">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                        </figcaption>
                    </figure>
                </div>
            @endforeach
            <div class="clearfix"> </div>
        </div>
        <ul class="pagination">
            {{ $topicPaginate->links() }}
        </ul>
    </div>
</div>
@endsection
