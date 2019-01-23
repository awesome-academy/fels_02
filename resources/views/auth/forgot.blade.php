@extends('layouts.home.master')

@section('content')
    <div class="courses_banner">
        <div class="container">
            <h3>@lang('auth.forgot')</h3>
            <p class="description">
                @lang('auth.welcome')
            </p>
            <div class="breadcrumb1">
                <ul>
                    <li class="icon6"><a href="{{route('home.index')}}">@lang('auth.home')</a></li>
                    <li class="current-page">@lang('auth.forgot')</li>
                </ul>
            </div>
        </div>
    </div>

    <div class="courses_box1">
        <div class="container">
            {!! Form::open(array('route' => 'forgot.store', 'class' => '')) !!}
            @include('common.errors')
            <div class="form-group">
                {!! Form::email('email', old('email'), ['class' =>'form-control', 'id' => 'email', 'placeholder' => trans('auth.email'), 'required' => 'required', 'pattern' => config('setting.patter_email'),  'title' => trans('messages.validation_js_email')]) !!}
            </div>
            <div class="form-group">
                {!! Form::text('username', old('username'), ['class' =>'required form-control', 'id' => 'username', 'placeholder' => trans('auth.username'), 'required' => 'required', 'pattern' => '^[a-z\d\.]{4,}$', 'title' => trans('messages.validation_js_username')]) !!}
            </div>
            <div class="send">
                {!! Form::submit(trans('auth.send'), ['class' => 'btn btn-success']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection
