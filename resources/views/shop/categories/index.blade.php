@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Categories</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body table-responsive no-padding">
                    
                    <a href="{{ url('shop/categories/create') }}" class="btn bg-olive btn-flat btn-margin-10">Create Category</a>

                    @if(!$categories->isEmpty())

                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th width="20%">Name</th>
                                    <th width="60%">Description</th>
                                    <th width="10%">Visible</th>
                                    <th width="10%">Actions</th>
                                </tr>

                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->description }}</td>
                                        <td>{{ ($category->status == 1) ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a class="btn-xs bg-olive btn" href="{{ URL::to('shop/categories/' . $category->id . '/edit') }}">Edit</a>

                                            <button class="btn-xs bg-olive btn btn-delete" data-url="{{ URL::to('shop/categories/' . $category->id) }}">Delete</button>
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