<?PHP
session_start();
unset($_SESSION['user_name']);
unset($_SESSION['u_id']);  
unset($_SESSION['f_name']);   
unset($_SESSION['l_name']);
// print_r($_SESSION['user_name']);   
header("Location: index.php");
?>