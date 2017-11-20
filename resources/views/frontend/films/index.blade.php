@extends('frontend.layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Add New Film</div>
                    <div class="panel-body">
                        <a href="{{ url('/films/create') }}" class="btn btn-success btn-sm" title="Add New Film">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New
                        </a>

                        <br/>
                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Release Date</th>
                                        <th>Rating</th>
                                        <th>Ticket Price</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($films as $film)
                                    <tr>
                                        <td>{{ $film->id }}</td>
                                        <td>{{ $film->name }}</td>
                                        <td>{{ $film->release_date }}</td>
                                        <td>{{ $film->rating }}</td>
                                        <td>{{ $film->ticket_price }}</td>
                                        <td>
                                            <a href="{{ url('films/' . $film->slug ) }}" title="View Film"><button class="btn btn-info btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            {{ $films->links() }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
