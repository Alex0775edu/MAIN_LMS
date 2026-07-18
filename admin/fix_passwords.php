<?php
// Run this script once to hash all existing plain text passwords
require_once __DIR__ . '/../connection.php';

$query = "SELECT id, password FROM users";
$result = mysqli_query($con, $query);

$updated = 0;
while($user = mysqli_fetch_assoc($result)){
    $password = $user['password'];
    
    // Check if password is already hashed (starts with $2y$)
    if(!str_starts_with($password, '$2y$')){
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        $update = "UPDATE users SET password = '$hashed' WHERE id = " . $user['id'];
        if(mysqli_query($con, $update)){
            $updated++;
        }
    }
}

echo "Updated $updated passwords to secure hashed format.";
?>