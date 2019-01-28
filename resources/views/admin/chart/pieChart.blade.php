@extends('layouts.admin.master')
@section('title')
   @lang('adminMess.titleChart')
@endsection
@section('content')
{!! Html::script(asset('https://code.highcharts.com/highcharts.js')) !!}
{!! Html::script(asset('https://code.highcharts.com/modules/data.js')) !!}
{!! Html::script(asset('https://code.highcharts.com/modules/drilldown.js')) !!}
<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="user-data m-b-30 mb30-userAdmin">
                        <div class="piechart" id="container" data-gettest='{!! $getTest !!}' data-grouptopic='{!! $groupTopic !!}'></div>
                        <pre id="piechart"></pre>
                    </div>
                </div>
            </div>
{!! Html::script(asset('layouts/admin/js/pieChart.js')) !!}
@endsection
