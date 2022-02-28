@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Nav') }}
                            </span>

                             @if (count($navs)<1)
                             <div class="float-right">
                                <a href="{{ route('navs.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                             @endif
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Img Logo</th>
										<th>Text Logo</th>
										<th>Item1</th>
										<th>Item2</th>
										<th>Item3</th>
										<th>Item4</th>
										<th>Dashboard</th>
										<th>Profile</th>
										<th>Login</th>
										<th>Register</th>
										<th>Logout</th>
										<th>Color</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($navs as $nav)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $nav->img_logo }}</td>
											<td>{{ $nav->text_logo }}</td>
											<td>{{ $nav->item1 }}</td>
											<td>{{ $nav->item2 }}</td>
											<td>{{ $nav->item3 }}</td>
											<td>{{ $nav->item4 }}</td>
											<td>{{ $nav->dashboard }}</td>
											<td>{{ $nav->profile }}</td>
											<td>{{ $nav->login }}</td>
											<td>{{ $nav->register }}</td>
											<td>{{ $nav->logout }}</td>
											<td>{{ $nav->color }}</td>

                                            <td>
                                                <form action="{{ route('navs.destroy',$nav->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('navs.show',$nav->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('navs.edit',$nav->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $navs->links() !!}
            </div>
        </div>
    </div>
@endsection
