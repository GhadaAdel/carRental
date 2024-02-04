<header class="site-navbar site-navbar-target" role="banner">

    <div class="container">
      <div class="row align-items-center position-relative">

        <div class="col-3">
          <div class="site-logo">
            <a href="{{ route('index') }}"><strong>CarRental</strong></a>
          </div>
        </div>

        <div class="col-9  text-right">
          
          <span class="d-inline-block d-lg-none"><a href="#" class=" site-menu-toggle js-menu-toggle py-5 "><span class="icon-menu h3 text-black"></span></a></span>


      



          <nav class="site-navigation text-right ml-auto d-none d-lg-block" role="navigation">
            <ul class="site-menu main-menu js-clone-nav ml-auto ">
              <li><a href="{{ route('index') }}" class="nav-item nav-link {{ request()->routeIs('index') ? 'active' : '' }}">Home</a></li>
              <li><a href="{{ route('carList') }}" class="nav-item nav-link {{ request()->routeIs('carList') ? 'active' : '' }}">List</a></li>
              <li><a href="{{ route('WebTestimonials') }}" class="nav-item nav-link {{ request()->routeIs('testimonials') ? 'active' : '' }}">testimonials</a></li>
              <li><a href="{{ route('blog') }}" class="nav-item nav-link {{ request()->routeIs('blog') ? 'active' : '' }}">Blog</a></li>
              <li><a href="{{ route('about') }}" class="nav-item nav-link {{ request()->routeIs('about') ? 'active' : '' }}">About Us</a></li>
              <li><a href="{{ route('contact') }}" class="nav-item nav-link {{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a></li>
            </ul>
          </nav>
          @if (Route::has('login'))
        @auth
            <a href="{{route('home')}}" class="nav-item nav-link ">
                {{ Auth::user()->name }}
            </a>
            <a class="nav-item nav-link " href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
              {{ __('Logout') }}
              </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
                  </form>
        @else
            <a href="{{ route('login') }}" class="nav-item nav-link">
                Join Us<i class="fa fa-arrow-right ms-3"></i>
            </a>
        @endauth
        @endif 
        </div>

        
      </div>
    </div>

  </header>

  <script>
    anchors = Array.from(document.getElementsByClassName("nav-item nav-link"))

    anchors.forEach(function (anchor) {
        if (anchor.href === window.location.href) {
            anchor.className = "nav-item nav-link active"
        } else {
            anchor.className = "nav-item nav-link"
        }
    })

</script>