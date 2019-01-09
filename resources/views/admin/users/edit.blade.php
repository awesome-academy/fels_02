@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_editUser')
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>@lang('adminMess.lb_editUser')</strong>
                        </div>
                        <div class="card-body card-block">
                            @include('common.errors')
                            {!! Form::open(['method'=>'PUT', 'route'=>array('user.update', $user->user_id), 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal']) !!}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_username'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('username', $user->username, ['id'=>'text-input', 'placeholder'=>trans('adminMess.place_username'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_password'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::password('password', ['placeholder'=>trans('adminMess.place_password'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_rePassword'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::password('repassword', ['placeholder'=>trans('adminMess.place_rePassword'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_fullname'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('fullname', $user->fullname, ['placeholder'=>trans('adminMess.place_fullname'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_email'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::email('email', $user->email, ['placeholder'=>trans('adminMess.place_email'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('select', trans('adminMess.lb_gender'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::select('gender', [config('setting.id_genderMale') => config('setting.name_genderMale'), config('setting.id_genderFemale') => config('setting.name_genderFemale')], null, ['id'=>'select', 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_birthday'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    <div class="input-group">
                                       <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                       </div>
                                       {!! Form::text('birthday', $user->date_of_birth, ['id'=>'date', 'class'=>'form-control', 'placeholder'=>'YYYY/DD/MM']) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_address'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('address', $user->address, ['placeholder'=>trans('adminMess.place_address'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_phone'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('phone', $user->phone, ['placeholder'=>trans('adminMess.place_phone'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('file-input', trans('adminMess.lb_avatar'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::file('avatar', ['id'=>'file-input', 'class'=>'form-control-file']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('select', trans('adminMess.lb_role'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::select('role', $Roles, null, ['class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::submit('Update', ['class'=>'btn btn-primary btn-sm']) !!}
                                {!!  Form::reset('Reset', ['class'=>'btn btn-danger btn-sm']) !!}
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
@endsection
