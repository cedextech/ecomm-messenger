@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <section class="content-header" id="page-dashboard">
        <h1>Dashboard</h1>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-shopping-cart"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Orders</span>
                        <span class="info-box-number" id="index-orders-total"></span>

                        <span class="progress-description">
                            {{ $today }}
                        </span>
                    </div>
                </div>
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon"><i class="fa fa-money"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Sales</span>
                        <span class="info-box-number" id="index-sales-total"></span>

                        <span class="progress-description">
                            {{ $today }}
                        </span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Orders (Last 10 days)</h3>
                    </div>

                    <div class="box-body">
                        <div class="chart">
                            <canvas id="chart-orders" style="height:250px"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <h3 class="box-title">Sales (Last 10 days)</h3>
                    </div>

                    <div class="box-body">
                        <div class="chart">
                            <canvas id="chart-sales" style="height:250px"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
@endsection