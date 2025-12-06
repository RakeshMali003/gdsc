<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GDG on Campus - MUJ</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="./style.css">


</head>
<body>
        <!-- Loading Screen -->
        <div class="loading-screen">
        <div class="loading-logo">
            <div class="logo-text gdg-gradient-text">GDG on Campus</div>
            <div class="dots">
                <div class="dot dot-1"></div>
                <div class="dot dot-2"></div>
                <div class="dot dot-3"></div>
                <div class="dot dot-4"></div>
            </div>
        </div>
    </div>
    
 
<header>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
   
            <a class="navbar-brand" href="./index.php">
                <img src="./gdg-logo.png" alt="GDG Logo" style="height:50px; margin-right:10px">
                <span class="gdg-gradient-text">GDG on Campus MUJ</span>
            </a>
            

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            
       
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="./index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#events">Events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./team.php">Team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#faq">FAQ</a>
                    </li>
                </ul>
            </div>
            


  <button class="btn dev-login-btn" id="loginBtn" data-bs-toggle="modal" data-bs-target="#adminLoginModal">
                Developer Login
            </button>

</div>
    </nav>

</header>
<?php
// admin_login_modal.php
session_start();
?>

<!-- Admin Login Modal -->
<div class="modal fade" id="adminLoginModal" tabindex="-1" aria-labelledby="adminLoginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content shadow-lg">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="adminLoginModalLabel">
                    <i class="fas fa-user-shield me-2"></i>Admin Login
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <!-- Alert Container -->
            <div id="alertContainer"></div>

            <form id="adminLoginForm">
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required placeholder="admin@example.com">
                        <div class="invalid-feedback" id="emailError"></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label d-flex justify-content-between">
                            Password
                            <a href="#" class="small text-muted">Forgot?</a>
                        </label>
                        <input type="password" class="form-control" id="password" name="password" required placeholder="********">
                        <div class="invalid-feedback" id="passwordError"></div>
                    </div>
                    <button type="submit" class="btn btn-primary w-100" id="loginBtn">
                        <i class="fas fa-sign-in-alt me-2"></i>Login
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const loginForm = document.getElementById('adminLoginForm');
    const loginBtn = document.getElementById('loginBtn');
    const alertContainer = document.getElementById('alertContainer');

    // Show alert function
    function showAlert(message, type = 'danger') {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} m-3 alert-dismissible fade show`;
        alertDiv.innerHTML = `
            ${message}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        alertContainer.innerHTML = '';
        alertContainer.appendChild(alertDiv);
        
        // Auto-hide success alerts after 3 seconds
        if (type === 'success') {
            setTimeout(() => {
                alertDiv.remove();
            }, 3000);
        }
    }

    // Clear field errors
    function clearFieldError(fieldId) {
        const field = document.getElementById(fieldId);
        const errorDiv = document.getElementById(fieldId + 'Error');
        field.classList.remove('is-invalid');
        errorDiv.textContent = '';
    }

    // Show field error
    function showFieldError(fieldId, message) {
        const field = document.getElementById(fieldId);
        const errorDiv = document.getElementById(fieldId + 'Error');
        field.classList.add('is-invalid');
        errorDiv.textContent = message;
    }

    // Clear all errors
    function clearAllErrors() {
        clearFieldError('email');
        clearFieldError('password');
        alertContainer.innerHTML = '';
    }

    // Form submission
    loginForm.addEventListener('submit', function(e) {
        e.preventDefault();
        clearAllErrors();

        const formData = new FormData(loginForm);
        
        // Show loading state
        const originalBtnText = loginBtn.innerHTML;
        loginBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Logging in...';
        loginBtn.disabled = true;

        fetch('admin_login.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                showAlert(data.message, 'success');
                setTimeout(() => {
                    window.location.href = 'admin_dashboard.php';
                }, 1500);
            } else {
                if (data.field_errors) {
                    // Show field-specific errors
                    Object.keys(data.field_errors).forEach(field => {
                        showFieldError(field, data.field_errors[field]);
                    });
                }
                if (data.message) {
                    showAlert(data.message, 'danger');
                }
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An unexpected error occurred. Please try again.', 'danger');
        })
        .finally(() => {
            // Reset button state
            loginBtn.innerHTML = originalBtnText;
            loginBtn.disabled = false;
        });
    });

    // Clear errors on input
    document.getElementById('email').addEventListener('input', () => clearFieldError('email'));
    document.getElementById('password').addEventListener('input', () => clearFieldError('password'));
});
</script>


