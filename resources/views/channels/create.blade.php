@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Create New Channel</div>

                <div class="card-body">
                    <form action="{{ route('channels.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <input type="text" class="form-control" name="channel" placeholder="Channel" >
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Save Channel
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
