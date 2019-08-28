@extends('layouts.app')

@section('title', 'Products')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Products</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body table-responsive no-padding">
                    
                    <a href="{{ url('shop/products/create') }}" class="btn bg-olive btn-flat btn-margin-10">Create Product</a>
                    
                    @if(!$products->isEmpty())

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th width="35%">Name</th>
                                    <th width="35%">Category</th>
                                    <th width="10%">Price</th>
                                    <th width="10%">Visible</th>
                                    <th width="10%">Actions</th>
                                </tr>

                                @foreach($products as $product)
                                    <tr>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->category->name }}</td>
                                        <td>{{ format_currency($product->price) }}</td>
                                        <td>{{ ($product->status == 1) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a class="btn-xs bg-olive btn" href="{{ URL::to('shop/products/' . $product->id . '/edit') }}">Edit</a>

                                            <button class="btn-xs bg-olive btn btn-delete" data-url="{{ URL::to('shop/products/' . $product->id) }}">Delete</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else

                        <p class="well">No records found!</p>

                    @endif

                </div>
            </div>
        </div>
    </div>
</section>
@endsection