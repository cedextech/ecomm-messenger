@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Pages</h1>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box box-danger">
                <div class="box-body table-responsive no-padding">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th width="20%">Name</th>
                                <th>Title</th>
                                <th width="10%">Action</th>
                            </tr>

                            @foreach($pages as $page)
                                <tr>
                                    <td>{{ $page->name }}</td>
                                    <td>{{ $page->pivot->title }}</td>
                                    <td>
                                        <a class="btn-xs bg-olive btn" href="{{ URL::to('shop/pages/' . $page->pivot->id . '/edit') }}">Edit</a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection