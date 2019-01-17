@extends('layouts.home.master')

@section('content')
    <div class="courses_banner">
        <div class="container">
            <h3>@lang('auth.login')</h3>
            <p class="description">
                @lang('auth.welcome')
            </p>
            <div class="breadcrumb1">
                <ul>
                    <li class="icon6"><a href="{{route('home.index')}}">@lang('auth.home')</a></li>
                    <li class="current-page">@lang('auth.login')</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="courses_box1">
        <div class="container">
            {!! Form::open(['method' => 'post', 'route' => 'login.store', 'class' => 'login']) !!}
                <p class="lead">@lang('auth.title')</p>
                @include('common.errors')
                <div class="form-group">
                    {!! Form::text('log_username', '', ['class' =>'required form-control', 'placeholder' => trans('auth.username')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::password('log_password', ['class' =>'password required form-control', 'placeholder' => trans('auth.password')]) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit(trans('auth.login'), ['class' => 'btn btn-primary btn-lg1 btn-block']) !!}
                    <a href="redirect/facebook" class="btn btn-primary btn-lg1 btn-block fb"><i class="fa fa-facebook tab"></i> @lang('auth.loginfb')</a>
                    <a href="redirect/google" class="btn btn-primary btn-lg1 btn-block gg"><i class="fa fa-google-plus tab"></i> @lang('auth.logingg')</a>
                    <a href="redirect/twitter" class="btn btn-primary btn-lg1 btn-block tw"><i class="fa fa-twitter tab"></i> @lang('auth.logintw')</a>
                </div>
                <p>@lang('auth.linkregister') <a href="{{route('register.index')}}" title='@lang('auth.register')' >@lang('auth.register')</a></p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
