@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Film Detail # {{ $film->id }}</div>
                    <div class="panel-body">

                        <a href="{{ url('/films') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th>ID</th><td>{{ $film->id }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name</th><td>{{ $film->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Description</th><td>{{ $film->description }}</td>
                                    </tr>
                                    <tr>
                                        <th>Release Date</th><td>{{ $film->release_date }}</td>
                                    </tr>
                                    <tr>
                                        <th>Rating</th><td>{{ $film->rating }} / 5</td>
                                    </tr>
                                    <tr>
                                        <th>Ticket Price</th><td>$ {{ $film->ticket_price }}</td>
                                    </tr>
                                    <tr>
                                        <th>Country</th><td>{{ $film->country }}</td>
                                    </tr>
                                    <tr>
                                        <th>Genres</th><td>{{ $film->genres }}</td>
                                    </tr>
                                    <tr>
                                        <th>photo</th><td><img src="{{ !empty($film->photo) ? url('img/frontend/films/'.$film->photo) : url('img/frontend/films/placeholder-image.png') }}" height="200" width="200" /></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

            {{-- Comments Management in Detail view of a Film --}}
            @include('frontend.films.comments.comments', [$film])

        </div>
    </div>
@endsection
