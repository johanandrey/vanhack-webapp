@extends('preferences.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Preferences list</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('preferences.create') }}"> Create new</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div>
        <table class="table table-bordered">
            <tr>
                <th>id</th>
                <th>Name</h>
                <th>Favorite Pet</th>
                <th>Favorite Color</th>
                <th width="190px">Actions</th>
            </tr>

            @foreach ($preferences as $preference)
            <tr>
                <td>{{ $preference->id }}</td>
                <td>{{ $preference->name }}</td>
                <td>{{ $preference->pet->pet }}</td>
                <td>{{ $preference->color->color }}</td>
                <td>
                    <form action="{{ route('preferences.destroy',$preference->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('preferences.edit',$preference->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    {!! $preferences->links() !!}
@endsection