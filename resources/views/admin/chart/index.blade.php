@extends('layouts.admin.master')
@section('title')
   @lang('adminMess.titleChart')
@endsection
@section('content')
<script src="https://cdn.anychart.com/js/latest/anychart-bundle.min.js"></script>
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="user-data m-b-30 mb30-userAdmin">
                      <div id="container" data-range='{!! $sumtest !!}'></div>
                    </div>
                </div>
            </div>
@endsection
