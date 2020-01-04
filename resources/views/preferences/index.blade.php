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
    <div class="row">
        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Color</th>
                <th width="280px">Pet</th>
            </tr>

            @foreach ($preferences as $preference)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $preference->name }}</td>
                <td>{{ $preference->color_id }}</td>
                <td>{{ $preference->pet_id }}</td>
                <td>
                    <form action="{{ route('preferences.destroy',$preference->id) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('preferences.show',$preference->id) }}">Show</a>
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