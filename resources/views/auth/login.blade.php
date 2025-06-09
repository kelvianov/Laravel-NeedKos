<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <style>
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 900px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
            display: flex;
        }

        .welcome-side {
            flex: 1;
            background: #222;
            padding: 48px;
            color: #fff;
            display: flex;
            flex-direction: column;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .welcome-side::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.7)), url('../images/modernnnnnn-room.png');
            background-size: cover;
            background-position: center;
            z-index: 1;
        }

        .welcome-content {
            position: relative;
            z-index: 2;
        }

        .welcome-side h1 {
            font-size: 2.4rem;
            font-weight: 700;
            margin-bottom: 16px;
        }

        .welcome-side p {
            font-size: 1.1rem;
            opacity: 0.9;
            line-height: 1.6;
            margin-bottom: 24px;
        }

        .auth-side {
            flex: 1;
            padding: 48px;
            background: #fff;
        }

        .auth-side h2 {
            font-size: 1.8rem;
            color: #222;
            margin-bottom: 32px;
            text-align: center;
        }

        .form-group {
            margin-bottom: 24px;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 500;
            color: #555;
            margin-bottom: 8px;
        }

        .form-input {
            width: 100%;
            padding: 12px 16px;
            font-size: 1rem;
            border: 1px solid #ddd;
            border-radius: 8px;
            transition: all 0.2s;
        }

        .form-input:focus {
            outline: none;
            border-color: #222;
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 24px;
            font-size: 0.9rem;
        }

        .remember-forgot label {
            color: #555;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .remember-forgot input[type="checkbox"] {
            width: 16px;
            height: 16px;
        }

        .remember-forgot a {
            color: #222;
            text-decoration: none;
            font-weight: 500;
        }

        .remember-forgot a:hover {
            text-decoration: underline;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: #222;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.2s;
            margin-bottom: 24px;
        }

        .btn-login:hover {
            background: #000;
            transform: translateY(-2px);
        }

        .auth-links {
            margin-top: 24px;
            text-align: center;
            font-size: 0.9rem;
            color: #666;
        }

        .auth-links a {
            color: #222;
            text-decoration: none;
            font-weight: 600;
            transition: color 0.2s;
        }

        .auth-links a:hover {
            color: #000;
        }

        .error-message {
            background: #fef2f2;
            border-left: 4px solid #dc2626;
            padding: 12px 16px;
            margin-bottom: 20px;
            color: #991b1b;
            border-radius: 8px;
            font-size: 0.9rem;
        }

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .welcome-side {
                padding: 32px;
            }

            .welcome-side h1 {
                font-size: 2rem;
            }

            .auth-side {
                padding: 32px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-side">
            <div class="welcome-content">
                <h1>Welcome to KosKu</h1>
                <p>Temukan kos idealmu. Login untuk penawaran spesial dan rekomendasi pribadi.</p>
            </div>
        </div>

        <div class="auth-side">
            <h2 id="formTitle">Sign In</h2>

            <div id="loginFormSection">
                @if(session('error'))
                    <div class="error-message">{{ session('error') }}</div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Email Address</label>
                        <input type="email" name="email" class="form-input" value="{{ old('email') }}" required autofocus>
                        @error('email')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-input" required>
                        @error('password')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="remember-forgot">
                        <label><input type="checkbox" name="remember"> Remember me</label>
                        <a href="#" id="forgotPasswordLink">Forgot password?</a>
                    </div>
                    <button type="submit" class="btn-login">Sign In</button>
                </form>
                <div class="auth-links">
                    Don't have an account? <a href="{{ route('register') }}">Sign Up</a>
                </div>            </div>
            
            <!-- Forgot Password Section -->
            <div id="forgotSection" style="display:none;">
                <div id="forgotNotif"></div>
                <form id="forgotForm" style="margin-top:24px;">
                    <div class="form-group">
                        <label class="form-label" for="forgotEmail">Email Address</label>
                        <input type="email" id="forgotEmail" name="email" class="form-input" required autofocus>
                    </div>
                    <button type="submit" class="btn-login" id="sendResetBtn">Kirim Link Reset</button>
                    <button type="button" class="btn-login" id="resendBtn" style="display:none;margin-top:10px;background:#000000;">Kirim Ulang Email</button>
                </form>
                <div class="auth-links" style="margin-top:18px;">
                    <a href="#" id="backToLogin">&larr; Kembali ke Login</a>
                </div>
            </div>

            <!-- Reset Password Section -->
            <div id="resetSection" style="display:none;">
                <div id="resetNotif"></div>
                <form id="resetForm" method="POST" action="{{ route('password.update') }}" style="margin-top:24px;">
                    @csrf
                    <input type="hidden" name="token" id="resetToken">
                    
                    <div class="form-group">
                        <label class="form-label" for="resetEmail">Email Address</label>
                        <input type="email" id="resetEmail" name="email" class="form-input" readonly style="background:#f8f9fa;color:#666;">
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="newPassword">Password Baru</label>
                        <input type="password" id="newPassword" name="password" class="form-input" required minlength="8">
                        <small style="color:#666;font-size:0.8rem;">Minimal 8 karakter</small>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label" for="confirmPassword">Konfirmasi Password</label>
                        <input type="password" id="confirmPassword" name="password_confirmation" class="form-input" required minlength="8">
                    </div>
                    
                    <button type="submit" class="btn-login" id="resetSubmitBtn">Reset Password</button>
                </form>
                <div class="auth-links" style="margin-top:18px;">
                    <a href="#" id="backToLoginFromReset">&larr; Kembali ke Login</a>
                </div>
            </div>
        </div>
    </div>    <script>
    const forgotLink = document.getElementById('forgotPasswordLink');
    const loginFormSection = document.getElementById('loginFormSection');
    const forgotSection = document.getElementById('forgotSection');
    const resetSection = document.getElementById('resetSection');
    const formTitle = document.getElementById('formTitle');
    const backToLogin = document.getElementById('backToLogin');
    const backToLoginFromReset = document.getElementById('backToLoginFromReset');
    const forgotForm = document.getElementById('forgotForm');
    const resetForm = document.getElementById('resetForm');
    const forgotNotif = document.getElementById('forgotNotif');
    const resetNotif = document.getElementById('resetNotif');
    const sendResetBtn = document.getElementById('sendResetBtn');
    const resendBtn = document.getElementById('resendBtn');
    const resetSubmitBtn = document.getElementById('resetSubmitBtn');    let lastEmail = '';

    // Check URL parameters on page load
    window.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const token = urlParams.get('token');
        const email = urlParams.get('email');
        
        if (token && email) {
            // Show reset password form
            showResetForm(token, email);
        }

        // Check for reset password errors from session
        @if(session('status'))
            resetNotif.innerHTML = '<div style="background:#f0fdf4;border-left:4px solid #22c55e;padding:12px 16px;margin-bottom:18px;color:#166534;border-radius:8px;font-size:0.97rem;">{{ session('status') }}</div>';
            showLoginForm();
        @endif

        @if($errors->any() && request()->has('token'))
            let errorHtml = '<div style="background:#fef2f2;border-left:4px solid #dc2626;padding:12px 16px;margin-bottom:18px;color:#991b1b;border-radius:8px;font-size:0.97rem;">';
            @foreach ($errors->all() as $error)
                errorHtml += '{{ $error }}<br>';
            @endforeach
            errorHtml += '</div>';
            resetNotif.innerHTML = errorHtml;
            
            // Keep the reset form visible if there are errors
            const token = urlParams.get('token');
            const email = urlParams.get('email') || '{{ old('email') }}';
            if (token) {
                showResetForm(token, email);
            }
        @endif
    });

    function showLoginForm() {
        loginFormSection.style.display = 'block';
        forgotSection.style.display = 'none';
        resetSection.style.display = 'none';
        formTitle.textContent = 'Sign In';
        forgotNotif.innerHTML = '';
        resetNotif.innerHTML = '';
        
        // Clear URL parameters
        history.replaceState({}, document.title, window.location.pathname);
    }

    function showForgotForm() {
        loginFormSection.style.display = 'none';
        forgotSection.style.display = 'block';
        resetSection.style.display = 'none';
        formTitle.textContent = 'Reset Password';
        forgotNotif.innerHTML = '';
        resetNotif.innerHTML = '';
        document.getElementById('forgotEmail').focus();
    }

    function showResetForm(token, email) {
        loginFormSection.style.display = 'none';
        forgotSection.style.display = 'none';
        resetSection.style.display = 'block';
        formTitle.textContent = 'Reset Password';
        forgotNotif.innerHTML = '';
        resetNotif.innerHTML = '';
        
        document.getElementById('resetToken').value = token;
        document.getElementById('resetEmail').value = email;
        document.getElementById('newPassword').focus();
    }

    forgotLink.onclick = function(e){
        e.preventDefault();
        showForgotForm();
    }

    backToLogin.onclick = function(e){
        e.preventDefault();
        showLoginForm();
    }

    backToLoginFromReset.onclick = function(e){
        e.preventDefault();
        showLoginForm();
    }

    function handleForgot(email) {
        forgotNotif.innerHTML = '<div style="color:#666;">Memproses...</div>';
        sendResetBtn.disabled = true;
        resendBtn.disabled = true;
        fetch('/password/email', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ email })
        })
        .then(async r => {
            let data;
            try {
                data = await r.json();
            } catch (e) {                // Jika bukan JSON (redirect/HTML), anggap sukses jika status 200
                if(r.status === 200) {
                    forgotNotif.innerHTML = '<div style="background:#f0fdf4;border-left:4px solid #22c55e;padding:12px 16px;margin-bottom:18px;color:#166534;border-radius:8px;font-size:0.97rem;">Link reset password telah dikirim ke email Anda.</div>';
                    sendResetBtn.style.display = 'none';
                    resendBtn.style.display = 'block';
                    lastEmail = email;
                    return;
                } else {
                    forgotNotif.innerHTML = '<div style="background:#fef2f2;border-left:4px solid #dc2626;padding:12px 16px;margin-bottom:18px;color:#991b1b;border-radius:8px;font-size:0.97rem;">Email tidak tersedia.</div>';
                    sendResetBtn.style.display = 'block';
                    resendBtn.style.display = 'none';
                    return;
                }
            }            if(data.status === 'success' || (data.message && data.message.match(/email telah dikirim|reset link/i))){
                forgotNotif.innerHTML = '<div style="background:#f0fdf4;border-left:4px solid #22c55e;padding:12px 16px;margin-bottom:18px;color:#166534;border-radius:8px;font-size:0.97rem;">Link reset password telah dikirim ke email Anda.</div>';
                sendResetBtn.style.display = 'none';
                resendBtn.style.display = 'block';
                lastEmail = email;
            }else{
                forgotNotif.innerHTML = '<div style="background:#fef2f2;border-left:4px solid #dc2626;padding:12px 16px;margin-bottom:18px;color:#991b1b;border-radius:8px;font-size:0.97rem;">'+(data.message || 'Email tidak tersedia.')+'</div>';
                sendResetBtn.style.display = 'block';
                resendBtn.style.display = 'none';
            }
        })        .catch(()=>{
            forgotNotif.innerHTML = '<div style="background:#fef2f2;border-left:4px solid #dc2626;padding:12px 16px;margin-bottom:18px;color:#991b1b;border-radius:8px;font-size:0.97rem;">Email tidak tersedia.</div>';
            sendResetBtn.style.display = 'block';
            resendBtn.style.display = 'none';
        })
        .finally(()=>{
            sendResetBtn.disabled = false;
            resendBtn.disabled = false;
        });
    }

    function handlePasswordReset() {
        const password = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;
        
        // Clear previous notifications
        resetNotif.innerHTML = '';
        
        // Validate passwords match
        if (password !== confirmPassword) {
            resetNotif.innerHTML = '<div style="background:#fef2f2;border-left:4px solid #dc2626;padding:12px 16px;margin-bottom:18px;color:#991b1b;border-radius:8px;font-size:0.97rem;">Password dan konfirmasi password tidak cocok.</div>';
            return false;
        }
        
        // Validate password length
        if (password.length < 8) {
            resetNotif.innerHTML = '<div style="background:#fef2f2;border-left:4px solid #dc2626;padding:12px 16px;margin-bottom:18px;color:#991b1b;border-radius:8px;font-size:0.97rem;">Password minimal 8 karakter.</div>';
            return false;
        }
        
        resetSubmitBtn.disabled = true;
        resetSubmitBtn.textContent = 'Memproses...';
        
        return true;
    }

    forgotForm.onsubmit = function(e){
        e.preventDefault();
        const email = document.getElementById('forgotEmail').value;
        handleForgot(email);
    }

    resetForm.onsubmit = function(e) {
        if (!handlePasswordReset()) {
            e.preventDefault();
        }
    }

    resendBtn.onclick = function(){
        if(lastEmail) handleForgot(lastEmail);
    }

    // Real-time password confirmation validation
    document.getElementById('confirmPassword').addEventListener('input', function() {
        const password = document.getElementById('newPassword').value;
        const confirmPassword = this.value;
        
        if (confirmPassword && password !== confirmPassword) {
            this.style.borderColor = '#dc2626';
        } else {
            this.style.borderColor = '#ddd';
        }
    });
    </script>
</body>
</html>