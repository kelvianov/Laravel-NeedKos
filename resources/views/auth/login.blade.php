<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>Login - KosKu</title>
<style>
  /* Reset & Basic */
  * {
    box-sizing: border-box;
  }
  body {
    margin: 0;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background: linear-gradient(45deg, #764ba2, #667eea, #5a3577, #764ba2);
    background-size: 400% 400%;
    animation: gradientFlow 8s ease infinite;
    height: 100vh;
    display: flex;
    flex-direction: column;
    position: relative;
    overflow: hidden;
  }
  
  /* Animated geometric shapes */
  body::before {
    content: '';
    position: fixed;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: 
      radial-gradient(circle at 20% 20%, rgba(255,255,255,0.15) 0%, transparent 30%),
      radial-gradient(circle at 80% 80%, rgba(102,126,234,0.2) 0%, transparent 40%),
      radial-gradient(circle at 60% 40%, rgba(118,75,162,0.1) 0%, transparent 35%);
    animation: floatAndRotate 15s ease-in-out infinite;
    pointer-events: none;
    z-index: 1;
  }
  
  body::after {
    content: '';
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.05'%3E%3Ccircle cx='30' cy='30' r='2'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
    animation: patternMove 20s linear infinite;
    pointer-events: none;
    z-index: 1;
  }
  
  @keyframes gradientFlow {
    0%, 100% { background-position: 0% 50%; }
    25% { background-position: 100% 50%; }
    50% { background-position: 50% 100%; }
    75% { background-position: 0% 0%; }
  }
  
  @keyframes floatAndRotate {
    0%, 100% { transform: translateY(0px) rotate(0deg) scale(1); }
    33% { transform: translateY(-40px) rotate(120deg) scale(1.1); }
    66% { transform: translateY(20px) rotate(240deg) scale(0.9); }
  }
  
  @keyframes patternMove {
    0% { transform: translateX(0) translateY(0); }
    100% { transform: translateX(60px) translateY(60px); }
  }
  
  header, footer {
    flex-shrink: 0;
  }
  main {
    flex-grow: 1;
    display: flex;
    justify-content: center;
    align-items: center;
    padding: 15px;
    position: relative;
    z-index: 2;
  }

  /* Container kotak */
  .container {
    display: flex;
    width: 95vw;
    max-width: 900px;
    height: 85vh;
    max-height: 600px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(25px);
    border-radius: 25px;
    box-shadow: 
      0 30px 80px rgba(0,0,0,0.2),
      0 15px 35px rgba(118, 75, 162, 0.15),
      inset 0 2px 0 rgba(255,255,255,0.3),
      inset 0 -2px 0 rgba(0,0,0,0.1);
    overflow: hidden;
    animation: containerEntrance 1.2s cubic-bezier(0.34, 1.56, 0.64, 1);
    border: 1px solid rgba(255,255,255,0.3);
    position: relative;
  }
  
  .container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(255,255,255,0.1), rgba(255,255,255,0.05));
    pointer-events: none;
    z-index: 1;
  }
  
  @keyframes containerEntrance {
    0% {
      opacity: 0;
      transform: scale(0.8) translateY(50px) rotateX(15deg);
    }
    60% {
      transform: scale(1.05) translateY(-10px) rotateX(-5deg);
    }
    100% {
      opacity: 1;
      transform: scale(1) translateY(0) rotateX(0);
    }
  }

  /* Welcome Card kiri */
  .welcome-card {
    flex: 1;
    background: linear-gradient(135deg, 0%, #764ba2 30%, #667eea 70%, #5a3577 100%);
    background-size: 300% 300%;
    animation: epicGradient 1s ease infinite;
    color: white;
    padding: 40px 35px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    position: relative;
    overflow: hidden;
    z-index: 2;
  }
  
  .welcome-card::before {
    content: '';
    position: absolute;
    top: -100%;
    left: -100%;
    width: 300%;
    height: 300%;
    background: 
      conic-gradient(from 0deg, transparent, rgba(255,255,255,0.1), transparent),
      radial-gradient(circle at 30% 70%, rgba(255,255,255,0.2) 0%, transparent 50%);
    animation: magicRotate 12s linear infinite;
    z-index: -1;
  }
  
  .welcome-card::after {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(255,255,255,0.1) 50%, transparent 70%);
    animation: shimmer 3s ease-in-out infinite;
    z-index: -1;
  }
  
  @keyframes epicGradient {
    0%, 100% { background-position: 0% 50%; }
    33% { background-position: 100% 100%; }
    66% { background-position: 50% 0%; }
  }
  
  @keyframes magicRotate {
    0% { transform: rotate(0deg) scale(1); }
    50% { transform: rotate(180deg) scale(1.2); }
    100% { transform: rotate(360deg) scale(1); }
  }
  
  @keyframes shimmer {
    0%, 100% { transform: translateX(-100%) skewX(-15deg); }
    50% { transform: translateX(200%) skewX(-15deg); }
  }
  
  .welcome-card h1 {
    font-size: 2.4rem;
    margin-bottom: 15px;
    position: relative;
    z-index: 3;
    text-shadow: 
      2px 2px 4px rgba(0,0,0,0.5),
    
    animation: textPulse 4s ease-in-out infinite;
    background: linear-gradient(45deg, #ffffff, #f0f8ff, #ffffff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    background-size: 200% 200%;
    animation: textPulse 4s ease-in-out infinite, textGradient 3s ease infinite;
  }
  
  @keyframes textPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
  }
  
  @keyframes textGradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }
  
  .welcome-card p {
    font-size: 1rem;
    line-height: 1.4;
    position: relative;
    z-index: 3;
    opacity: 0;
    animation: fadeInUp 1.5s ease-out 0.8s forwards;
    text-shadow: 1px 1px 2px rgba(0,0,0,0.3);
  }
  
  .welcome-card .icon {
    font-size: 3.5rem;
    margin-bottom: 25px;
    position: relative;
    z-index: 3;
    animation: iconDance 3s ease-in-out infinite;
    filter: drop-shadow(0 8px 16px rgba(0,0,0,0.4));
    background: linear-gradient(45deg, #ffffff, #e6f3ff);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  
  @keyframes iconDance {
    0%, 100% { transform: translateY(0) rotate(0deg) scale(1); }
    25% { transform: translateY(-8px) rotate(-5deg) scale(1.1); }
    50% { transform: translateY(-12px) rotate(0deg) scale(1.15); }
    75% { transform: translateY(-6px) rotate(5deg) scale(1.05); }
  }
  
  @keyframes fadeInUp {
    from {
      opacity: 0;
      transform: translateY(30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }

  /* Form sisi kanan */
  .auth-box {
    flex: 1;
    padding: 35px 30px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background: rgba(255,255,255,0.95);
    backdrop-filter: blur(20px);
    position: relative;
    z-index: 2;
  }
  
  .auth-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(118,75,162,0.02) 0%, rgba(102,126,234,0.02) 100%);
    pointer-events: none;
  }
  
  .auth-box h2 {
    margin-bottom: 20px;
    font-weight: 700;
    text-align: center;
    background: linear-gradient(135deg, #4b0082, #764ba2, #667eea);
    background-size: 200% 200%;
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
    animation: fadeInDown 1s ease-out 0.5s both, headerGradient 3s ease infinite;
    font-size: 1.8rem;
    text-shadow: 0 0 20px rgba(118,75,162,0.3);
  }
  
  @keyframes headerGradient {
    0%, 100% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
  }
  
  @keyframes fadeInDown {
    from {
      opacity: 0;
      transform: translateY(-30px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  form {
    text-align: left;
    animation: fadeInUp 1s ease-out 0.7s both;
  }
  
  label {
    display: block;
    font-weight: 600;
    margin-bottom: 6px;
    color: #555;
    transition: all 0.3s ease;
    font-size: 0.9rem;
  }
  
  input[type="email"],
  input[type="password"] {
    width: 100%;
    padding: 10px 12px;
    border-radius: 15px;
    border: 2px solid rgba(118,75,162,0.2);
    margin-bottom: 15px;
    font-size: 14px;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    background: linear-gradient(145deg, #ffffff, #f8fafc);
    box-shadow: 
      inset 3px 3px 8px rgba(118,75,162,0.1),
      inset -3px -3px 8px rgba(255,255,255,0.8);
    position: relative;
  }
  
  input[type="email"]:focus,
  input[type="password"]:focus {
    outline: none;
    border-color: #764ba2;
    box-shadow: 
      0 0 0 4px rgba(118, 75, 162, 0.15),
      0 0 30px rgba(118, 75, 162, 0.2),
      inset 3px 3px 8px rgba(118,75,162,0.15),
      inset -3px -3px 8px rgba(255,255,255,0.9);
    transform: translateY(-3px) scale(1.02);
    background: linear-gradient(145deg, #ffffff, #fafbfc);
  }
  
  .remember-forgot {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 25px;
    font-size: 13px;
    color: #666;
  }
  
  .remember-forgot label {
    font-weight: normal;
    user-select: none;
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 0;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  .remember-forgot label:hover {
    color: #764ba2;
    transform: translateX(2px);
  }
  
  .remember-forgot input[type="checkbox"] {
    width: auto;
    margin: 0;
    padding: 0;
    accent-color: #764ba2;
    transform: scale(1.1);
  }
  
  .remember-forgot a {
    color: #764ba2;
    text-decoration: none;
    font-weight: 500;
    transition: all 0.3s ease;
    position: relative;
  }
  
  .remember-forgot a::before {
    content: '';
    position: absolute;
    width: 0;
    height: 1px;
    bottom: -2px;
    left: 50%;
    background: #764ba2;
    transition: all 0.3s ease;
  }
  
  .remember-forgot a:hover {
    color: #5a3577;
    transform: translateY(-1px);
  }
  
  .remember-forgot a:hover::before {
    width: 100%;
    left: 0;
  }
  
  .btn-login {
    width: 100%;
    background: linear-gradient(135deg, #764ba2 0%, #667eea 25%, #5a3577 50%, #764ba2 75%, #667eea 100%);
    background-size: 300% 300%;
    border: none;
    padding: 14px;
    font-size: 16px;
    border-radius: 15px;
    color: white;
    cursor: pointer;
    font-weight: 700;
    transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    box-shadow: 
      0 8px 25px rgba(118, 75, 162, 0.3),
      0 4px 10px rgba(0,0,0,0.1),
      inset 0 1px 0 rgba(255,255,255,0.2);
    position: relative;
    overflow: hidden;
    animation: buttonGradient 4s ease infinite;
    text-shadow: 0 2px 4px rgba(0,0,0,0.3);
  }
  
  .btn-login::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(90deg, transparent, rgba(255,255,255,0.4), transparent);
    transition: left 0.6s;
  }
  
  .btn-login::after {
    content: '';
    position: absolute;
    top: 50%;
    left: 50%;
    width: 0;
    height: 0;
    background: rgba(255,255,255,0.3);
    border-radius: 50%;
    transform: translate(-50%, -50%);
    transition: all 0.6s ease;
  }
  
  @keyframes buttonGradient {
    0%, 100% { background-position: 0% 50%; }
    25% { background-position: 100% 0%; }
    50% { background-position: 200% 50%; }
    75% { background-position: 100% 100%; }
  }
  
  .btn-login:hover {
    transform: translateY(-4px) scale(1.02);
    box-shadow: 
      0 15px 40px rgba(118, 75, 162, 0.4),
      0 8px 20px rgba(0,0,0,0.15),
      inset 0 1px 0 rgba(255,255,255,0.3);
    animation-duration: 2s;
  }
  
  .btn-login:hover::before {
    left: 100%;
  }
  
  .btn-login:hover::after {
    width: 300px;
    height: 300px;
  }
  
  .btn-login:active {
    transform: translateY(-2px) scale(1.01);
    box-shadow: 
      0 8px 20px rgba(118, 75, 162, 0.3),
      0 4px 10px rgba(0,0,0,0.1);
  }
  
  .auth-switch {
    margin-top: 20px;
    font-size: 14px;
    text-align: center;
    color: #555;
    animation: fadeIn 1.5s ease-out 1s both;
  }
  
  @keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
  }
  
  .auth-switch a {
    color: #764ba2;
    font-weight: 600;
    text-decoration: none;
    transition: all 0.4s ease;
    position: relative;
    background: linear-gradient(135deg, #764ba2, #667eea);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
  }
  
  .auth-switch a::before {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -3px;
    left: 50%;
    background: linear-gradient(135deg, #764ba2, #667eea);
    transition: all 0.4s ease;
    border-radius: 1px;
  }
  
  .auth-switch a:hover {
    text-shadow: 0 0 15px rgba(118, 75, 162, 0.5);
    transform: translateY(-1px);
  }
  
  .auth-switch a:hover::before {
    width: 100%;
    left: 0;
  }
  
  .error-message {
    background: linear-gradient(135deg, #ffdddd, #ffe6e6);
    border-left: 4px solid #ff6b6b;
    padding: 10px 14px;
    margin-bottom: 15px;
    color: #b10000;
    border-radius: 10px;
    font-weight: 600;
    box-shadow: 0 4px 15px rgba(255, 107, 107, 0.2);
    animation: errorPulse 0.6s ease-in-out, shake 0.5s ease-in-out;
    font-size: 13px;
  }
  
  @keyframes errorPulse {
    0% { opacity: 0; transform: scale(0.9); }
    100% { opacity: 1; transform: scale(1); }
  }
  
  @keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-8px); }
    75% { transform: translateX(8px); }
  }

  /* Responsive untuk mobile */
  @media (max-width: 768px) {
    .container {
      flex-direction: column;
      width: 95vw;
      height: 95vh;
      max-height: none;
    }
    .welcome-card, .auth-box {
      padding: 25px 20px;
    }
    .welcome-card {
      flex: 0.6;
      align-items: center;
      text-align: center;
    }
    .auth-box {
      flex: 1.4;
    }
    .welcome-card h1 {
      font-size: 1.8rem;
    }
    .welcome-card .icon {
      font-size: 2.5rem;
      margin-bottom: 15px;
    }
    .welcome-card p {
      font-size: 0.9rem;
    }
    input[type="email"],
    input[type="password"] {
      margin-bottom: 12px;
      padding: 8px 10px;
    }
    .btn-login {
      padding: 12px;
      font-size: 15px;
    }
    .remember-forgot {
      flex-direction: column;
      gap: 10px;
      align-items: flex-start;
      margin-bottom: 20px;
    }
  }
  
  @media (max-height: 650px) {
    .container {
      height: 95vh;
    }
    .welcome-card, .auth-box {
      padding: 20px 25px;
    }
    .welcome-card h1 {
      font-size: 2rem;
      margin-bottom: 10px;
    }
    .welcome-card .icon {
      font-size: 3rem;
      margin-bottom: 15px;
    }
    input[type="email"],
    input[type="password"] {
      margin-bottom: 12px;
    }
    .remember-forgot {
      margin-bottom: 20px;
    }
  }
</style>
<!-- FontAwesome CDN untuk ikon -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<body>
<header>

</header>

<main>
  <div class="container">
    <div class="welcome-card">
      <div class="icon"><i class="fas fa-home"></i></div>
      <h1>Selamat Datang di KosKu!</h1>
      <p>Platform terpercaya untuk menemukan kos impian Anda dengan mudah dan cepat. Masuk dan jelajahi ribuan pilihan kos terbaik di seluruh Indonesia.</p>
    </div>

    <div class="auth-box">
      <h2>Masuk ke KosKu</h2>

      @if(session('error'))
        <div class="error-message">{{ session('error') }}</div>
      @endif

      <form action="{{ route('login') }}" method="POST" autocomplete="off">
        @csrf
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required autofocus value="{{ old('email') }}" />
        @error('email')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required />
        @error('password')
          <div class="error-message">{{ $message }}</div>
        @enderror

        <div class="remember-forgot">
          <label><input type="checkbox" name="remember" /> Ingat saya</label>
          <a href="#">Lupa password?</a>
        </div>

        <button type="submit" class="btn-login">Masuk</button>
      </form>

      <p class="auth-switch">
        Belum punya akun? <a href="{{ route('register.show') }}">Daftar di sini</a>
      </p>
    </div>
  </div>
</main>

<footer>

</footer>
</body>
</html>