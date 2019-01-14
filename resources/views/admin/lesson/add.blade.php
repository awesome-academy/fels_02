@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.add_lesson')
@endsection
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            {!! Form::open(['method' => 'POST', 'route' => 'adminlesson.store', 'class' => 'form-horizontal', 'files' => true]) !!}
                            <div class="card-header">
                                <strong>@lang('adminMess.btn_addlesson')</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('lesson_name', trans('adminMess.lb_lesson_name'), ['class' => 'form-control-label', 'id' => 'name_label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::text('lesson_name', '', ['class' => 'form-control', 'placeholder' => trans('adminMess.placeholder_lsname'), 'id' => 'lesson_name']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('preview', trans('adminMess.lb_lesson_preview'), ['class' => 'form-control-label', 'id' => 'preview_label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::textarea('preview', '', ['class' => 'form-control', 'placeholder' => trans('adminMess.textarea'), 'id' => 'preview']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('topic_id', trans('adminMess.lb_topic'), ['class' => 'form-control-label', 'id' => 'topic_label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::select('topic_id', $topic, $topic->pluck('topic_id'), ['class' => 'form-control', 'id' => 'topic_id']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('picture', trans('adminMess.lb_lesson_picture'), ['class' => 'form-control-label', 'id' => 'picture_label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        <img src=""/>
                                        {!! Form::file('picture', ['class' => 'form-control-file', 'id' => 'picture'])  !!}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                {!! Form::submit(trans('adminMess.btn_submit'), ['class' => 'btn btn-primary btn-sm']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
@endsection
