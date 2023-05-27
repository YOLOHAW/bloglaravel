<x-admin-layout>
    <h3 class="my-3 text-center">Blog Edit Form</h3>
       <x-card-wrapper>
        <form action="/admin/blogs/{{$blog->slug}}/update" method="POST" enctype="multipart/form-data">
        @method('patch')
        @csrf
  <x-form.input name="title" value="{{$blog->title}}" />
  <x-form.slug name="slug" value="{{$blog->slug}}"/>
  <x-form.intro name="intro" value="{{$blog->intro}}"/>
  
  <x-form.textarea name="body" value="{{$blog->body}}"/>

  <x-form.input name="thumbnail" type="file" />

  <img src="/storage/{{$blog->thumbnail}}" width="100" height="100" alt="" srcset="">

  <x-form.input-wrapper>
    <label for="category_id">Category</label>
    <select class="form-control" name="category_id" id="category_id">
        @foreach($categories as $category)
        <option {{$category->id == old('category_id',$blog->category->id) ? 'selected' : ''}} value="{{$category->id}}">
            {{$category->name}}
        </option>
        @endforeach
    </select>
  
    @error('category_id')
    <p class="text-danger">{{$$message}}</p>
    @enderror
    </x-form-input-wrapper>

  <div class="d-flex justify-content-start mt-3">
  <button type="submit" class="btn btn-primary">Submit</button>
  </div>
        </form>
        </x-card-wrapper>
    
</x-admin-layout>