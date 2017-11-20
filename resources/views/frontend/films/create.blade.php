@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="panel panel-default">
                    <div class="panel-heading">Create New Film</div>
                    <div class="panel-body">
                        <a href="{{ url('/films') }}" title="Back"><button class="btn btn-warning btn-xs"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />

                        {!! Form::open(['route' => ['films.store'],  'files' => true])  !!}

                            @include ('frontend.films.form')

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
