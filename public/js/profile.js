  document.addEventListener('DOMContentLoaded', function () {
            const menuItems = document.querySelectorAll('.menu-item a');
            menuItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();
                    document.querySelectorAll('.menu-item').forEach(mi => mi.classList.remove('active'));
                    this.parentElement.classList.add('active');
                });
            });

            const buttons = document.querySelectorAll('.btn');
            buttons.forEach(button => {
                button.addEventListener('click', function (e) {
                    e.preventDefault();
                    if (this.classList.contains('btn-primary')) {
                        alert('Mengarahkan ke halaman pencarian kos...');
                    } else if (this.classList.contains('btn-secondary')) {
                        const code = prompt('Masukkan kode dari pemilik kos:');
                        if (code) alert('Kode berhasil dimasukkan: ' + code);
                    }
                });
            });

            const progressFill = document.querySelector('.progress-fill');
            setTimeout(() => {
                progressFill.style.transition = 'width 1s ease-in-out';
                progressFill.style.width = '10%';
            }, 500);
        });

        // filepath: d:\laragon\laragon\www\Laravel-NeedKos\public\js\profile.js
document.addEventListener('DOMContentLoaded', function() {
    const menuLinks = document.querySelectorAll('.menu-link');
    const mainContent = document.querySelector('.main-content');

    menuLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            
            // Remove active class from all menu items
            document.querySelectorAll('.menu-item').forEach(item => {
                item.classList.remove('active');
            });
            
            // Add active class to clicked menu item
            this.parentElement.classList.add('active');
            
            // Fetch content
            fetch(this.href)
                .then(response => response.text())
                .then(html => {
                    mainContent.innerHTML = html;
                })
                .catch(error => {
                    console.error('Error loading content:', error);
                });
        });
    });
});