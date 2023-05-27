@props(['blog'])
<x-card-wrapper class="bg-info">
          <form action="/blogs/{{$blog->slug}}/comments" method="POST">
          @csrf
  <div class="form-group">
    <textarea name="body" id="" cols="10" rows="5" class="form-control border border-0" placeholder="say something here..."></textarea>
    <div class="d-flex justify-content-end">
    <button type="submit" class="btn btn-primary">Submit
    </button>
    <!-- @error('body')
    <p class="text-danger">{{$message}}</p>
    @enderror -->
    
    <x-error name="body" />
    </div>
</form>
</x-card-wrapper >