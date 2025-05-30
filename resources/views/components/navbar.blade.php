<nav class="nav">
  <div class="logo">KosKu</div>
  <ul class="nav-links">
    <li><a href="{{ route('index') }}">Explore</a></li>
    <li><a href="#categories">Categories</a></li>
    <li><a href="{{ route('landing.testimonials') }}">Testimonials</a></li>
  </ul>

  @auth
  <div class="profile-menu">
    <img src="{{ Auth::user()->profile_photo_url ?? asset('images/default-avatar.png') }}" alt="Profile" class="profile-pic">
    <span class="profile-name">{{ Auth::user()->name }}</span>
    <span class="profile-role badge role-{{ Auth::user()->role }}">{{ ucfirst(Auth::user()->role) }}</span>
    <div class="dropdown">
      <button class="dropdown-toggle">▼</button>
      <div class="dropdown-menu">
        <a href="{{ route('profile.show') }}">Profile</a>
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit">Logout</button>
        </form>
      </div>
    </div>
  </div>
  @else
    <a href="{{ route('login.show') }}" class="cta-btn">Masuk</a>
  @endauth
</nav>
