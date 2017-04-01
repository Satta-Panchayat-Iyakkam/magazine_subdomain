<?php 
 session_start();
 require_once 'dbconfig.php';
    $username = trim($_POST['username']);
    $password = md5($_POST['password']);
    $stmt = $db_con->prepare("SELECT * FROM login WHERE name =:username AND password =:password ");
   $stmt->execute(array(":username"=>$username, ":password"=>$password));
   $row = $stmt->fetch(PDO::FETCH_ASSOC);
   $count = $stmt->rowCount();
   if( $count == 1 ) {
    echo 'true';
      $_SESSION['user_session'] = $row['id'];
    }
else {
    echo 'false';
}

?>