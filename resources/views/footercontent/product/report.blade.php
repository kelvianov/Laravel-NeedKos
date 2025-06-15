<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Problem - KosKu</title>    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>

    <!-- Main Content -->
    <main class="main-content">
        <div class="report-container">
            <div class="report-header">
                <h1>Report a Problem</h1>
                <p>Help us improve by reporting any issues you've encountered</p>
            </div>            <form id="reportForm">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                </div>                <div class="form-group">
                    <label class="form-label" for="category">Problem Category</label>
                    <select id="category" name="category" class="form-select" required>
                        <option value="">Select a category</option>
                        <option value="account">Account Issues</option>
                        <option value="payment">Payment Problems</option>
                        <option value="technical">Technical Problems</option>
                        <option value="other">Other</option>
                    </select>
                </div>

                <div class="form-group">
                    <label class="form-label">Priority Level</label>
                    <div class="priority-options">
                        <div class="priority-option">
                            <input type="radio" id="priority-low" name="priority" value="low" required>
                            <label for="priority-low" class="priority-label priority-low">Low</label>
                        </div>
                        <div class="priority-option">
                            <input type="radio" id="priority-medium" name="priority" value="medium">
                            <label for="priority-medium" class="priority-label priority-medium">Medium</label>
                        </div>
                        <div class="priority-option">
                            <input type="radio" id="priority-high" name="priority" value="high">
                            <label for="priority-high" class="priority-label priority-high">High</label>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" class="form-input" placeholder="Deskripsi singkat tentang masalah" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Detailed Description</label>
                    <textarea id="description" name="description" class="form-textarea" placeholder="Silakan berikan detail sebanyak mungkin tentang masalah yang Anda alami..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Submit Report
                </button>
            </form>        </div>
    </main>    <!-- Custom Notification -->
    <div id="customNotification" class="custom-notification">
        <div class="notification-content">
            <div class="notification-icon">
                <i class="fas fa-check"></i>
            </div>
            <div class="notification-text">
                <div class="notification-title">Success!</div>
                <div class="notification-message">Your report has been submitted successfully.</div>
            </div>
        </div>
        <button class="notification-close" onclick="hideNotification()">
            <i class="fas fa-times"></i>
        </button>
    </div>    <script>
        // Function to show custom notification
        function showCustomNotification(title, message, type = 'success') {
            const notification = document.getElementById('customNotification');
            const titleElement = notification.querySelector('.notification-title');
            const messageElement = notification.querySelector('.notification-message');
            const iconElement = notification.querySelector('.notification-icon i');
            
            // Reset classes
            notification.className = 'custom-notification';
            
            titleElement.textContent = title;
            messageElement.textContent = message;
            
            // Update icon and class based on type
            if (type === 'success') {
                iconElement.className = 'fas fa-check';
                notification.classList.add('success');
            } else if (type === 'error') {
                iconElement.className = 'fas fa-exclamation-triangle';
                notification.classList.add('error');
            }
            
            // Show notification
            notification.classList.add('show');
            
            // Auto hide after 6 seconds
            setTimeout(() => {
                hideNotification();
            }, 6000);
        }

        // Function to hide notification
        function hideNotification() {
            const notification = document.getElementById('customNotification');
            notification.classList.remove('show');
        }

        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            // Simple frontend validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const category = document.getElementById('category').value;
            const priority = document.querySelector('input[name="priority"]:checked');
            const subject = document.getElementById('subject').value.trim();
            const description = document.getElementById('description').value.trim();

            if (!name || !email || !category || !priority || !subject || !description) {
                showCustomNotification('Missing Information', 'Please fill in all required fields to submit your report.', 'error');
                return;
            }

            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            submitBtn.disabled = true;

            // Send AJAX request
            fetch('{{ route("reports.store") }}', {
                method: 'POST',
                body: formData,
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value,
                    'Accept': 'application/json',
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    showCustomNotification('Report Submitted!', 'Thank you for your report. We will review it and get back to you soon via email.', 'success');
                    document.getElementById('reportForm').reset();
                    if (window.categoryChoices) {
                        window.categoryChoices.setChoiceByValue('');
                    }
                } else {
                    let errorMessage = 'There was an error submitting your report. Please try again.';
                    if (data.errors) {
                        errorMessage = Object.values(data.errors).flat().join(' ');
                    } else if (data.message) {
                        errorMessage = data.message;
                    }
                    showCustomNotification('Submission Failed', errorMessage, 'error');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                showCustomNotification('Network Error', 'Unable to submit your report. Please check your internet connection and try again.', 'error');
            })
            .finally(() => {
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            });
        });
    </script>

    <!-- Choices.js -->
    <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const categoryElement = document.getElementById('category');
            if (categoryElement) {
                window.categoryChoices = new Choices(categoryElement, {
                    searchEnabled: false,
                    itemSelectText: '',
                    shouldSort: false,
                    placeholder: true,
                    placeholderValue: 'Select a category',
                    allowHTML: true,
                    removeItemButton: false
                });
            }
        });
    </script>

    <!-- Footer -->
    @include('components.footer')
</body>
</html>
