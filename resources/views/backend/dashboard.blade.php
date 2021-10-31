@extends('backend.layouts.app')

@section('title','Dashboard')

@push('style')
  
@endpush

@section('content')
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1"><i class="fas fa-building"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending Land Owner Request</span>
            <span class="info-box-number">{{ $pendingLandOwnerRequest }}</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-plus"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending Client Demand</span>
            <span class="info-box-number">{{ $pendingClientDemand }}</span>
          </div>
        </div>
      </div>

      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1"><i class="fas fa-comments"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Pending Visitor Feedback</span>
            <span class="info-box-number">{{ $pendingVisitorFeedback }}</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-graduation-cap"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Active Jobs</span>
            <span class="info-box-number">{{ $activeJob }}</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-users"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">New Visitors</span>
            <span class="info-box-number">{{ $newVisitor }}</span>
          </div>
        </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-user-friends"></i></span>

          <div class="info-box-content">
            <span class="info-box-text">Returning Visitors</span>
            <span class="info-box-number">{{ $returningVisitor }}</span>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header card-title">
            <span class="info-box-text">Total visitors and page views</span>
          </div>
          <div class="card-body">
            <canvas id="myChart" width="400" height="200"></canvas>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <div class="card-header card-title">
            <span class="info-box-text">Most visited pages</span>
          </div>
          <div class="card-body">
            <canvas id="myPieChart" width="400" height="433"></canvas>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div id="var-chart" data-var-chart-id="{{ json_encode($barChartData) }}" ></div>
  <div id="pie-chart" data-pie-chart-id="{{ json_encode($pieChartData) }}" ></div>

</section>
@endsection
 
@push('script')
<script>
var barChartData = $('#var-chart').data("var-chart-id");
var pieChartData = $('#pie-chart').data("pie-chart-id");

console.log(pieChartData.pageTitle);

var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: barChartData.date,
        datasets: [
          {
              label: 'Total Visitor',
              backgroundColor: '#42acef',
              data: barChartData.visitors,
          },
          {
              label: 'Total Page View',
              backgroundColor: '#F00',
              data: barChartData.pageViews
          }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});
var ctxx = document.getElementById('myPieChart').getContext('2d');
var myChart = new Chart(ctxx, {
    type: 'pie',
    data: {
        labels: pieChartData.pageTitle,
        datasets: [{
            data: pieChartData.totalvisite,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            //borderWidth: 1
        }]
    }
});

</script>
@endpush