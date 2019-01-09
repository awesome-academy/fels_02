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
            {!! Form::open(['method' => 'post', 'route' => 'register.store', 'class' => 'login']) !!}
            <p class="lead">@lang('auth.title')</p>
            @include('common.errors')
            @if(!empty($username))
                <div class="form-group">
                    {!! Form::text('username', $username, ['class' =>'required form-control', 'placeholder' => trans('auth.username')]) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::text('username', old('username'), ['class' =>'required form-control', 'placeholder' => trans('auth.username')]) !!}
                </div>
            @endif
            <div class="form-group">
                {!! Form::password('password', ['class' =>'password required form-control', 'placeholder' => trans('auth.password')]) !!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation', ['class' => 'password required form-control', 'id' => 'password-confirm', 'placeholder' => trans('auth.repassword')]) !!}
            </div>
            @if(!empty($fullname))
                <div class="form-group">
                    {!! Form::text('fullname', $fullname, ['class' =>'required form-control', 'placeholder' => trans('auth.fullname')]) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::text('fullname', old('fullname'), ['class' =>'required form-control', 'placeholder' => trans('auth.fullname')]) !!}
                </div>
            @endif
            @if(!empty($email))
                <div class="form-group">
                    {!! Form::email('email', $email, ['class' =>'required form-control', 'placeholder' => trans('auth.email')]) !!}
                </div>
            @else
                <div class="form-group">
                    {!! Form::email('email', old('email'), ['class' =>'required form-control', 'placeholder' => trans('auth.email')]) !!}
                </div>
            @endif
            <div class="form-group">
                {!! Form::submit(trans('auth.register'), ['class' => 'btn btn-primary btn-lg1 btn-block']) !!}
            </div>
            <p>@lang('auth.linklogin') <a href="{{route('login.index')}}" title='@lang('auth.login')' >@lang('auth.login')</a></p>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
