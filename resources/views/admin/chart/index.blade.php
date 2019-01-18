@extends('layouts.admin.master')
@section('title')
   chart
@endsection
@section('content')

<div class="main-content">
    <div class="section__content section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="user-data m-b-30 mb30-userAdmin">
                        <ul class="nav nav-pills ranges">
  <li class="active"><a href="#" data-range='7'>7 Days</a></li>
  <li><a href="#" data-range='30'>30 Days</a></li>
  <li><a href="#" data-range='60'>60 Days</a></li>
  <li><a href="#" data-range='90'>90 Days</a></li>
</ul>

<div id="stats-container" style="height: 250px;"></div>

<script>
$(function() {

  function requestData(months, chart){
    $.ajax({
      type: "GET",
      dataType: 'json',
      url: "./api", 
      data: { months: months }
    })
    .done(function( data ) {
      chart.setData(data);
    })
    .fail(function() {
      alert( "error occured" );
    });
  }

  var chart = Morris.Bar({
    element: 'stats-container',
    data: [0, 0], 
    xkey: 'months', 
    ykeys: ['value'], 
    labels: ['test_lesson'] 
  });

  requestData(1, chart);

  $('ul.ranges a').click(function(e){
    e.preventDefault();

    var el = $(this);
    months = el.attr('data-range');

    requestData(months, chart);
  })
});
</script>
                    </div>
                </div>
            </div>
@endsection
