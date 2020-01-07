@extends('preferences.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Hola mundo</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('preferences.create') }}"> Create New preference</a>
            </div>
        </div>
    </div>
@endsection