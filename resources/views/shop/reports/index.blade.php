@extends('layouts.app')

@section('title', 'Reports')

@section('content')
    <section class="content-header">
        <h1>Reports</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-addon">
                            <i class="fa fa-calendar"></i>
                        </div>
                        <input type="text" class="form-control pull-right" id="report-daterange-picker" data-start="{{ $startDate }}" data-end="{{ $endDate }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body table-responsive no-padding">

                        @if(!$reports->isEmpty())

                            <table class="table table-hover" id="report-table">
                                <tr>
                                    <td width="15%"><strong><center>Date</center></strong></td>
                                    <td width="15%"><strong><center>Orders</center></strong></td>
                                    <td width="15%"><strong><center>Net Sales</center></strong></td>
                                    <td width="15%"><strong><center>Delivery Fee</center></strong></td>
                                    <td width="15%"><strong><center>Tax</center></strong></td>
                                    <td width="15%"><strong><center>Total Sales</center></strong></td>
                                </tr>

                                @foreach($reports as $report)
                                    <tr>
                                        <td><center>{{ $report->order_date->format('d M Y') }}</center></td>
                                        <td><center>{{ $report->orders_count }}</center></td>
                                        <td><center>{{ format_currency($report->net_total) }}</center></td>
                                        <td><center>{{ format_currency($report->total_delivery_fee) }}</center></td>
                                        <td><center>{{ format_currency($report->total_tax_amount) }}</center></td>
                                        <td><center>{{ format_currency($report->total_sales) }}</center></td>
                                    </tr>
                                @endforeach
                            </table>

                        @else
                            <br>
                            <p class="well">No records found!</p>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection