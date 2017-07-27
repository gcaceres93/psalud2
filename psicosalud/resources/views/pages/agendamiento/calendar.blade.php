@extends('layouts.master')

@section('main_content')

<style type="text/css" media="screen">
    html, body{
        margin:0px;
        padding:0px;
        height:100%;
        overflow:hidden;
    }   
</style>

<div id="scheduler_here" class="dhx_cal_container" style='width:100%; height:100%;'>
    <div class="dhx_cal_navline">
        <div class="dhx_cal_prev_button">&nbsp;</div>
        <div class="dhx_cal_next_button">&nbsp;</div>
        <div class="dhx_cal_today_button"></div>
        <div class="dhx_cal_date"></div>
        <div class="dhx_cal_tab" name="day_tab" style="right:204px;"></div>
        <div class="dhx_cal_tab" name="week_tab" style="right:140px;"></div>
        <div class="dhx_cal_tab" name="month_tab" style="right:76px;"></div>
    </div>
    <div class="dhx_cal_header"></div>
    <div class="dhx_cal_data"></div>       
</div>

<<script type="text/javascript">
$( document ).ready(function() {
    console.log( "ready!" );
   

    scheduler.init('scheduler_here', new Date(),"month");
    var events = [
    	{id:1, text:"Meeting",   start_date:"04/11/2017 14:00",end_date:"07/11/2017 17:00"},
    	{id:2, text:"Conference",start_date:"04/15/2017 12:00",end_date:"07/18/2017 19:00"},
    	{id:3, text:"Interview", start_date:"04/24/2017 09:00",end_date:"07/24/2017 10:00"}
    	];
    scheduler.parse(events, "json");//takes the name and format of the data source
});

</script>

@endsection