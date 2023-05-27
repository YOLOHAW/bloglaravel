@props(['randomBlogs'])
<section class="blogs_you_may_like">
      <div class="container">
        <h3 class="text-center my-4 fw-bold">Blogs You May Like</h3>
        <div class="row text-center">
          <div class="col-md-4 mb-4">
            @foreach($randomBlogs as $blog)
            <x-blog-card :blog="$blog"/>
            @endforeach
          </div>
         
        </div>
      </div>
    </section>