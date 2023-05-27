
<nav class="navbar navbar-dark bg-dark">
      <div class="container">
        <a class="navbar-brand" href="/">Creative Coder</a>
        <div class="d-flex">
          <a href="/" class="nav-link">Home</a>
          <a href="/#blogs" class="nav-link">Blogs</a>

          @guest
          <a href="/register" class="nav-link">Register</a>
          <a href="/login" class="nav-link">LogIn</a>
          @else
          @can('admin')
          <a href="/admin/blogs" class="nav-link btn btn-link">Dashboard</a>
          @endcan
          <img src="{{auth()->user()->profile}}" class="rounded-circle" width="50" height="50" alt="">
          <a href="/" class="nav-link btn btn-link">Welcome, {{auth()->user()->name}}</a>
          <form action="/logout" method="POST">
          @csrf
          <button class="nav-link btn btn-link" type="submit">Logout</button>
          </form>
          @endguest
          <a href="#subscribe" class="nav-link">Subscribe</a>
        </div>
      </div>
    </nav>
