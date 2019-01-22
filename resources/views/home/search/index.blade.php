@extends('layouts.home.master')
@section('title')
    @lang('messages.lb_search')
@endsection
@section('content')
{!! Html::style(asset('layouts/home/css/search.css')) !!}
<div class="courses_banner">
    <div class="container">
        <h3>@lang('messages.lb_search')</h3>
        <p class="description">
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ route('home.index') }}">@lang('messages.lb_home')</a></li>
                <li class="current-page">@lang('messages.lb_search')</li>
            </ul>
        </div>
    </div>
</div>
<div class="admission">
    <div class="container">
        <div class="Topic_bottom">
            <div class="wrap">
               <div class="search">
                    {!! Form::open(['route'=>'search', 'id'=>'search']) !!}
                        {!! Form::text('search', old('search'), ['class'=>'searchTerm', 'placeholder'=>trans('messages.lb_search')]) !!}
                        {!! Form::submit('Search', ['class'=>'searchButton']) !!}
                    {!! Form::close() !!}
               </div>
            </div>
            <div class="search-result-area">
                <div class="search-img">
                    <img src="/images/words/{{ $getWord->picture }}">
                </div>
                <div class="search-detail">
                    <div class="search-detail-top">
                        <span class="search-detail-top1">{{ $getWord->word_name }}</span>&nbsp;
                        <span class="search-detail-top2">{{ $getWord->spelling }}</span>&nbsp;
                        <audio id="audiotag{{ $getWord->word_id }}" src="/audio/{{ $getWord->sound }}" preload="auto"></audio>
                        <a href="javascript:play_single_sound({{ $getWord->word_id }});">
                            <span class="fa fa-volume-up"></span>
                        </a>
                    </div>
                    <div class="search-detail-bot">
                        {{ $getWord->translate }}
                    </div>
                </div>
            </div>                  
            <div class="clearfix"> </div>
        </div>
    </div>
</div>
@endsection
