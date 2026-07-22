<?php
include('sidebar.php');
if(isset($_GET['id'])){
    $id = $_GET['id'];
    $sql = "DELETE FROM users WHERE id = $id";
    if(mysqli_query($con, $sql)) {
        echo "<script>alert('User deleted successfully');
            window.location.href='users.php';
        </script>";
    } 
}else{
    header('Location:users.php');
}
?>