@extends('layouts.home.master')
@section('title')
    @lang('messages.lb_allWord')
@endsection
@section('content')
<div class="courses_banner">
    <div class="container">
        <h3>@lang('messages.lb_allWord')</h3>
        <p class="description">
            @lang('messages.lb_allWord')
        </p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="{{ route('home.index') }}">@lang('messages.btn_home')</a></li>
                <li class="current-page">@lang('messages.lb_allWord')</li>
            </ul>
        </div>
    </div>
</div>
<div class="admission admission-allWord">
    <div class="container" >
        <div class="allWord-head">
            <span class="allWord-head-p1">{{ $countWords }} @lang('messages.lb_words')</span>
            <span class="allWord-head-p2">{{ $countSaved }} @lang('messages.lb_rememberes')</span>
        </div>
        <div class="allWord-body">
            <div class="allWord-body-head">
                <div>
                    <span><i class="fa fa-plus"></i>&nbsp;@lang('messages.lb_saveWord')</span>
                    <span><i class="fa fa-minus"></i>&nbsp;@lang('messages.lb_notYetSaveWord')</span>
                </div>
            </div>
            @foreach($words as $key => $word)
            <div class="allWord-body-body">
                <div class="allWord-body-left">
                    {{ $word->word_name }}
                </div>
                <div class="allWord-body-right">
                    @if(Auth::check())
                        <span id="word{{$word->word_id}}" onclick="return ajaxToggleWordRemember({{$word->word_id}})">
                            @if(array_key_exists($word->word_id, $wordRemember))
                                <i class="fa fa-plus"></i>
                            @else
                                <i class="fa fa-minus"></i>
                            @endif
                        </span>
                     @else
                        <span class="saveWord" data-confirm="@lang('messages.needLogin')"><i class="fa fa-minus"></i></span>
                    @endif
                </div>
                <div class="allWord-body-center">
                    <span>{{ $word->word_type }}</span>&nbsp;<span>{{ $word->translate }}</span>
                </div>
            </div>
            @endforeach
        </div>
    <div class="clearfix"> </div>
    <div class="pag-words">
        {{ $words->links() }}
    </div>
</div>
@endsection
