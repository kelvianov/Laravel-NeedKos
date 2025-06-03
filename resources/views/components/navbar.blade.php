<nav class="nav-modern">
    <div class="nav-container">
        <!-- Logo -->
        <a href="{{ url('/') }}" class="nav-logo">
            <span class="logo-text">KosKu</span>
        </a>

        <!-- Menu -->
        <ul class="nav-menu">
            <li><a href="{{ route('index') }}" class="nav-link">Explore</a></li>
            <li><a href="#properties" class="nav-link">Daftar</a></li>
            <li><a href="{{ route('landing.testimonials') }}" class="nav-link">Reviews</a></li>
        </ul>

        <!-- Right Side (auth / non-auth) -->
        <div class="nav-end">
            @auth
                <div class="nav-profile">
                    <div class="profile-wrapper">
                        <img src="{{ Auth::user()->avatar ? asset('storage/avatars/' . Auth::user()->avatar) : asset('images/default-avatar.png') }}" 
                             alt="Profile" 
                             class="profile-image">
                        <span class="profile-name">{{ Auth::user()->name }}</span>
                        <i class="fas fa-chevron-down"></i>
                    </div>

                    <div class="profile-dropdown">
                        <a href="{{ route('profile.show') }}" class="dropdown-item">
                            <i class="fas fa-user"></i> Profile
                        </a>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-bookmark"></i> Saved
                        </a>
                        <div class="dropdown-divider"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">
                                <i class="fas fa-sign-out-alt"></i> Logout
                            </button>
                        </form>
                    </div>
                </div>
            @else
                <div class="nav-auth">
                    <a href="{{ route('login.show') }}" class="login-btn">Sign In</a>
                    <a href="{{ route('register.show') }}" class="register-btn">Register</a>
                </div>
            @endauth
        </div>
    </div>
</nav>

<style>
.nav-modern {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    z-index: 1000;
    background: #fff;
    padding: 1rem 0;
    box-shadow: 0 1px 0 rgba(0,0,0,0.08);
}

.nav-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.nav-logo {
    text-decoration: none;
}

.logo-text {
    font-size: 1.5rem;
    font-weight: 700;
    color: #222;
    letter-spacing: -0.5px;
}

.nav-menu {
    display: flex;
    align-items: center;
    gap: 2rem;
    margin: 0;
    padding: 0;
    list-style: none;
    margin-left: 10rem;
}

.nav-link {
    color: #555;
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.5rem 0;
    transition: color 0.2s;
}

.nav-link:hover {
    color: #000;
}

/* --- Right Side: Profile / Auth --- */
.nav-end {
    display: flex;
    align-items: center;
    justify-content: flex-end;
    min-width: 250px; /* ✅ kunci untuk stabil */
}

.nav-profile {
    position: relative;
}

.profile-wrapper {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.5rem;
    cursor: pointer;
    border: 1px solid #eee;
    border-radius: 100px;
    transition: all 0.2s;
}

.profile-wrapper:hover {
    background: #f8f8f8;
}

.profile-image {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    object-fit: cover;
}

.profile-name {
    color: #333;
    font-weight: 500;
    font-size: 0.9rem;
}

.profile-wrapper i {
    color: #666;
    font-size: 0.8rem;
}

.profile-dropdown {
    position: absolute;
    top: 100%;
    right: 0;
    margin-top: 0.75rem;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,0.12);
    min-width: 220px;
    opacity: 0;
    visibility: hidden;
    transform: translateY(10px);
    transition: all 0.3s ease;
    border: 1px solid #eee;
    padding: 0.5rem;
    z-index: 10;
}

.profile-dropdown::before {
    content: '';
    position: absolute;
    top: -6px;
    right: 24px;
    width: 12px;
    height: 12px;
    background: #fff;
    border-left: 1px solid #eee;
    border-top: 1px solid #eee;
    transform: rotate(45deg);
}

.profile-wrapper:hover + .profile-dropdown,
.profile-dropdown:hover {
    opacity: 1;
    visibility: visible;
    transform: translateY(0);
}

.dropdown-item {
    display: flex;
    align-items: center;
    gap: 0.75rem;
    padding: 0.875rem 1rem;
    color: #333;
    text-decoration: none;
    font-size: 0.9rem;
    transition: all 0.2s;
    border-radius: 8px;
    margin: 0.125rem 0;
}

.dropdown-item i {
    font-size: 1rem;
    color: #666;
    width: 20px;
    text-align: center;
}

.dropdown-item:hover {
    background: #f8f9fa;
    color: #000;
}

.dropdown-item:hover i {
    color: #222;
}

button.dropdown-item {
    width: 100%;
    border: none;
    background: none;
    cursor: pointer;
    font-family: inherit;
}

.dropdown-divider {
    height: 1px;
    background: #eee;
    margin: 0.5rem;
}

.nav-auth {
    display: flex;
    align-items: center;
    gap: 1rem;
}

.login-btn, .register-btn {
    text-decoration: none;
    font-weight: 500;
    font-size: 0.95rem;
    padding: 0.6rem 1.25rem;
    border-radius: 100px;
    transition: all 0.2s;
}

.login-btn {
    color: #555;
}

.login-btn:hover {
    color: #000;
}

.register-btn {
    color: #fff;
    background: #222;
}

.register-btn:hover {
    background: #000;
}

/* Mobile */
@media (max-width: 768px) {
    .nav-menu {
        display: none;
    }
}
</style>
