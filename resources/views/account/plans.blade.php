@extends('layouts.app')

@section('title', 'Pricing Plan')

@section('content')
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>Pricing Plan</h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-danger">
                        <div class="box-body">
                            <div class="row-fluid">
                                <div class="pricing-table row-fluid text-center">
                                    <div class="col-md-4">
                                        <div class="plan">
                                            <div class="plan-name">
                                                <h2>Basic</h2>
                                                <p class="muted">Perfect for small budget</p>
                                            </div>
                                            <div class="plan-price">
                                                <b>$19</b> / month
                                            </div>
                                            <div class="plan-details">
                                                <div>
                                                    <b>Unlimited</b> Download
                                                </div>
                                                <div>
                                                    <b>Free</b> Priority Shipping
                                                </div>
                                                <div>
                                                    <b>Unlimited</b> Warranty
                                                </div>
                                            </div>
                                            <div class="plan-action">
                                                <a href="#" class="btn btn-block btn-large">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="plan prefered">
                                            <div class="plan-name">
                                                <h2>Standard</h2>
                                                <p class="muted">Perfect for medium budget</p>
                                            </div>
                                            <div class="plan-price">
                                                <b>$39</b> / month
                                            </div>
                                            <div class="plan-details">
                                                <div>
                                                    <b>Unlimited</b> Download
                                                </div>
                                                <div>
                                                    <b>Free</b> Priority Shipping
                                                </div>
                                                <div>
                                                    <b>Unlimited</b> Warranty
                                                </div>
                                            </div>
                                            <div class="plan-action">
                                                <a href="#" class="btn btn-success btn-block btn-large">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="plan">
                                            <div class="plan-name">
                                                <h2>Advance</h2>
                                                <p class="muted">Perfect for large budget</p>
                                            </div>
                                            <div class="plan-price">
                                                <b>$59</b> / month
                                            </div>
                                            <div class="plan-details">
                                                <div>
                                                    <b>Unlimited</b> Download
                                                </div>
                                                <div>
                                                    <b>Free</b> Priority Shipping
                                                </div>
                                                <div>
                                                    <b>Unlimited</b> Warranty
                                                </div>
                                            </div>
                                            <div class="plan-action">
                                                <a href="#" class="btn btn-block btn-large">Choose Plan</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <p class="muted text-center">
                                    Note: You can change or cancel your plan at anytime in your account settings.
                                    Note: You can change or cancel your plan at anytime in your account settings.
                                    Note: You can change or cancel your plan at anytime in your account settings.
                                    Note: You can change or cancel your plan at anytime in your account settings.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection