<?php
session_start();

// Check if user is logged in and has admin role
if(!isset($_SESSION['login_data']) || $_SESSION['login_data']['role'] !== 'admin') {
    header("Location: ../auth/login.php");
    exit();
}

require_once __DIR__ . '/../connection.php';

if(isset($_GET['id'])) {
    $user_id = intval($_GET['id']);
    
    // Don't allow deleting self
    if($user_id != $_SESSION['login_data']['id']) {
        $query = "DELETE FROM users WHERE id = $user_id AND role != 'admin'";
        mysqli_query($con, $query);
    }
}

header("Location: users.php");
exit();
?>