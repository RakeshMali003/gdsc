<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login Popup</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .dev-login-btn {
            padding: 12px 30px;
            font-size: 16px;
            font-weight: 600;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0, 123, 255, 0.3);
            transition: all 0.3s ease;
        }

        .dev-login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(0, 123, 255, 0.4);
        }

        .modal-content {
            border: none;
            border-radius: 15px;
            overflow: hidden;
        }

        .modal-header {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border-bottom: none;
            padding: 20px;
        }

        .modal-body {
            background: #f8f9fa;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .btn-primary {
            background: linear-gradient(135deg, #007bff, #0056b3);
            border: none;
            border-radius: 8px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #0056b3, #004085);
            transform: translateY(-1px);
        }

        .form-label {
            font-weight: 600;
            color: #495057;
            margin-bottom: 8px;
        }

        .text-muted {
            color: #6c757d !important;
            text-decoration: none;
        }

        .text-muted:hover {
            color: #007bff !important;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center">
            <h1 class="text-white mb-4">Welcome to Admin Panel</h1>
            <button class="btn btn-primary dev-login-btn" id="loginBtn" data-bs-toggle="modal" data-bs-target="#adminLoginModal">
                Developer Login
            </button>
        </div>
    </div>

    <!-- Admin Login Modal -->
    <div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg">
                <div class="modal-header text-white">
                    <h5 class="modal-title" id="adminLoginModalLabel">
                        <i class="fas fa-user-shield me-2"></i>Admin Login
                    </h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="admin_login.php" method="POST" id="loginForm">
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" name="email" required placeholder="admin@example.com">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label d-flex justify-content-between">
                                Password
                                <a href="#" class="small text-muted">Forgot?</a>
                            </label>
                            <input type="password" class="form-control" id="password" name="password" required placeholder="********">
                        </div>
                        <div class="mb-3 form-check">
                            <input type="checkbox" class="form-check-input" id="rememberMe">
                            <label class="form-check-label" for="rememberMe">
                                Remember me
                            </label>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-sign-in-alt me-2"></i>Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Form submission handling (optional)
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault(); // Remove this line if you want actual form submission
            
            // Get form values
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            
            // Basic validation
            if (!email || !password) {
                alert('Please fill in all fields');
                return;
            }
            
            // Here you would normally submit to your server
            console.log('Login attempt:', { email, password });
            alert('Login form submitted! (Remove this alert in production)');
            
            // Close modal after successful submission
            const modal = bootstrap.Modal.getInstance(document.getElementById('adminLoginModal'));
            modal.hide();
            
            // Reset form
            this.reset();
        });

        // Enhanced modal event handlers
        document.getElementById('adminLoginModal').addEventListener('shown.bs.modal', function () {
            // Focus on email field when modal opens
            document.getElementById('email').focus();
        });

        document.getElementById('adminLoginModal').addEventListener('hidden.bs.modal', function () {
            // Reset form when modal closes
            document.getElementById('loginForm').reset();
        });
    </script>
</body>
</html>