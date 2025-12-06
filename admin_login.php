
<?php
// admin_login_handler.php
session_start();
require 'connection.php';

// Security headers
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('X-XSS-Protection: 1; mode=block');

class AdminLoginHandler {
    private $conn;
    private $response;

    public function __construct($connection) {
        $this->conn = $connection;
        $this->response = [
            'success' => false,
            'message' => '',
            'field_errors' => []
        ];
    }

    // Generate secure password hash with salt
    public static function generateSecureHash($password) {
        // Generate a random salt
        $salt = bin2hex(random_bytes(32));
        
        // Use SHA-512 with salt and pepper for extra security
        $pepper = 'your_secret_pepper_key_here'; // Change this to a secret key
        $hash = hash('sha512', $salt . $password . $pepper);
        
        // Store salt with hash (separated by $)
        return $salt . '$' . $hash;
    }

    // Verify password against stored hash
    public static function verifyPassword($password, $storedHash) {
        $parts = explode('$', $storedHash);
        if (count($parts) !== 2) {
            return false;
        }
        
        $salt = $parts[0];
        $hash = $parts[1];
        
        $pepper = 'your_secret_pepper_key_here'; // Same secret key
        $testHash = hash('sha512', $salt . $password . $pepper);
        
        return hash_equals($hash, $testHash);
    }

    // Validate input data
    private function validateInput($email, $password) {
        $errors = [];

        // Email validation
        if (empty($email)) {
            $errors['email'] = 'Email is required';
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Please enter a valid email address';
        } elseif (strlen($email) > 255) {
            $errors['email'] = 'Email is too long';
        }

        // Password validation
        if (empty($password)) {
            $errors['password'] = 'Password is required';
        } elseif (strlen($password) < 8) {
            $errors['password'] = 'Password must be at least 8 characters long';
        } elseif (strlen($password) > 128) {
            $errors['password'] = 'Password is too long';
        }

        return $errors;
    }

    // Rate limiting check
    private function checkRateLimit($email) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $currentTime = time();
        
        // Check failed attempts in last 15 minutes
        $stmt = $this->conn->prepare("
            SELECT COUNT(*) as attempts 
            FROM login_attempts 
            WHERE (email = ? OR ip_address = ?) 
            AND attempt_time > ? 
            AND success = 0
        ");
        
        $timeLimit = $currentTime - (15 * 60); // 15 minutes ago
        $stmt->bind_param("ssi", $email, $ip, $timeLimit);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        
        return $result['attempts'] < 5; // Allow max 5 attempts per 15 minutes
    }

    // Log login attempt
    private function logAttempt($email, $success) {
        $ip = $_SERVER['REMOTE_ADDR'];
        $userAgent = $_SERVER['HTTP_USER_AGENT'] ?? '';
        
        $stmt = $this->conn->prepare("
            INSERT INTO login_attempts (email, ip_address, user_agent, success, attempt_time) 
            VALUES (?, ?, ?, ?, ?)
        ");
        
        $currentTime = time();
        $stmt->bind_param("sssii", $email, $ip, $userAgent, $success, $currentTime);
        $stmt->execute();
    }

    // Main login processing
    public function processLogin() {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            $this->response['message'] = 'Invalid request method';
            return $this->response;
        }

        $email = trim($_POST['email'] ?? '');
        $password = $_POST['password'] ?? '';

        // Validate input
        $validationErrors = $this->validateInput($email, $password);
        if (!empty($validationErrors)) {
            $this->response['field_errors'] = $validationErrors;
            $this->response['message'] = 'Please correct the errors below';
            return $this->response;
        }

        // Check rate limiting
        if (!$this->checkRateLimit($email)) {
            $this->response['message'] = 'Too many failed attempts. Please try again in 15 minutes.';
            return $this->response;
        }

        // Query user by email
        $stmt = $this->conn->prepare("
            SELECT id, email, password_hash, is_google_account, is_active, last_login 
            FROM admin_users 
            WHERE email = ? AND is_active = 1
        ");
        
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows !== 1) {
            $this->logAttempt($email, 0);
            $this->response['message'] = 'Invalid email or password';
            return $this->response;
        }

        $user = $result->fetch_assoc();

        // Check if it's a Google account
        if ($user['is_google_account'] == 1) {
            $this->logAttempt($email, 0);
            $this->response['message'] = 'Please login using your Google account';
            return $this->response;
        }

        // Verify password
        if (!self::verifyPassword($password, $user['password_hash'])) {
            $this->logAttempt($email, 0);
            $this->response['message'] = 'Invalid email or password';
            return $this->response;
        }

        // Successful login
        $this->logAttempt($email, 1);
        
        // Update last login
        $updateStmt = $this->conn->prepare("UPDATE admin_users SET last_login = NOW() WHERE id = ?");
        $updateStmt->bind_param("i", $user['id']);
        $updateStmt->execute();

        // Set session variables
        session_regenerate_id(true); // Prevent session fixation
        $_SESSION['admin_user_id'] = $user['id'];
        $_SESSION['admin_email'] = $user['email'];
        $_SESSION['login_time'] = time();

        $this->response['success'] = true;
        $this->response['message'] = 'Login successful! Redirecting to dashboard...';
        
        return $this->response;
    }
}

// Process the login
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $handler = new AdminLoginHandler($conn);
    $result = $handler->processLogin();
    echo json_encode($result);
    exit;
}

// If not POST request, redirect to login page
header("Location: index.php");
exit;
?>