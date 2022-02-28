@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{ $nav->name ?? 'Show Nav' }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Nav</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('navs.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Img Logo:</strong>
                            {{ $nav->img_logo }}
                        </div>
                        <div class="form-group">
                            <strong>Text Logo:</strong>
                            {{ $nav->text_logo }}
                        </div>
                        <div class="form-group">
                            <strong>Item1:</strong>
                            {{ $nav->item1 }}
                        </div>
                        <div class="form-group">
                            <strong>Item2:</strong>
                            {{ $nav->item2 }}
                        </div>
                        <div class="form-group">
                            <strong>Item3:</strong>
                            {{ $nav->item3 }}
                        </div>
                        <div class="form-group">
                            <strong>Item4:</strong>
                            {{ $nav->item4 }}
                        </div>
                        <div class="form-group">
                            <strong>Dashboard:</strong>
                            {{ $nav->dashboard }}
                        </div>
                        <div class="form-group">
                            <strong>Profile:</strong>
                            {{ $nav->profile }}
                        </div>
                        <div class="form-group">
                            <strong>Login:</strong>
                            {{ $nav->login }}
                        </div>
                        <div class="form-group">
                            <strong>Register:</strong>
                            {{ $nav->register }}
                        </div>
                        <div class="form-group">
                            <strong>Logout:</strong>
                            {{ $nav->logout }}
                        </div>
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $nav->color }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
