@extends('layouts.home.master')
@section('title')
@lang('messages.lb_progress')
@endsection
@section('content')
{!! Html::style(asset('progress/css/style.css')) !!}
<div class="courses_banner">
    <div class="container">
        <h3>@lang('messages.lb_progress')</h3>
        <p class="description">
            @lang('messages.lb_progress')
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ route('home.index') }}">@lang('messages.btn_home')</a></li>
                <li class="current-page">@lang('messages.lb_progress')</li>
            </ul>
        </div>
    </div>
</div>
<div class="admission admission-allWord">
<div class="container container-progress">
    <div class="row">
        <a id="progress" data-progress="{{$user_progressJson}}"></a>
        @foreach($user_progress as $key => $progress)
        <div class="col-md-3">
            <div class="circle-area">
                <div class="circle-area-wrapper" id="cirlc-{{$progress->usertopic_id}}">
                    <div class="circle-inner" id="inner{{$progress->usertopic_id}}">
                    </div>
                </div>
                <h2> {{ $progress->topic_name }}</h2>
            </div>
        </div>
        @endforeach
    </div>
    <div class="clearfix"> </div>
</div>
{!! Html::script(asset('progress/js/circle-progress.min.js')) !!}
{!! Html::script(asset('progress/js/active.js')) !!}
@endsection
