<footer class="footer-modern">
    <div class="container">
        <div class="footer-content">
            <div class="footer-brand">
                <h3 class="footer-logo">KosKu</h3>
                <p class="footer-desc">Temukan dan booking akomodasi berkualitas di seluruh Indonesia. Platform terpercaya untuk pencarian kamar tanpa ribet.</p>
            </div>

            <div class="footer-links">
                <div class="footer-section">
                    <h4>Product</h4>
                    <ul>
                        <li><a href="{{ route('index') }}#search">Search Kos</a></li>
                        <li><a href="{{ route('register') }}">List Your Property</a></li>
                        <li><a href="{{ route('report.problem') }}">Report a Problem</a></li>
                        <li><a href="#">Mobile App</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Company</h4>                    <ul>
                        <li><a href="{{ route('about') }}">About Us</a></li>                        <li><a href="{{ route('careers') }}">Careers</a></li>
                        <li><a href="{{ route('press.kit') }}">Press Kit</a></li>
                        <li><a href="{{ route('contact') }}">Contact</a></li>
                    </ul>
                </div>

                <div class="footer-section">
                    <h4>Support</h4>
                    <ul>
                    <li><a href="{{ route('help.center') }}">Help Center</a></li> 
                    <li><a href="{{ route('safety.guide') }}">Safety Guide</a></li>                        <li><a href="{{ route('terms') }}">Terms of Service</a></li>
                        <li><a href="{{ route('privacy.policy') }}">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-info">
                <p>&copy; 2025 KosKu. All rights reserved.</p>
                <div class="footer-social">
                    <a href="#" aria-label="Instagram"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                    <a href="#" aria-label="Facebook"><i class="fab fa-facebook"></i></a>
                    <a href="#" aria-label="LinkedIn"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
        </div>
    </div>
</footer>

<style>
.footer-modern {
    background: #fff;
    padding: 64px 0 32px;
    border-top: 1px solid #eee;
    color: #333;
}

.footer-content {
    display: grid;
    grid-template-columns: 2fr 3fr;
    gap: 64px;
    margin-bottom: 48px;
}

.footer-brand {
    max-width: 320px;
}

.footer-logo {
    font-size: 1.5rem;
    font-weight: 700;
    color: #222;
    margin: 0 0 16px;
}

.footer-desc {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
}

.footer-links {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 32px;
}

.footer-section h4 {
    font-size: 0.9rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    color: #222;
    margin: 0 0 20px;
}

.footer-section ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

.footer-section ul li {
    margin-bottom: 12px;
}

.footer-section ul li a {
    color: #666;
    text-decoration: none;
    font-size: 0.95rem;
    transition: color 0.2s;
}

.footer-section ul li a:hover {
    color: #222;
}

.footer-bottom {
    padding-top: 32px;
    border-top: 1px solid #eee;
}

.footer-info {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.footer-info p {
    color: #666;
    font-size: 0.9rem;
}

.footer-social {
    display: flex;
    gap: 16px;
}

.footer-social a {
    color: #666;
    text-decoration: none;
    transition: color 0.2s;
}

.footer-social a:hover {
    color: #222;
}

@media (max-width: 1024px) {
    .footer-content {
        grid-template-columns: 1fr;
        gap: 48px;
    }

    .footer-brand {
        max-width: none;
        text-align: center;
    }
}

@media (max-width: 768px) {
    .footer-modern {
        padding: 48px 0 32px;
    }

    .footer-links {
        grid-template-columns: 1fr;
        gap: 32px;
        text-align: center;
    }

    .footer-info {
        flex-direction: column;
        gap: 24px;
        text-align: center;
    }
}
</style>