<?PHP
session_start();
unset($_POST);
header("Location: home.php");
?>