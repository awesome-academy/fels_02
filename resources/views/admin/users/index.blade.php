@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_manageUser')
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="user-data m-b-30 mb30-userAdmin">
                        <h3 class="title-3 m-b-30">
                            @if(session()->has('msg'))
                                <div class="alert alert-success">
                                    {{ session()->get('msg') }}
                                </div>
                            @endif
                            <i class="zmdi zmdi-account-calendar"></i>@lang('adminMess.lb_userData')
                        </h3>
                        <div class="table-data__tool data-tool-add">
                            <div class="table-data__tool-right">
                                
                                <a href="{{ route('user.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                    <i class="zmdi zmdi-plus"></i>@lang('adminMess.btn_addUser')
                                </a>
                            </div>
                        </div>
                        <div class="table-responsive table-data">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>@lang('adminMess.lb_username')</td>
                                        <td>@lang('adminMess.lb_role')</td>
                                        <td>@lang('adminMess.lb_avatar')</td>
                                        <td>@lang('adminMess.lb_status')</td>
                                        <td>@lang('adminMess.lb_option')</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($Users as $key => $user)
                                    <tr>
                                        <td>
                                            <label class="au-checkbox">
                                                <input type="checkbox">
                                                <span class="au-checkmark"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <div class="table-data__info">
                                                <h6>{{ $user->username }}</h6>
                                                <span>
                                                    <a href="#">{{ $user->email }}</a>
                                                </span>
                                            </div>
                                        </td>
                                        
                                        <td>
                                            <span class="role {{ $user->role_name }}">{{ $user->role_name }}</span>
                                        </td>
                                        <td>
                                            <div class="image">
                                                <a href="/images/users/{{ $user->avatar }}">
                                                    <img src="/images/users/{{ $user->avatar }}" alt="Admin"/>
                                                </a>
                                            </div>
                                        </td>
                                        <td>
                                            @if($user->role_id != config('setting.number_whereRoleID'))
                                                <label class="switch switch-3d switch-success mr-3" id="active{{$user->user_id}}">
                                                    @if($user->status == config('setting.status_userActive1'))
                                                        <input type="checkbox" class="switch-input" checked="true" onchange="return ajaxToggleActiveStatus({{ $user->user_id }}, {{config('setting.status_userActive1')}})">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>

                                                        @else
                                                        <input type="checkbox" class="switch-input" onchange="return ajaxToggleActiveStatus({{ $user->user_id }}, {{config('setting.status_userActive0')}})">
                                                        <span class="switch-label"></span>
                                                        <span class="switch-handle"></span>
                                                    @endif
                                                </label>
                                            @endif
                                        </td>       
                                        
                                        <td>
                                            @if($user->role_id != config('setting.number_whereRoleID'))
                                                <span class="more">
                                                    <a href="{{ route('user.edit', $user->user_id) }}" class="btn btn-primary" role="button">@lang('adminMess.btn_edit')</a>
                                                </span><br>
                                                <span class="more">
                                                    {!! Form::open(['route'=>['user.destroy', $user->user_id], 'method'=>'DELETE']) !!}
                                                        {!! Form::submit(trans('adminMess.btn_del'), ['id'=>'btn_del', 'class'=>'btn btn-danger', 'data-confirm' => trans('adminMess.confirmDelete')]) !!}
                                                    {!! Form::close() !!}
                                                </span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            {{ $Users->links() }}
                        </div>
                    </div>
                </div>
            </div>
@endsection
