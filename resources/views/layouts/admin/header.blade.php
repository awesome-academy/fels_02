<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Framgia E-Learning">
    <meta name="author" content="Framgia E-Learning">
    <meta name="keywords" content="Framgia E-Learning">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    {{ Html::style(asset('layouts/admin/css/font-face.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/font-awesome-4.7/css/font-awesome.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/font-awesome-5/css/fontawesome-all.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/mdi-font/css/material-design-iconic-font.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/bootstrap-4.1/bootstrap.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/animsition/animsition.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/wow/animate.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/css-hamburgers/hamburgers.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/slick/slick.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/select2/select2.min.css')) }}
    {{ Html::style(asset('layouts/admin/vendor/perfect-scrollbar/perfect-scrollbar.css')) }}
    {{ Html::style(asset('layouts/admin/css/theme.css')) }}
    {{ Html::style(asset('layouts/admin/css/adminStyle.css')) }}
    {{ Html::style(asset('https://formden.com/static/cdn/font-awesome/4.4.0/css/font-awesome.min.css')) }}
    {{ Html::script(asset('https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js')) }}
</head>
<body class="animsition">
    <div class="page-wrapper">
        @include('layouts.admin.leftbar')
        <div class="page-container">
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            {!! Form::open(['class'=>'form-header', 'method'=>'POST']) !!}
                                {!! Form::text('search', '', ['class'=>'au-input au-input--xl', 'placeholder'=>trans('adminMess.lb_search...')]) !!}
                                {!! Form::submit(trans('adminMess.btn_search'), ['class'=>'au-btn--submit search-admin']) !!}
                            {!! Form::close() !!}
                            <div class="header-button">
                                <div class="noti-wrap">
                                    <div class="noti__item js-item-menu" onclick="markNotificationAsRead('{{count(auth()->user()->unreadNotifications)}}')">
                                        <i class="zmdi zmdi-notifications"></i>
                                        <span class="quantity">{{count(auth()->user()->unreadNotifications)}}</span>
                                        <div class="notifi-dropdown js-dropdown">
                                            
                                            @if(count(auth()->user()->unreadNotifications) > 0)
                                                @foreach(auth()->user()->unreadNotifications as $notification)
                                                    <div class="notifi__item">
                                                        <div class="bg-c1 img-cir img-40">
                                                            <i class="zmdi zmdi-email-open"></i>
                                                        </div>
                                                        @include('layouts.admin.notification.'.snake_case(class_basename($notification->type)))
                                                    </div>
                                                @endforeach
                                            @else
                                            <div class="notifi__title">
                                                <p>
                                                    @lang('adminMess.lb_noNotification')
                                                </p>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                            <img src="/images/users/avatar.jpg" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">Admin</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                        <img src="/images/users/avatar.jpg" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                        <a href="#"> xuan nam</a>
                                                    </h5>
                                                    <span class="email">xnam7799@gmail.com</span>
                                                </div>
                                            </div>
                                            
                                            <div class="account-dropdown__footer">
                                                <a href=""><i class="zmdi zmdi-power"></i>@lang('adminMess.btn_logout')</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
