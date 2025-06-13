<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Report a Problem - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/report.css') }}">
</head>
<body>
    <!-- Header -->
    <header class="header">
        @include('components.navbar')
    </header>

    <!-- Report Section -->
    <section class="report-section">
        <div class="container">
            <!-- Breadcrumb -->
            <nav class="breadcrumb">
                <a href="{{ route('index') }}">Home</a>
                <span class="separator">></span>
                <span>Report a Problem</span>
            </nav>

            <!-- Report Header -->
            <div class="report-header">
                <div class="header-content">
                    <div class="icon-wrapper">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="header-text">
                        <h1>Report a Problem</h1>
                        <p>Help us improve your experience by reporting any issues you encounter</p>
                    </div>
                </div>
            </div>

            <!-- Report Form -->
            <div class="report-form-container">
                <form class="report-form" id="reportForm" action="{{ route('report.submit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    
                    <!-- Problem Type -->
                    <div class="form-section">
                        <h3 class="section-title">Problem Type</h3>
                        <div class="problem-types">
                            <label class="problem-type-card">
                                <input type="radio" name="problem_type" value="technical" required>
                                <div class="card-content">
                                    <i class="fas fa-bug"></i>
                                    <span>Technical Issue</span>
                                    <small>Website errors, loading problems</small>
                                </div>
                            </label>
                            
                            <label class="problem-type-card">
                                <input type="radio" name="problem_type" value="content" required>
                                <div class="card-content">
                                    <i class="fas fa-exclamation-circle"></i>
                                    <span>Content Issue</span>
                                    <small>Incorrect information, outdated data</small>
                                </div>
                            </label>
                            
                            <label class="problem-type-card">
                                <input type="radio" name="problem_type" value="account" required>
                                <div class="card-content">
                                    <i class="fas fa-user-times"></i>
                                    <span>Account Problem</span>
                                    <small>Login issues, profile problems</small>
                                </div>
                            </label>
                            
                            <label class="problem-type-card">
                                <input type="radio" name="problem_type" value="payment" required>
                                <div class="card-content">
                                    <i class="fas fa-credit-card"></i>
                                    <span>Payment Issue</span>
                                    <small>Billing problems, transaction errors</small>
                                </div>
                            </label>
                            
                            <label class="problem-type-card">
                                <input type="radio" name="problem_type" value="other" required>
                                <div class="card-content">
                                    <i class="fas fa-question-circle"></i>
                                    <span>Other</span>
                                    <small>Any other issues</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Contact Information -->
                    <div class="form-section">
                        <h3 class="section-title">Contact Information</h3>
                        <div class="form-grid">
                            <div class="form-group">
                                <label for="name" class="form-label">Full Name *</label>
                                <input type="text" id="name" name="name" class="form-input" required value="{{ auth()->user()->name ?? '' }}">
                            </div>
                            
                            <div class="form-group">
                                <label for="email" class="form-label">Email Address *</label>
                                <input type="email" id="email" name="email" class="form-input" required value="{{ auth()->user()->email ?? '' }}">
                            </div>
                        </div>
                    </div>

                    <!-- Problem Details -->
                    <div class="form-section">
                        <h3 class="section-title">Problem Details</h3>
                        
                        <div class="form-group">
                            <label for="subject" class="form-label">Subject *</label>
                            <input type="text" id="subject" name="subject" class="form-input" placeholder="Brief description of the problem" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="description" class="form-label">Detailed Description *</label>
                            <textarea id="description" name="description" class="form-textarea" rows="6" placeholder="Please describe the problem in detail. Include steps to reproduce the issue if applicable." required></textarea>
                        </div>
                        
                        <div class="form-group">
                            <label for="url" class="form-label">Page URL (Optional)</label>
                            <input type="url" id="url" name="url" class="form-input" placeholder="https://example.com/page-with-problem" value="{{ url()->current() }}">
                        </div>
                    </div>

                    <!-- Screenshots -->
                    <div class="form-section">
                        <h3 class="section-title">Screenshots (Optional)</h3>
                        <div class="upload-area" id="uploadArea">
                            <input type="file" id="screenshots" name="screenshots[]" accept="image/*" multiple hidden>
                            <div class="upload-content">
                                <i class="fas fa-cloud-upload-alt"></i>
                                <h4>Upload Screenshots</h4>
                                <p>Drag and drop images here or click to browse</p>
                                <small>PNG, JPG up to 5MB each (max 3 files)</small>
                            </div>
                        </div>
                        <div class="preview-container" id="previewContainer"></div>
                    </div>

                    <!-- Priority Level -->
                    <div class="form-section">
                        <h3 class="section-title">Priority Level</h3>
                        <div class="priority-options">
                            <label class="priority-option low">
                                <input type="radio" name="priority" value="low" checked>
                                <span class="priority-indicator"></span>
                                <div class="priority-text">
                                    <strong>Low</strong>
                                    <small>Minor issue, no urgency</small>
                                </div>
                            </label>
                            
                            <label class="priority-option medium">
                                <input type="radio" name="priority" value="medium">
                                <span class="priority-indicator"></span>
                                <div class="priority-text">
                                    <strong>Medium</strong>
                                    <small>Affects functionality</small>
                                </div>
                            </label>
                            
                            <label class="priority-option high">
                                <input type="radio" name="priority" value="high">
                                <span class="priority-indicator"></span>
                                <div class="priority-text">
                                    <strong>High</strong>
                                    <small>Critical issue, needs immediate attention</small>
                                </div>
                            </label>
                        </div>
                    </div>

                    <!-- Form Actions -->
                    <div class="form-actions">
                        <button type="button" class="btn btn-secondary" onclick="history.back()">
                            <i class="fas fa-arrow-left"></i>
                            Cancel
                        </button>
                        <button type="submit" class="btn btn-primary" id="submitBtn">
                            <i class="fas fa-paper-plane"></i>
                            Submit Report
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal-overlay" id="successModal">
        <div class="success-modal">
            <div class="success-icon">
                <i class="fas fa-check-circle"></i>
            </div>
            <h3>Report Submitted Successfully!</h3>
            <p>Thank you for your report. We'll review it and get back to you within 24-48 hours.</p>
            <button class="btn btn-primary" onclick="closeSuccessModal()">Got it</button>
        </div>
    </div>

    <script>
        // Form handling
        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            const submitBtn = document.getElementById('submitBtn');
            const originalText = submitBtn.innerHTML;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            submitBtn.disabled = true;
            
            // Simulate form submission (replace with actual submission)
            setTimeout(() => {
                // Show success modal
                document.getElementById('successModal').classList.add('active');
                
                // Reset form
                this.reset();
                document.getElementById('previewContainer').innerHTML = '';
                
                // Reset button
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });

        // File upload handling
        const uploadArea = document.getElementById('uploadArea');
        const fileInput = document.getElementById('screenshots');
        const previewContainer = document.getElementById('previewContainer');

        uploadArea.addEventListener('click', () => fileInput.click());

        uploadArea.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadArea.classList.add('dragover');
        });

        uploadArea.addEventListener('dragleave', () => {
            uploadArea.classList.remove('dragover');
        });

        uploadArea.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadArea.classList.remove('dragover');
            handleFiles(e.dataTransfer.files);
        });

        fileInput.addEventListener('change', (e) => {
            handleFiles(e.target.files);
        });

        function handleFiles(files) {
            previewContainer.innerHTML = '';
            Array.from(files).slice(0, 3).forEach((file, index) => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = (e) => {
                        const preview = document.createElement('div');
                        preview.className = 'preview-item';
                        preview.innerHTML = `
                            <img src="${e.target.result}" alt="Preview">
                            <button type="button" class="remove-btn" onclick="removePreview(this)">
                                <i class="fas fa-times"></i>
                            </button>
                        `;
                        previewContainer.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                }
            });
        }

        function removePreview(btn) {
            btn.parentElement.remove();
        }

        function closeSuccessModal() {
            document.getElementById('successModal').classList.remove('active');
            window.location.href = '{{ route('index') }}';
        }

        // Auto-resize textarea
        document.getElementById('description').addEventListener('input', function() {
            this.style.height = 'auto';
            this.style.height = this.scrollHeight + 'px';
        });
    </script>
</body>
</html>
