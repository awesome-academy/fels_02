@extends('layouts.admin.master')
@section('title')
   @lang('adminMess.title_admin_index')
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row m-t-25">
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ Route('user.index') }}">
                    <div class="overview-item overview-item--c1">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon icon-homeAdmin">
                                    <i class="fas fa-users"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $sumuser }}</h2>
                                    <span>@lang('adminMess.lb_user')</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart1"></canvas>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ Route('topic-admin.index') }}">
                    <div class="overview-item overview-item--c2">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon icon-homeAdmin">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $sumTopic }}</h2>
                                    <span>@lang('adminMess.lb_topic')</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart2"></canvas>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{ route('adminlesson.index') }}">
                    <div class="overview-item overview-item--c3">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon icon-homeAdmin">
                                    <i class="fas fa-book"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $sumLesson }}</h2>
                                    <span>@lang('adminMess.lb_lesson')</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart3"></canvas>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <a href="{{-- route('adminword.index') --}}">
                    <div class="overview-item overview-item--c4">
                        <div class="overview__inner">
                            <div class="overview-box clearfix">
                                <div class="icon icon-homeAdmin">
                                    <i class="fab fa-amilia"></i>
                                </div>
                                <div class="text">
                                    <h2>{{ $sumWord }}</h2>
                                    <span>@lang('adminMess.lb_word')</span>
                                </div>
                            </div>
                            <div class="overview-chart">
                                <canvas id="widgetChart4"></canvas>
                            </div>
                        </div>
                    </div>
                    </a>
                </div>
            </div>
@endsection
