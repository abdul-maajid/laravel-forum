@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @foreach ($discussions as $disc)

                <div class="card mb-3">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-3">
                                <img src="{{ $disc->user->avatar }}" class="img-fluid rounded-circle" alt="Avatar Missing">
                                <div class="text-center mt-2" style="color: darkblue; font-weight: bold">{{ $disc->user->name }}</div>
                                <small class="d-block text-center text-muted">{{ $disc->created_at->diffForHumans() }}</small>
                            </div>

                            <div class="col-md-9">
                                <h4 class="card-title">{{ $disc->title }}</h4>

                                <p class="card-text text-justify"> {{ str_limit($disc->content, 350) }} </p>
                                
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="float-right">
                                    <a name="" id="" class="btn btn-outline-success" href="{{ route('discussions.show', ['slug' => $disc->slug]) }}" role="button">View</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card-footer text-muted">
                        {{ $disc->replies->count() }} Replies
                    </div>                
                </div>
                
            @endforeach

            <div class="d-flex justify-content-center mt-3">
                {{ $discussions->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
