<x-layout>
<div class="container">
<div class="row">
    <div class="col-md-5 mx-auto">
        <div class="card p-4 my-3 shadow-sm">
        <h3 class="text-primary text-center">Login Form</h3>
        <form method="POST" action="/login">
        @csrf
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input required name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{old('email')}}" >
    @error('email')
  <p>{{$message}}</p>
  @enderror
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input name="password" type="password" class="form-control" id="exampleInputPassword1" aria-describedby="emailHelp" placeholder="Password" value="{{old('password')}}" >
    @error('password')
  <p>{{$message}}</p>
  @enderror
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
  <ul>
    @foreach($errors->all() as $err)
    <li class="text-danger">{{$err}}</li>
    @endforeach
  </ul>
</form>
        </div>
    </div>
</div>
</div>

</x-layout>