@props(['comments'])
<section>
      <div class="col-md-8 mx-auto">
          
      <h5 class="my-3 text-secondary">Comments -{{$comments->count()}}</h5>
        
        <!-- single comment card -->
        @foreach($comments as $comment)
        <x-single-comment :comment="$comment" />
        @endforeach
        {{$comments->links()}}
      </div>
    </section>