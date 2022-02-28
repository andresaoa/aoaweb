@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
{{ $marquee->name ?? 'Show Marquee' }}
@stop

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Marquee</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('marquees.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Color:</strong>
                            {{ $marquee->color }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
