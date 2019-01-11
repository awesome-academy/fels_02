@extends('layouts.home.master')
@section('title')
Test Lesson
@endsection
@section('content')
<div class="courses_banner">
    <div class="container">
        <h3>@lang('messages.lb_testLesson')</h3>
        <p class="description">Welcome to Framgia E-Learning System</p>
        <div class="breadcrumb1">
            <ul>
                <li class="icon6"><a href="index.html">Home</a></li>
                <li class="current-page">Test Lesson</li>
            </ul>
        </div>
    </div>
</div>
<div class="admission admission-wordlist">
    <div class="container" >
        <div class="test-list-space">
            <div class="test-list-title">
                <div>
                    <h3><a href="" >Animal</a> > <a href="">Lesson1</a></h3>
                    <p>Fill in the blanks</p>
                </div>
            </div>
            <div class="test-list">
                <img src="/layouts/home/images/t10.jpg" alt="" class="img-test-word">
                <input type="text" name="" value="" placeholder="">
                <img src="/layouts/home/images/speaker.png" class="img-speaker" onclick="document.getElementById('myTune1').play()">
                <audio id="myTune1">
                    <source src="audio/dog.mp3">
                </audio>
            </div>
            <div class="test-list-bot">
                <button class="btn btn-primary" type="submit">Finish</button>
                <button class="btn btn-primary" type="reset">Try Again</button>
            </div>
        </div>
    <div class="test-list-right">
        <div class="vertical-menu">
            <a href="#" class="active">Home</a>
            <a href="#">Link 1</a>
            <a href="#">Link 2</a>
        </div>
    </div>
    <div class="clearfix"> </div>
</div> 
@endsection
