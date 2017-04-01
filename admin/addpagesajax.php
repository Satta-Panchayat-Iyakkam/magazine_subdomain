<?php 
 //session_start();
 require_once 'dbconfig.php';
if(isset($_POST))
{

$booktitle=$_POST['booktitle'];
$pagescontent=$_POST['pagescontent'];
$bookpagesnumber=$_POST['booknopages'];
/*echo $booktitle;
echo $pagescontent;
echo $bookpagesnumber;*/
   $stmt = $db_con->prepare("INSERT INTO addpages(id, content, bookpagesnumber)
    VALUES(:id, :content, :bookpagesnumber)");
$stmt->execute(array(":id"=>$booktitle, ":content"=>$pagescontent, ":bookpagesnumber"=>$bookpagesnumber)); 
  if( $stmt =1 ) {
    //echo 'saved';
     // $_SESSION['user_session'] = $row['id'];
    $url='http://systimanx.xyz/mag/admin/addpage.php';
    header('Location: '.$url);
    }
else {
    echo 'false';
}
} 


 else
 {
 	echo 'nothing';
 }
?>