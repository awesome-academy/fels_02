@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_title_lesson')
@endsection
@section('content')
    @include('admin.lesson.edit')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="user-data m-b-30 mb30-userAdmin">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>@lang('adminMess.lb_lesson')
                            </h3>
                            @include('common.errors')
                            <div class="table-data__tool data-tool-add">
                                <div class="table-data__tool-right">
                                    <a href="{{route('adminlesson.create')}}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>@lang('adminMess.btn_addlesson')
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>@lang('adminMess.lb_lesson_name')</td>
                                        <td>@lang('adminMess.lb_lesson_picture')</td>
                                        <td>@lang('adminMess.lb_lesson_preview')</td>
                                        <td>@lang('adminMess.lb_topic')</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($displayLesson as $ls)
                                        <tr>
                                            <td>
                                                <div class="table-data__info">
                                                    <h6>{{ $ls->lesson_name }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="image">
                                                    <a href="{{asset('images/lessons/'.$ls->picturels)}}">
                                                        <img src="{{asset('images/lessons/'.$ls->picturels)}}" alt="Admin"/>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ $ls->preview }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $ls->topic_name }}</span>
                                            </td>
                                            <td>
                                                <span class="more">
                                                    <button type="button" data-toggle="modal"  data-target="#exampleModal" data-lessonid="{{$ls->lesson_id}}" data-lessonname="{{$ls->lesson_name}}" data-preview="{{$ls->preview}}" data-picture="{{$ls->picturels}}" data-topicid="{{$ls->topic_id}}"> <i class="zmdi zmdi-edit"></i></button>
                                                </span>
                                                <span class="more">
                                                    <a href="#" class="btn_del_lesson" onclick="return del_lesson({{$ls->lesson_id}});">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                    {!! Form::open(['method' => 'DELETE', 'id' => 'form-lesson']) !!}
                                                    {!! Form::close() !!}
                                                </span>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
@endsection
