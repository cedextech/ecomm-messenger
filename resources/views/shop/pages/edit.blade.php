@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Edit Page</h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-danger">
                    <div class="box-body">
                        <form role="form" method="POST" action="{{ url('shop/pages/' . $page->pivot->id) }}">
                            {{ csrf_field() }}
                            {{ method_field('PUT') }}

                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $page->pivot->title) }}">

                                        @if ($errors->has('title'))
                                            <span class="help-block">
                                                {{ $errors->first('title') }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="form-group {{ $errors->has('content') ? ' has-error' : '' }}">
                                <label for="name">Content</label>
                                <textarea name="content" id="content" rows="10" class="form-control">{{ old('content', $page->pivot->content) }}</textarea>

                                @if ($errors->has('content'))
                                    <span class="help-block">
                                        {{ $errors->first('content') }}
                                    </span>
                                @endif
                            </div>

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection