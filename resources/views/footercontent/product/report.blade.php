<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report a Problem - KosKu</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            line-height: 1.6;
            color: #111;
            background: #fff;
            zoom: 0.85;
        }

        .header {
            background: white;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000;
            padding: 1rem 0;
        }        .main-content {
            padding-top: 100px;
            padding-bottom: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #fafafa;
        }

        .report-container {
            max-width: 600px;
            width: 100%;
            background: white;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
            padding: 40px;
            margin: 20px;
        }

        .report-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .report-header h1 {
            font-size: 1.8rem;
            font-weight: 600;
            color: #111;
            margin-bottom: 8px;
        }

        .report-header p {
            color: #666;
            font-size: 0.95rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            font-weight: 500;
            color: #111;
            margin-bottom: 6px;
            font-size: 0.9rem;
        }

        .form-input,
        .form-select,
        .form-textarea {
            width: 100%;
            padding: 12px 14px;
            border: 1px solid #ddd;
            border-radius: 6px;
            font-size: 0.95rem;
            transition: all 0.2s ease;
            background: #fff;
            color: #111;
        }

        .form-input:focus,
        .form-select:focus,
        .form-textarea:focus {
            outline: none;
            border-color: #111;
            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.05);
        }

        .form-textarea {
            min-height: 120px;
            resize: vertical;
            font-family: inherit;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }

        .priority-options {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 6px;
        }

        .priority-option {
            position: relative;
        }

        .priority-option input[type="radio"] {
            display: none;
        }

        .priority-label {
            display: block;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            font-weight: 500;
            font-size: 0.9rem;
            color: #666;
        }

        .priority-option input[type="radio"]:checked + .priority-label {
            border-color: #111;
            background: #f5f5f5;
            color: #111;
        }

        .priority-label:hover {
            border-color: #999;
        }

        .submit-btn {
            width: 100%;
            background: #111;
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 6px;
            font-size: 0.95rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.2s ease;
            margin-top: 10px;
        }

        .submit-btn:hover {
            background: #333;
        }

        .submit-btn:active {
            transform: translateY(1px);
        }

        .submit-btn:disabled {
            background: #999;
            cursor: not-allowed;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
            
            .priority-options {
                grid-template-columns: 1fr;
            }
            
            .report-container {
                padding: 30px 20px;
                margin: 10px;
            }
            
            .report-header h1 {
                font-size: 1.5rem;
            }
        }
    </style>
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
            </div>

            <form id="reportForm">
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="name">Full Name</label>
                        <input type="text" id="name" name="name" class="form-input" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label" for="email">Email Address</label>
                        <input type="email" id="email" name="email" class="form-input" required>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="category">Problem Category</label>
                    <select id="category" name="category" class="form-select" required>
                        <option value="">Select a category</option>
                        <option value="account">Account Issues</option>
                        <option value="payment">Payment Problems</option>
                        <option value="booking">Booking Issues</option>
                        <option value="property">Property Listing</option>
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
                    <input type="text" id="subject" name="subject" class="form-input" placeholder="Brief description of the problem" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="description">Detailed Description</label>
                    <textarea id="description" name="description" class="form-textarea" placeholder="Please provide as much detail as possible about the issue you're experiencing..." required></textarea>
                </div>

                <button type="submit" class="submit-btn">
                    <i class="fas fa-paper-plane"></i> Submit Report
                </button>
            </form>
        </div>
    </main>

    <script>
        document.getElementById('reportForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Simple frontend validation
            const name = document.getElementById('name').value.trim();
            const email = document.getElementById('email').value.trim();
            const category = document.getElementById('category').value;
            const priority = document.querySelector('input[name="priority"]:checked');
            const subject = document.getElementById('subject').value.trim();
            const description = document.getElementById('description').value.trim();

            if (!name || !email || !category || !priority || !subject || !description) {
                alert('Please fill in all required fields.');
                return;
            }

            // Simulate form submission
            const submitBtn = document.querySelector('.submit-btn');
            const originalText = submitBtn.innerHTML;
            
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Submitting...';
            submitBtn.disabled = true;

            setTimeout(() => {
                alert('Thank you! Your report has been submitted successfully. We will review it and get back to you soon.');                document.getElementById('reportForm').reset();
                submitBtn.innerHTML = originalText;
                submitBtn.disabled = false;
            }, 2000);
        });
    </script>

    <!-- Footer -->
    @include('components.footer')
</body>
</html>
