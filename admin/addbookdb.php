<?php 
 //session_start();
 require_once 'dbconfig.php';
    $booktitle = trim($_POST['booktitle']);
    //$bookimg = trim($_POST['bookimg']);
    
    $stmt = $db_con->prepare("INSERT INTO addbook(booktitle)
    VALUES(:booktitle)");
 $stmt->execute(array(":booktitle"=>$booktitle)); 
    if( $stmt == 1 ) {
    echo 'saved';
     // $_SESSION['user_session'] = $row['id'];
    }
else {
    echo 'false';
}

 
?>