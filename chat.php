<?php 
  $text = filter_var(trim($_POST['text']),
  FILTER_SANITIZE_STRING);  
  
  $host = 'localhost';  
  $user = 'root';    
  $pass = 'root'; 
  $db_name = 'diplom_chat';

  $mysql = mysqli_connect($host, $user, $pass, $db_name);
  $query = "INSERT INTO `{$_COOKIE['user']}` (`text`, `name`) VALUES('$text', '{$_COOKIE['user']}')";
  $result = mysqli_query($mysql, $query)  or die("ERROR " . mysqli_error($mysql));
  
  
  header("location: /join_chat.php"); 
  //exit;
  //var_dump($mysql);
?>