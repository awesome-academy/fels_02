@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_editTopic')
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <strong>@lang('adminMess.lb_editTopic')</strong>
                        </div>
                        <div class="card-body card-block">
                            @include('common.errors')
                            {!! Form::open(['method'=>'PUT', 'enctype'=>'multipart/form-data', 'class'=>'form-horizontal', 'route'=>array('topic-admin.update', $topic->topic_id)]) !!}
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_topicName'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::text('name', $topic->topic_name, ['id'=>'text-input', 'placeholder'=>trans('adminMess.place_inputTopicName'), 'class'=>'form-control']) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('text-input', trans('adminMess.lb_preview'), ['class'=>'form-control-label']) !!}
                                </div>
                                <div class="col-12 col-md-9">
                                    {!! Form::textarea('preview', $topic->preview, ['class'=>'form-control', 'row'=>'9', 'placeholder'=>trans('adminMess.place_textArea')]) !!}
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col col-md-3">
                                    {!! Form::label('file-input', trans('adminMess.lb_choosePicture'), ['class'=>'form-control-label']) !!}
                                    {!! Form::radio('radio', 'yes', '', ['id'=>'btnDisplayBlock']) !!}
                                    {!! Form::label('file-input', trans('adminMess.lb_noChoosePicture'), ['class'=>'form-control-label']) !!}
                                    {!! Form::radio('radio', 'no', '', ['id'=>'btnDisplayNone']) !!}
                                </div>
                                <div class="col-12 col-md-9" id="chooseFile">
                                    {!! Form::file('picture', ['id'=>'file-input', 'class'=>'form-control-file']) !!}
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::submit(trans('adminMess.btn_edit'), ['class'=>'btn btn-primary btn-sm']) !!}
                                {!!  Form::reset(trans('adminMess.btn_reset'), ['class'=>'btn btn-danger btn-sm', 'id'=>'btn_reset']) !!}
                            </div>
                        {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
@endsection
