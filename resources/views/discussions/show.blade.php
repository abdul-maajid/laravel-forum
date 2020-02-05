@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-3">

                <div class="card-header">
                    <img src="{{ $disc->user->avatar }}" class="img-fluid rounded-circle mr-2" alt="Avatar Missing" style="height: 45px; width: 45px;">
                    <span class="text-center" style="color: darkblue; font-weight: bold">{{ $disc->user->name }}: </span>
                    <small class="text-muted">{{ $disc->created_at->diffForHumans() }}</small>
                </div>
                <div class="card-body">
                    <h4 class="card-title text-center">{{ $disc->title }}</h4>
                    <hr>
                    <p class="card-text text-justify"> {{ $disc->content }} </p>

                </div>

                <div class="card-footer">
                    {{ $disc->replies->count() }} Replies
                    @foreach($disc->replies as $r)
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <img src="{{ $r->user->avatar }}" class="img-fluid rounded-circle" alt="Avatar Missing" style="height: 45px; width: 45px;">
                            <span class="text-center" style="color: darkblue; font-weight: bold">{{ $r->user->name }}: </span>
                            <small class="text-muted">{{ $r->created_at->diffForHumans() }}</small>
                        </div>
                        <div class="card-body">
                            <p class="card-text text-justify"> {{ $r->content }} </p>
                        </div>
                        <div class="card-footer">
                            @if( $r->is_liked_by_auth_user()['isliked'] )
                                <a class="like-btn" href="{{ route('reply.unlike', ['id' => $r->id ]) }}" onclick="disableLink(this)" ><i class="fas fa-heart"></i> UNLIKE <span class="badge badge-primary">{{ $r->is_liked_by_auth_user()['total_likes'] }}</a>
                            @else
                                <a class="like-btn" href="{{ route('reply.like' , ['id' => $r->id ]) }}" onclick="disableLink(this)"><i class="far fa-heart"></i> LIKE <span class="badge badge-primary">{{ $r->is_liked_by_auth_user()['total_likes'] }} </span>
                                </a>
                            @endif
                        </div>
                    </div>
                    @endforeach

                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('discussions.reply', ['id' => $disc->id]) }}" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="reply">Leave a reply...</label>
                                    <textarea name="reply" id="reply" class="form-control" cols="30" rows="5"></textarea>
                                    @error('reply')
                                        <p class="form-text text-muted">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success"><i class="fas fa-send"></i> Send</button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection

<script>
    function disableLink(anchor){
        anchor.classList.add("isDisabled");
    }
</script>