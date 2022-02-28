@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Nav</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('navs.update', $nav->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('nav.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
