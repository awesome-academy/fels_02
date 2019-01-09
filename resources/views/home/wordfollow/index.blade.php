@extends('layouts.home.master')
@section('title')
    @lang('messages.word_remember_title')
@endsection
@section('content')
    <div class="courses_banner">
        <div class="container">
            <h3>@lang('messages.lb_topic')</h3>
            <p class="description">@lang('auth.welcome')</p>
            <div class="breadcrumb1">
                <ul>
                    <li class="icon6"><a href="index.html">@lang('messages.btn_home')</a></li>
                    <li class="current-page">@lang('messages.word_remember_title')</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="admission admission-wordlist">
        <div class="container" >
            <div class="test-list-space">
                <div class="test-list-title">
                    <div>
                        <p>@lang('messages.list_word_followed')</p>
                        <strong>@lang('messages.sum_word_followed') {{ $sum }}</strong>
                    </div>
                </div>
                <div class="box-all">
                    @foreach($wordRemeber as $wr)
                        <div class="box-img">
                            <div class="inbox-img">
                                <img src="/images/words/{{$wr->picture}}" alt="" class="img-word1">
                            </div>
                            <li class="dropdown clist">
                                <audio id="audiotag{{$wr->word_id}}" src="/audio/{{$wr->sound}}" preload="auto"></audio>
                                <a href="javascript:play_single_sound({{ $wr->word_id }});">
                                    <span class="fa fa-volume-up"></span>
                                </a>
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$wr->word_name}}</a>
                                <ul class="dropdown-menu">
                                    <p>
                                        <span>@lang('messages.span_spell'): &nbsp;&nbsp;&nbsp;</span><span>{{$wr->spelling}}</span></br>
                                        <span>@lang('messages.span_trans'): &nbsp;&nbsp;&nbsp;</span><span>{{$wr->translate}}</span>
                                    </p>
                                </ul>
                            </li>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
@endsection
