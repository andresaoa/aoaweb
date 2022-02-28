@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    {{ $banner->name ?? 'Show Banner' }}
@stop


@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Banner</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('banners.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Url Left:</strong>
                            {{ $banner->url_left }}
                        </div>
                        <div class="form-group">
                            <strong>Img Left:</strong>
                            {{ $banner->img_left }}
                        </div>
                        <div class="form-group">
                            <strong>Url Right:</strong>
                            {{ $banner->url_right }}
                        </div>
                        <div class="form-group">
                            <strong>Img Right:</strong>
                            {{ $banner->img_right }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
