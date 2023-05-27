<x-layout>

    <!-- singloe blog section -->
    <div class="container">
      <div class="row">
        <div class="col-md-6 mx-auto text-center">
          <img
            src="/storage/{{$blog->thumbnail}}"
            class="card-img-top"
            alt="..."
          />
          <h3 class="my-3">{{$blog->title}}</h3>
          <div>
            <div><a href="/?username={{$blog->author->username}}">{{$blog->author->name}}</a></div>
            <div class="badge bg-primary"><a href="/?category={{$blog->category->slug}}">{{$blog->category->name}}</a></div>
            <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>
            <div class="text-secondary">
              <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
              @csrf
              @auth
              @if(auth()->user()->isSubscribed($blog))
              <button class="btn btn-danger">Unsubscribe</button>
              @else
              <button class="btn btn-warning">Subscribe</button>
              @endif
              @endauth
              </form>
            </div>
          </div>
          <p class="lh-md mt-3">
           {!!$blog->body!!}
          </p>
        </div>
      </div>
    </div> 

    <section class="container">
          <div class="col-md-8 mx-auto">
          
        @auth
         <x-comment-form :blog="$blog" />

        @else
        <p>Please <a href="/login">Login</a> to participate in this discussion</p>
        @endauth
          </div>
        </section>

    @if($blog->comments->count())
    <!-- comment Section  -->

    <x-comments :comments="$blog->comments()->latest()->paginate(3)"/>
    @endif
    <!-- subscribe new blogs -->
    <x-subscribe />

    <x-blog-you-may-like-section :randomBlogs="$randomBlogs" />
  
  
</x-layout>