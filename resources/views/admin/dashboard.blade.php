@extends('layouts.app')
@section('content')
<div class="page-heading">
    <div class="pull-left">
        <h4>Dashboard</h4>
    </div>
</div>
<div class="dashboard">
    <div class="container-fluid">
        <div class="row">
            {{-- @foreach ($cmSs as $cms)
            @if ($cms->type == 'analytics')
            <div class="col-sm-6  mb-4">
                <div class="card">
                    <div class="dashboard-card">
                        <div class="flex-shrink-0">
                            <img src="{{asset('images/deal-complete.svg')}}" 
                            alt="People deal Completed">
                        </div>
                        <div class="flex-grow-1 ms-3">
                            <div class="d-flex justify-content-between">
                                <h4>{{$cms->count}}</h4>
                                <form>
                                    <label class="custom-switch">
                                        <input data-id="{{$cms->id}}" class="toggle-class" @if($cms->status==1) {{'checked'}}
                                        @endif data-onstyle="success" onclick="updateStatus({{$cms->id}})" type="checkbox" >
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                            <p>{{$cms->description}}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach --}}
        </div>
        <!-- <div class="row">
            <div class="col-sm-5 mb-4">
                <div class="card">
                    <div id="chart"></div>
                </div>
            </div>
            {{-- <div class="col-sm-3 mb-4">
                <div class="card">
                    <canvas id="myChart1"></canvas>
                </div>
            </div> --}}
        </div> -->
    </div>
</div>
<h4>kjjbn</h4>
@endsection
@section('script')



<!-- <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
<script>
var options = {
    chart: {
        type: 'bar',
        fontFamily: '"Poppins", sans-serif',
    },
    title: {
        text: 'Products Exchange',
        align: 'left',
        margin: 10,
        offsetX: 0,
        offsetY: 0,
        floating: false,
        style: {
            fontSize:  '20px',
            fontWeight:  '500',
            color:  '#000'
        },
    },
    series: [{
        name: "Products Exchange",
        data: [30, 40, 45, 50, 49, 60, 70, 91, 125, 200, 215, 180]
    }],
    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
    },
    fill: {
        colors: ['#3399CA']
    }
}

var chart = new ApexCharts(document.querySelector("#chart"), options);

chart.render();


</script> -->
@endsection