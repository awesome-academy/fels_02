@extends('layouts.home.master')
@section('title')
    @lang('messages.statis')
@endsection
@section('content')
    <div class="container emp-profile op ">
        <div class="op2">
            <p>@lang('messages.description_tk')</p>
            <ul>
                <li>@lang('messages.sum_word_in_month')<strong>{{ $sum_month }}</strong></li>
                <li>@lang('messages.sum_word_in_year')<strong>{{ $sum_year }}</strong></li>
            </ul>
        </div>
        <ul class="nav nav-pills ranges">
            <li class="active"><a href="javascript:void(0)" data-range='2'>@lang('messages.view_value_current_month')</a></li>
            <li><a href="javascript:void(0)" data-range='1'>@lang('messages.view_value_current_year')</a></li>
        </ul>
        <div id="chart" style="height: 250px;"></div>
    </div>
    {{ Html::script(asset('layouts/home/js/morrishandle.js')) }}
@endsection
