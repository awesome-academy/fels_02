<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>@yield('title')</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="Framgia E-learning System" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ Html::style(asset('layouts/home/css/bootstrap-3.1.1.min.css')) }}
        {{ Html::style(asset('//fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700')) }}
        {{ Html::style(asset('layouts/home/css/style.css')) }}
        {{ Html::style(asset('layouts/home/css/jquery.countdown.css')) }}
        {{ Html::style(asset('layouts/home/css/font-awesome.css')) }}
        {{ Html::style(asset('layouts/home/css/mystyle.css')) }}
        {{ Html::style(asset('layouts/home/css/mystyle2.css')) }}
        {{ Html::style(asset('layouts/home/css/flag-icon.css')) }}
        {{ Html::script(asset('layouts/home/js/jquery.min.js')) }}
        {{ Html::script(asset('js/logoutajax.js')) }}
        {{ Html::script(asset('layouts/home/js/bootstrap.min.js')) }}
        {{ Html::script(asset('layouts/home/js/dropdownHead.js')) }}
        {{ Html::script(asset('layouts/home/js/handlejs.js')) }}
        {{ Html::script('messages.js') }}
        {{ Html::style(asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css')) }}
    </head>
    <body>
        <span id="bug" data-bug="@lang('messages.view_bug')"></span>
        <nav class="navbar navbar-default" role="navigation">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="{{ route('home.index') }}">Framgia E-learning</a>
                </div>
                <div class="navbar-collapse collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        @guest
                        <li class="dropdown">
                            <a href="{{route('login.index')}}"><i class="fa fa-user"></i><span>@lang('messages.btn_login')</span></a>
                        </li>
                        @else
                        <li class="dropdown">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-globe"></i><span> {{ Auth::user()->username }}</span></a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="javascript:void(0)" id="logout" onclick="return false">@lang('messages.btn_logout')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{Route('wordfollow.show', Auth::user()->user_id)}}" id="remember">@lang('messages.word_saved')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{Route('user-progress.index')}}" id="remember">@lang('messages.btn_progress')</a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{Route('history.index')}}" id="history">@lang('messages.history')</a>
                                </li>
                            </ul>
                        </li>
                        @endguest
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-search"></i><span>@lang('messages.btn_search')</span></a>
                            <ul class="dropdown-menu search-form">
                                {!! Form::open(['method'=>'POST']) !!}
                                {!! Form::text('search', '', ['class'=>'search-text', 'placeholder'=>trans('messages.lb_search')]) !!}
                                {!! Form::submit('Search', ['class'=>'search-submit']) !!}
                                {!! Form::close() !!}
                            </ul>
                        </li>
                        <li>
                            {!! Form::open(['method' => 'POST', 'route'=>['switch.lang']]) !!}
                                {!! Form::select
                                    (
                                        'locale',
                                        ['en' => trans('messages.lang.en'), 
                                        'vi' => trans('messages.lang.vi')],
                                        Lang::locale()==='vi' ? 'vi' : 'en' ,
                                        ['onchange'=>'this.form.submit()', 'class'=>'selectLang']
                                     )
                                 !!}
                            {!! Form::close() !!}
                        </li>
                    </ul>
                </div>
                <div class="clearfix"> </div>
            </div>
        </nav>
        <nav class="navbar nav_bottom" role="navigation">
            <div class="container">
                <div class="navbar-header nav_2">
                    <button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"></a>
                </div>
                <div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
                    <ul class="nav navbar-nav nav_1">
                        <li><a href="{{ route('home.index') }}">@lang('messages.btn_home')</a></li>
                        <li class="dropdown mega-dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">@lang('messages.btn_topic')<span class="caret"></span></a>
                            <div class="dropdown-menu mega-dropdown-menu">
                                <div class="container-fluid">
                                    <div class="tab-content">
                                        @foreach($displayTopics as $key => $topic)
                                        <div class="tab-pane active" id="lesson{{ $topic->topic_id }}">
                                            <ul class="nav-list list-inline">
                                                @foreach($displayLessons as $key => $lesson)
                                                @if($lesson->topic_id == $topic->topic_id)
                                                <li><a href="{{ route('lessondetail.show', $lesson->lesson_id) }}"><img src="/images/lessons/{{ $lesson->picture }}" class="img-responsive in-header" alt=""/></a></li>
                                                @endif
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                <ul class="nav nav-tabs" role="tablist">
                                    @foreach($displayTopics as $key => $topic)
                                    <li><a href="#lesson{{ $topic->topic_id }}" id="auto_load" role="tab" data-toggle="tab">{{ $topic->topic_name }}</a></li>
                                    @endforeach
                                    {{ Html::script(asset('layouts/home/js/autoloadBtnTopic.js')) }}
                                </ul>
                            </div>
                        </li>
                        <li class="nav navbar-nav nav_1"><a href="{{ route('words.index') }}">@lang('messages.btn_allWord')</a></li>
                    </ul>
                </div>
            </div>
        </nav>
