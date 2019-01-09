@extends('layouts.home.master')
@section('title')
    @lang('messages.lb_testLesson')
@endsection
@section('content')
@include('common.errors')
<div class="courses_banner">
    <div class="container">
        <h3>@lang('messages.lb_testLesson')</h3>
        <p class="description">@lang('auth.welcome')</p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ route('home.index') }}">@lang('messages.lb_home')</a></li>
                <li class="current-page">@lang('messages.lb_testLesson')</li>
            </ul>
        </div>
    </div>
</div>
<div class="admission admission-wordlist">
    <div class="container" >
        <div class="test-list-space">
            <div class="test-list-title">
                <div>
                    <h3><a href="{{ route('lesson.show', $topic->topic_id) }}" >{{ $topic->topic_name }}</a> > <a href="{{ route('lessondetail.show', $lesson->lesson_id) }}">{{ $lesson->lesson_name }}</a></h3>
                    <p>@lang('messages.lb_fillBlanks')</p>
                </div>
            </div>
            {!! Form::open(['route'=>array('test', $lesson->lesson_id), 'method'=>'POST']) !!}
            @foreach($words as $key => $word)
                <div class="test-list">
                    <img src="/images/words/{{ $word->picture }}" class="img-test-word">
                    {!! Form::text('word'.$word->word_id, old('word'.$word->word_id), ['placeholder'=>trans('messages.input_word')]) !!}
                    <img src="/layouts/home/images/speaker.png" alt="spelling" class="img-speaker" onclick="return play_single_sound({{$word->word_id}})">
                    <audio id="audiotag{{ $word->word_id }}">
                        <source src="/audio/{{ $word->sound }}">
                    </audio>
                </div>
                @endforeach
                <div class="test-list-bot">
                    {!! Form::submit(trans('messages.btn_finish'), ['class'=>'btn btn-primary']) !!}
                    {!! Form::reset(trans('messages.btn_tryAgain'), ['class'=>'btn btn-primary']) !!}
                </div>
            {!! Form::close() !!}
        </div>
    <div class="test-list-right">
        <div class="vertical-menu">
            <a href="{{ route('lesson.show', $topic->topic_id) }}" class="active">{{ $topic->topic_name }}</a>
            @foreach($lessons as $key => $lesson)
            <a href="{{ route('test-lesson.show', $lesson->lesson_id) }}">{{ $lesson->lesson_name }}</a>
            @endforeach
        </div>
    </div>
    <div class="clearfix"> </div>
</div>
@endsection
