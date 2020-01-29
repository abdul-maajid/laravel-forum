@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Update Channel: {{ $channel->title }}</div>

                <div class="card-body">
                    <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <input type="text" class="form-control" name="channel" placeholder="Channel" value="{{ $channel->title }}" >
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Update Channel
                                </button>
                            </div>
                        </div>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
