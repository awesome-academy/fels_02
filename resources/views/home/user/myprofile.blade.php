@extends('layouts.home.master')
@section('title')
    @lang('messages.profile')
@endsection
@section('content')
    <div class="container emp-profile">
        <div class="row">
            <div class="col-md-4">
                {!! Form::open(['method' => 'PUT', 'route' => ['profile.update', Auth::user()->user_id], 'files' => true, 'id' => 'save_ava']) !!}
                <div class="profile-img" id="avatar">
                    <img src="images/users/{{Auth::user()->avatar}}"/>
                    <div class="file btn btn-lg btn-primary">
                        @lang('messages.btn_changeava')
                        {!! Form::file('avatar',['id' => 'edit_ava']) !!}
                    </div>
                </div>
                {!! Form::hidden('user_id', Auth::user()->user_id, ['class' => 'form-control', 'id' => 'user_id']) !!}
                {!! Form::close() !!}
            </div>
            <div class="col-md-6">
                <div class="profile-head">
                    <h5>
                        {{ Auth::user()->username }}
                    </h5>
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="title-profile navcolor nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">@lang('messages.profile')</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-md-2">
                <a class="profile-edit-btn" href="javascript:void(0)" id="btn_edit">
                    @lang('messages.btn_editprofile')
                </a>
            </div>
        </div>
        <div class="row">
            <div class="coltrai canletrai">@include('common.errors')</div>
            <div class="col-md-8 canle">
                <div class="tab-content profile-tab cantrong">
                    {!! Form::open(['method' => 'PUT', 'route' => ['profile.update', Auth::user()->user_id], 'files' => true, 'id' => 'profile_form']) !!}
                    <div class="tab-pane fade show active in" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.username'):</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->username }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.fullname')</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->fullname }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.birthday'):</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->date_of_birth }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.email'):</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->email }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.phone'):</label>
                            </div>
                            <div class="col-md-6 ">
                                <p>{{ Auth::user()->phone }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.address'):</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{ Auth::user()->address }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-mar">
                                <label>@lang('auth.gender'):</label>
                            </div>
                            <div class="col-md-6">
                                <p>{{(Auth::user()->gender == config('setting.male_set'))? trans('messages.male') :trans('messages.female')}}</p>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
