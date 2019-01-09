@extends('layouts.admin.master')
@section('title')
    @lang('adminMess.lb_manageTopics')
@endsection
@section('content')
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="title-5 m-b-35">

                        @if(session()->has('msg'))
                            <div class="alert alert-success">
                                {{ session()->get('msg') }}
                            </div>
                        @endif
                        <i class="fas fa-book"></i>@lang('adminMess.lb_manageTopics')
                    </h3>
                    <a href="{{ route('topic-admin.create') }}" class="au-btn au-btn-icon au-btn--green au-btn--small">
                        <i class="fas fa-book"></i>@lang('adminMess.btn_addTopic')
                    </a>
                    <div class="table-responsive table-responsive-data2">
                        <table class="table table-data2">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <td>@lang('adminMess.lb_topicName')</td>
                                    <td>@lang('adminMess.lb_preview')</td>
                                    <td>@lang('adminMess.lb_picture')</td>
                                    <td>@lang('adminMess.lb_option')</td>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($topics as $key => $topic)
                                <tr class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td class="desc">{{ $topic->topic_name }}</td>
                                    <td class="long">{{ $topic->preview }}</td>
                                    <td>
                                        <div class="image">
                                            <a href="/images/topics/{{ $topic->picture }}">
                                                <img src="/images/topics/{{ $topic->picture }}" />
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route('topic-admin.edit', $topic->topic_id) }}" class="btn btn-primary" role="button">@lang('adminMess.btn_edit')</a>
                                        {!! Form::open(['route'=>['topic-admin.destroy', $topic->topic_id], 'method'=>'DELETE']) !!}
                                            {!! Form::submit(trans('adminMess.btn_del'), ['id'=>'btn_del', 'class'=>'btn btn-danger', 'data-confirm' => trans('adminMess.confirmDelete')]) !!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $topics->links() }}
                    </div>
                </div>
            </div>
@endsection
