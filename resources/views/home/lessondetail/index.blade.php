@extends('layouts.home.master')
@section('title')
    @lang('messages.lesson_detail_title')
@endsection
@section('content')
    <div class="courses_banner">
        <div class="container">
            <h3>@lang('messages.lb_topic')</h3>
            <p class="description">@lang('auth.welcome')</p>
            <div class="breadcrumb1">
                <ul>
                    <li class="icon6"><a href="index.html">@lang('messages.btn_home')</a></li>
                    <li class="current-page">{{ $namelesson->lesson_name }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="admission admission-wordlist">
        <div class="container" >
            <div class="test-list-space">
                <div class="test-list-title">
                    <div>
                        <h3><a href="">{{ $nametopic->topic_name }}</a> > <a href="">{{ $namelesson->lesson_name }}</a></h3>
                        <p>@lang('messages.label_lsdetail_note')</p>
                    </div>
                </div>
                <div class="box-all">
                    @foreach($LessonDetail as $ls)
                    <div class="box-img">
                        <div class="inbox-img">
                            <img src="/images/words/{{$ls->picture}}" class="img-word1">
                        </div>
                        <li class="dropdown clist">
                            <audio id="audiotag{{$ls->word_id}}" src="/audio/{{$ls->sound}}" preload="auto"></audio>
                            <a href="javascript:play_single_sound({{ $ls->word_id }});">
                                <span class="fas fa-volume-up"></span>
                            </a>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$ls->word_name}}</a>
                            <ul class="dropdown-menu">
                                <p>
                                    <span>@lang('messages.span_spell'): &nbsp;&nbsp;&nbsp;</span><span>{{$ls->spelling}}</span></br>
                                    <span>@lang('messages.span_trans'): &nbsp;&nbsp;&nbsp;</span><span>{{$ls->translate}}</span>
                                </p>
                            </ul>
                        </li>
                    </div>
                    @endforeach
                    <a href="{{ route('test-lesson.show', $namelesson->lesson_id) }}" class="btn btn-success testbtn" >@lang('messages.btn_test')</a>
                </div>
            </div>
        </div>
@endsection
