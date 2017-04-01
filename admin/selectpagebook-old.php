<?php 
 
include_once 'dbconfig.php';

if(isset($_POST))
{
 $booktitle = $_POST['booktitle'];
//echo $booktitle;
//$sql= $db_con->prepare("SELECT booknopages FROM addbook as book LEFT JOIN addpages as pages on book.id = pages.id WHERE book.id = '".$booktitle."'");
$sql= $db_con->prepare("SELECT booknopages FROM addbook");
$sql->execute();
$result = $sql->fetch();
if ($result) {
    // successfully inserted into database
   // $response["success"] = 1;
   // $response["message"] = $result;

    // echoing JSON response
    //header('Content-Type: application/json');
    //echo json_encode($result);
  $fresult = $sql->fetchAll(PDO::FETCH_ASSOC);
  echo json_encode($fresult);
  
} 
}
?>
