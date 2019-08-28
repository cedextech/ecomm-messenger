@extends('layouts.app')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>SEO</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        @include('shop.settings.seo.tab1')

                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Social Media Links</h1>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">
                        
                        @include('shop.settings.seo.tab2')

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection