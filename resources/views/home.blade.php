@extends('layouts.app')

@section('content')
{{-- <div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="container">

    <!-- Main component for a primary marketing message or call to action -->
    <div class="jumbotron">
        <h1>This is EXAM of Carnage Heart.</h1>
        <p>
            <a class="btn btn-success" href="{{ url('/exam?target=beginner') }}" role="button">Go to exam for beginer.</a>
        </p>
        <p>
            <a class="btn btn-primary disabled" href="{{ url('/exam?target=intermediate') }}" role="button">Go to exam for intermediate.</a>
        </p>
        <p>
            <a class="btn btn-danger disabled" href="{{ url('/exam?target=senior') }}" role="button">Go to exam for senior.</a>
        </p>
    </div>
</div> <!-- /container -->
@endsection
