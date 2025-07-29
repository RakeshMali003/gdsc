<?php
// password_utility.php (Helper script for generating password hashes)

require 'connection.php';

class PasswordUtility {
    
    // Function to hash a new password
    public static function hashPassword($password) {
        return AdminLoginHandler::generateSecureHash($password);
    }
    
    // Function to update user password in database
    public static function updateUserPassword($conn, $email, $newPassword) {
        $hashedPassword = self::hashPassword($newPassword);
        
        $stmt = $conn->prepare("UPDATE admin_users SET password_hash = ? WHERE email = ?");
        $stmt->bind_param("ss", $hashedPassword, $email);
        
        if ($stmt->execute()) {
            return "Password updated successfully for: " . $email;
        } else {
            return "Error updating password: " . $conn->error;
        }
    }
}

// Example usage (uncomment to use):

// Create new password hash
$newPassword = "12345678";
$hashedPassword = PasswordUtility::hashPassword($newPassword);
echo "Hashed Password: " . $hashedPassword . "\n";

// Update password for a user
$result = PasswordUtility::updateUserPassword($conn, "admin@example.com", $newPassword);
echo $result;


?>
