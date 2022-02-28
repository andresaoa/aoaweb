@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{ $carousel->name ?? 'Show Carousel' }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Carousel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('carousels.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Name:</strong>
                            {{ $carousel->name }}
                        </div>
                        <div class="form-group">
                            <strong>Img:</strong>
                            {{ $carousel->img }}
                        </div>
                        <div class="form-group">
                            <strong>Selected:</strong>
                            {{ $carousel->selected }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
