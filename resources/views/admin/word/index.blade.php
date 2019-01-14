@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_title_word')
@endsection
@section('content')
    @include('admin.word.edit')
    <div class="main-content">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="user-data m-b-30 mb30-userAdmin">
                            <h3 class="title-3 m-b-30">
                                <i class="zmdi zmdi-account-calendar"></i>@lang('adminMess.lb_title_word')
                            </h3>
                            @include('common.errors')
                            <div class="table-data__tool data-tool-add">
                                <div class="table-data__tool-right">
                                    <a href="{{route('adminword.create')}}"
                                       class="au-btn au-btn-icon au-btn--green au-btn--small">
                                        <i class="zmdi zmdi-plus"></i>@lang('adminMess.btn_addlesson')
                                    </a>
                                </div>
                            </div>
                            <div class="table-responsive table-data">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>@lang('adminMess.lb_word_name')</td>
                                        <td>@lang('adminMess.lb_word_picture')</td>
                                        <td>@lang('adminMess.lb_word_sound')</td>
                                        <td>@lang('adminMess.lb_word_spell')</td>
                                        <td>@lang('adminMess.lb_word_translate')</td>
                                        <td>@lang('adminMess.lb_lesson_name')</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($word as $wd)
                                        <tr>
                                            <td>
                                                <div class="table-data__info">
                                                    <h6>{{ $wd->word_name }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="image">
                                                    <a href="{{asset(config('setting.word_file_path').$wd->picturewd)}}">
                                                        <img src="{{asset(config('setting.word_file_path').$wd->picturewd)}}" alt="Admin"/>
                                                    </a>
                                                </div>
                                            </td>
                                            <td>
                                                <span>{{ $wd->sound }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $wd->spelling }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $wd->translate }}</span>
                                            </td>
                                            <td>
                                                <span>{{ $wd->lesson_name }}</span>
                                            </td>
                                            <td>
                                                <span class="more">
                                                    <button type="button" data-toggle="modal" data-target="#editWord"
                                                        data-wordname="{{$wd->word_name}}"
                                                        data-picture="{{$wd->picturewd}}"
                                                        data-sound="{{$wd->sound}}" data-spell="{{$wd->spelling}}"
                                                        data-translate="{{$wd->translate}}"
                                                        data-idlesson="{{$wd->lesson_id}}"
                                                        data-wordid="{{$wd->word_id}}"
                                                        data-path="{{config('setting.word_file_path')}}"
                                                        data-audiopath="{{config('setting.word_file_audio_path')}}">
                                                    <i class="zmdi zmdi-edit"></i>
                                                    </button>
                                                </span>
                                                <span class="more">
                                                    <a href="#" class="btn_del_word" onclick="return del_word({{$wd->word_id}});">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </a>
                                                    {!! Form::open(['class'=> 'form-word', 'id' => 'form-lesson', 'method' => 'DELETE']) !!}
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
