@extends('layouts.app')

@section('title', 'Shop Settings')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Online Shop</h1>
                    <p></p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        @include('shop.settings.tab1')

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Logo & Banner</h1>
                    <p></p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        @include('shop.settings.tab2')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection