@extends('layouts.home.master')
@section('title')
    @lang('messages.profile')
@endsection
@section('content')
    <h3 class = "title-history">@lang('adminMess.history_title')</h3>
    <div class="ex1">
        @foreach($history as $hs)
            <div class="div1">
                @php
                    $end = date("H:i");
                    $start = date("H:i", strtotime($hs->created_at));
                    $minutes = (strtotime($end) - strtotime($start)) / 60;
                @endphp
                @if(date("Y-m-d", strtotime($hs->created_at)) >= date("Y-m-d"))
                    @if($minutes <= 5)
                        <img class="img-new" src="images/other/new.png" title="{{$hs->created_at}}">
                    @endif
                @endif
                @if($hs->isWord == 1)
                    <p class="history-c"><a class="text">{{ $hs->content }}</a> <span class="time-date">{{date("H:i:s d-m-Y", strtotime($hs->created_at))}}</span></p>
                @else
                    <p class="history-c"><a href="{{Route('test-lesson.show', $hs->lesson_id)}}" class="text">{{ $hs->content }}</a> <span class="time-date">{{date("H:i:s d-m-Y", strtotime($hs->created_at))}}</span></p>
                @endif
            </div>
        @endforeach
    </div>
@endsection
