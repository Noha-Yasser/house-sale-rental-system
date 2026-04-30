@extends('dashboard.cms.parent')

@section('title', 'HOME')
@section('main-title', 'Dashboard')
@section('sub-title', 'General Statistics')

@section('styles')
<style>
    .small-box { border-radius: 10px; overflow: hidden; }
</style>
@endsection

@section('content')


<?php
use Illuminate\Support\Facades\DB;

$totalProperties = DB::table('properties')->count();
$totalRevenue = DB::table('transactions')->sum('amount') ?? 0;
$totalCompanies = DB::table('companies')->count();
$pendingBookings = DB::table('bookings')->where('status', 'pending')->count();

$cityData = DB::table('properties')
    ->join('cities', 'properties.city_id', '=', 'cities.id')
    ->select('cities.city_name', DB::raw('count(properties.id) as count'))
    ->groupBy('cities.city_name')
    ->get();


$cityNames = $cityData->pluck('city_name')->toArray();
$cityCounts = $cityData->pluck('count')->toArray();
?>

<div class="container-fluid">
    
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $totalProperties }}</h3>
                    <p>Total Properties</p>
                </div>
                <div class="icon"><i class="fas fa-building"></i></div>
                <a href="{{ route('properties.index') }}" class="small-box-footer">View all<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ number_format($totalRevenue) }}<sup style="font-size: 20px">$</sup></h3>
                    <p>Total Revenue</p>
                </div>
                <div class="icon"><i class="fas fa-wallet"></i></div>
                <a href="#" class="small-box-footer">the details <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>{{ $totalCompanies }}</h3>
                    <p>Registered companies</p>
                </div>
                <div class="icon"><i class="fas fa-briefcase"></i></div>
                <a href="{{ route('companies.index') }}" class="small-box-footer">Corporate Management<i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
                <div class="inner">
                    <h3>{{ $pendingBookings }}</h3>
                    <p>Bookings pending confirmation</p>
                </div>
                <div class="icon"><i class="fas fa-calendar-alt"></i></div>
                <a href="#" class="small-box-footer">Review <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-chart-bar mr-1"></i>
                    Distribution of real estate by city
                    </h3>
                </div>
                <div class="card-body">
                    <div class="chart">
                        <canvas id="cityChart" style="min-height: 300px; height: 300px; max-height: 300px; max-width: 100%;"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
  $(function () {
    var ctx = document.getElementById('cityChart').getContext('2d');
    
    // ألوان مختلفة لكل مدينة
    var colors = ['#3c8dbc', '#28a745', '#ffc107', '#dc3545', '#17a2b8', '#6f42c1', '#fd7e14', '#20c997'];
    
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: {!! json_encode($cityNames) !!},
            datasets: [{
                data: {!! json_encode($cityCounts) !!},
                backgroundColor: colors.slice(0, {!! json_encode($cityNames) !!}.length),
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false
        }
    });
  });
</script>
@endsection