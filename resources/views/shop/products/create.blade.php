@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Create Product</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-danger">
                <div class="box-body">

                    <div class="row">
                        <div class="col-md-6">
                            <form role="form" action="/shop/products" method="POST">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group{{ $errors->has('category_id') ? ' has-error' : '' }}">
                                            <label for="category_id">Category</label>
                                            <select name="category_id" id="category_id" class="form-control">
                                                @foreach($categories as $category)
                                                    <option value="{{ $category->id }}" {{ old('category_id') }}>{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                            
                                            @if ($errors->has('category_id'))
                                                <span class="help-block">
                                                    {{ $errors->first('category_id') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
                                            
                                            @if ($errors->has('name'))
                                                <span class="help-block">
                                                    {{ $errors->first('name') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                            <label for="description">Description</label>
                                            <textarea name="description" id="description" value="" class="form-control" rows="5">{{ old('description') }}</textarea>

                                            @if ($errors->has('description'))
                                                <span class="help-block">
                                                    {{ $errors->first('description') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('price') ? ' has-error' : '' }}">
                                            <label for="price">Price</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ old('price') }}" name="price" id="price">
                                                <span class="input-group-addon">USD</span>
                                            </div>

                                            @if ($errors->has('price'))
                                                <span class="help-block">
                                                    {{ $errors->first('price') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('price_discount') ? ' has-error' : '' }}">
                                            <label for="price_discount">Discount Price</label>

                                            <div class="input-group">
                                                <input type="text" class="form-control" value="{{ old('price_discount') }}" name="price_discount" id="price_discount">
                                                <span class="input-group-addon">USD</span>
                                            </div>

                                            @if ($errors->has('price_discount'))
                                                <span class="help-block">
                                                    {{ $errors->first('price_discount') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                                            <label for="status">Status</label>
                                            <select name="status" id="status" class="form-control">
                                                <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            
                                            @if ($errors->has('status'))
                                                <span class="help-block">
                                                    {{ $errors->first('status') }}
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="image" value="" id="image">

                                <button type="submit" id="btn-save" class="btn bg-olive btn-flat">&nbsp;&nbsp; Save &nbsp;&nbsp;</button>
                            </form>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="image">Image</label>

                                <img src="{{ asset('img/default.png') }}" id="image-url" style="display: block; width: 250px; height: 250px;">

                                <span class="btn bg-olive btn-sm fileinput-button">
                                    <i class="glyphicon glyphicon-plus"></i>
                                    <span>Upload</span>
                                    <input id="fileupload" type="file" name="file" data-url="/shop/products/upload">
                                </span>
                            </div>
                            <div id="progress_upload">
                                <div class="bar" style="width: 0%;"></div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection