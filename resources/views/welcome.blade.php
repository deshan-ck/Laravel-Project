@extends('layouts.frontend')
@section('content')

<div class="container">
<header class="blog-header py-3">
    <div class="container-fluid">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Menu Icon -->
            <button class="btn btn-link text-dark p-0" id="menuToggle">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-list">
                    <path fill-rule="evenodd" d="M3.5 12.5A.5.5 0 0 1 4 12h12a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5zM3.5 6.5A.5.5 0 0 1 4 6h12a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5zM3.5 18.5a.5.5 0 0 1 .5-.5h12a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>

            <!-- Site Title -->
            <a class="blog-header-logo text-dark text-center" href="{{ url('/') }}" style="font-weight: bold; text-decoration: none;">
                <h3>CEYLON TRAVEL</h3>
            </a>

            <!-- Login & Signup Buttons -->
            <div class="d-flex">
            @auth
            <div class="dropdown">
    <button 
        class="btn btn-secondary dropdown-toggle" 
        type="button" 
        id="userMenu" 
        data-bs-toggle="dropdown" 
        aria-expanded="false">
        {{ Auth::user()->name }}
    </button>
    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userMenu">
        <li><a class="dropdown-item" href="{{ route('home') }}">Dashboard</a></li>
        <li><a class="dropdown-item" href="{{ route('posts.store') }}">New Post</a></li>
        <li><a class="dropdown-item" href="{{ route('posts.all') }}">All Posts</a></li>
        <li>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="dropdown-item">Logout</button>
            </form>
        </li>
    </ul>
</div>

@endauth

@guest
        <!-- Logged-Out User Options -->
        <a href="{{ route('login') }}" class="btn btn-primary me-2">Login</a>
        <a href="{{ route('register') }}" class="btn btn-secondary">Sign Up</a>
    @endguest

</div>



        <!-- Hidden Menu -->
        <div id="menu" class="bg-dark text-white position-absolute p-3" style="top: 70px; left: 0; display: none; width: 200px; z-index: 10;">
            <ul class="list-unstyled">
                <li><a class="text-white" href="{{ url('/home') }}">Home</a></li>
                <li><a class="text-white" href="#about">About</a></li>
                <li><a class="text-white" href="#services">Services</a></li>
                <li><a class="text-white" href="#contact">Contact</a></li>
            </ul>
        </div>
    </div>
</header>


<div 
  class="jumbotron p-3 p-md-5 text-white rounded bg-dark"
  style="background: url('https://media.istockphoto.com/id/1175514640/photo/sigiriya.jpg?b=1&s=612x612&w=0&k=20&c=QshF8ACzB3yq8vm2lTXuakNydi3yTUd_ggNpfJ6Fjk0=') no-repeat center center; background-size: cover;">
  <div class="col-md-6 px-0"  padding: 20px; border-radius: 10px;>
    <h2 class="display-5 font-italic">Let's Discover Sri Lanka</h2>
    <p class="lead my-4">Discover the secrets to success and embrace the journey ahead with confidence and purpose.</p>
    <p class="lead mb-0"><a href="#" class="text-white font-weight-bold">Learn more &rarr;</a></p>
  </div>
</div>
<div class="container mt-4">
  <div class="row">
    @foreach($posts as $Post)
      <div class="col-md-6 col-lg-4 mb-4">
        <div class="card shadow-sm border-0 h-100">
          <img src="{{ asset('thumbnails/' . $Post->thumbnail) }}" class="card-img-top img-fluid" alt="Post Thumbnail" style="object-fit: cover; height: 200px;">
          <div class="card-body d-flex flex-column">
            <h5 class="card-title text-truncate">{{$Post->title}}</h5>
            <p class="card-text text-muted small mb-2">{{ date('Y-m-d', strtotime($Post->created_at)) }}</p>
            <p class="card-text text-truncate">{{ Str::limit($Post->description, 80) }}</p>
            <a href="{{ route('posts.show', $Post->id) }}" class="btn btn-primary mt-auto align-self-start">
              Read More
            </a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
</div>

    </div>

    <footer class="bg-dark text-white py-4">
  <div class="container">
    <div class="row">
      <!-- Logo and About -->
      <div class="col-md-4 mb-3">
        <h5>CEYLON TRAVEL</h5>
        <p>Discover the beauty and secrets of Sri Lanka. Embrace the journey ahead with confidence and purpose.</p>
      </div>

      <!-- Quick Links -->
      <div class="col-md-4 mb-3">
        <h5>Quick Links</h5>
        <ul class="list-unstyled">
          <li><a href="#" class="text-white text-decoration-none">Home</a></li>
          <li><a href="#" class="text-white text-decoration-none">About</a></li>
          <li><a href="#" class="text-white text-decoration-none">Blog</a></li>
          <li><a href="#" class="text-white text-decoration-none">Contact</a></li>
        </ul>
      </div>

      <!-- Social Media -->
      <div class="col-md-4 mb-3">
        <h5>Follow Us</h5>
        <div>
          <a href="#" class="text-white text-decoration-none me-3">
            <i class="fab fa-facebook fa-lg"></i>
          </a>
          <a href="#" class="text-white text-decoration-none me-3">
            <i class="fab fa-twitter fa-lg"></i>
          </a>
          <a href="#" class="text-white text-decoration-none me-3">
            <i class="fab fa-instagram fa-lg"></i>
          </a>
          <a href="#" class="text-white text-decoration-none">
            <i class="fab fa-linkedin fa-lg"></i>
          </a>
        </div>
      </div>
    </div>

    <hr class="bg-white">

    <div class="text-center small">
      &copy; {{ date('Y') }} CEYLON TRAVEL. All Rights Reserved.
    </div>
  </div>
</footer>


@endsection