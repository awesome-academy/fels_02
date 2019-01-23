@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_addWord')
@endsection
@section('content')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            {!! Form::open(['method' => 'POST', 'route' => 'adminword.store', 'class' => 'form-horizontal', 'files' => true]) !!}
                            <div class="card-header">
                                <strong>@lang('adminMess.lb_addWord')</strong>
                            </div>
                            <div class="card-body card-block">
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('word_name', trans('adminMess.lb_word_name'), ['class' => 'form-control-label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::text('word_name', '', ['class' => 'form-control', 'id' => 'word_name']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('spelling', trans('adminMess.lb_word_spell'), ['class' => 'form-control-label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::text('spelling', '', ['class' => 'form-control', 'id' => 'spelling']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('translate', trans('adminMess.lb_word_translate'), ['class' => 'form-control-label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::text('translate', '', ['class' => 'form-control', 'id' => 'translate']) !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('lesson_id', trans('adminMess.lb_lesson_name'), ['class' => 'form-control-label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::select('lesson_id', $lesson, null, ['class' => 'form-control']) !!}
                                    </div>
                                </div>
                                <div class="row form-group ">
                                    <div class="col col-md-3">
                                        {!! Form::label('picture', trans('adminMess.lb_word_picture'), ['class' => 'form-control-label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::file('picture',['class' => 'form-control-file', 'id' => 'picture'])  !!}
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col col-md-3">
                                        {!! Form::label('sound', trans('adminMess.lb_word_sound'), ['class' => 'form-control-label']) !!}
                                    </div>
                                    <div class="col-12 col-md-9">
                                        {!! Form::file('sound',['class' => 'form-control-file', 'id' => 'sound'])  !!}
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
