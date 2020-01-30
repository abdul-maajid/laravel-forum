@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">Create a new Discussion</div>

                <div class="card-body">
                    <form action="{{ route('discussions.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                          <label for="">Title</label>
                          <input type="text" name="title" id="title" class="form-control">
                          @error('title')
                            <small id="helpId" class="text-muted">{{ $message }}</small>
                        @enderror
                        </div>

                        <div class="form-group">
                            <label for="channel">Pick a Channel</label>
                            <select name="channel_id" id="channel" class="form-control">
                                @foreach($channels as $channel)
                                    <option value="{{ $channel->id }}"> {{ $channel->title }} </option>
                                @endforeach
                            </select>

                            @error('channel')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="question">Ask a Question</label>
                            <textarea name="content" id="question" class="form-control" rows="10" placeholder="Write your quesion here..."></textarea>
                            
                            @error('content')
                                <small id="helpId" class="text-muted">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success float-right" type="submit">Create discussion</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
