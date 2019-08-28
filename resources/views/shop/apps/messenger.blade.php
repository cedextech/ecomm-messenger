@extends('layouts.app')

@section('title', 'Messenger')

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-4">
                <section class="content-header">
                    <h1>Facebook Messenger</h1>
                    <p>Connect the chatbot to your Facebook page.</p>
                </section>
            </div>

            <div class="col-md-8">
                <div class="box box box-danger">
                    <div class="box-body">

                        @if($facebookPages->isEmpty())
                            <a href="/shop/apps/facebook/redirect" class="btn bg-olive btn-flat">Connect Facebook</a>
                        @endif

                        @if(!$shop->facebook_page_id)

                            <table class="table">
                                @foreach($facebookPages as $page)
                                    <tr>
                                        <td>
                                            <strong>
                                                <a href="https://www.facebook.com/{{ $page->page_id }}" target="_blank">{{ $page->name }}</a>
                                            </strong>
                                        </td>
                                        <td>
                                            <form role="form" action="/shop/apps/messenger" method="POST">
                                                {{ csrf_field() }} {{ method_field('PUT') }}
                                                <input type="hidden" name="facebook_page_id" value="{{ $page->page_id }}">
                                                <button type="submit" class="btn bg-olive btn-sm">Connect</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>

                        @else

                            <p>
                                Connected to 
                                <strong><a href="https://www.facebook.com/{{ $connectedPage[0]->page_id }}" target="_blank">{{ $connectedPage[0]->name }}</a></strong>
                            </p>

                            <form role="form" action="/shop/apps/messenger/disconnect" method="POST">
                                {{ csrf_field() }} {{ method_field('PUT') }}
                                <button type="submit" class="btn bg-olive btn-sm">Disconnect</button>
                            </form>

                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection