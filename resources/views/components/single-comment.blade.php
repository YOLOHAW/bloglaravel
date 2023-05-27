@props(['comment'])
<div class="card d-flex p-3 my-3 shadow-sm">
          <div class="d-flex">
            <div>
              <img src="{{$comment->author->profile}}" width="70" height="70" class="rounded-circle" alt="" alt="">
            </div>
            <div class="ms-3">
              <h6>{{$comment->author->name}}</h6>
              <p class="text-secondary">{{$comment->created_at->format('l jS \of F Y h:i:s A')}}</p>
            </div>
          </div>
          <p class="mt-1">
          {{$comment->body}}
          </p>
        </div>