@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><h3>Channels</h3></div>

                <div class="card-body">
                    <table class="table table-hover">
                        <thead>
                            <th>Name</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </thead>

                        <tbody>
                            @foreach($channels as $channel)
                                <tr>
                                    <td>{{ $channel->title }}</td>
                                    <td>
                                        <a href="{{ route('channels.edit', ['channel' => $channel->id]) }}" class="btn btn-sm btn-info">Edit</a>
                                    </td>
                                    <td>
                                        <form action="{{ route('channels.destroy', ['channel' => $channel->id]) }}" method="POST">
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure to delete?') ">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
