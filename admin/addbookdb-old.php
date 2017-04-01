<?php 
 //session_start();
require_once 'dbconfig.php';
//if(isset($_POST['btn-upload']))
 $booktitle = $_POST['booktitle'];
 $bookimage = $_FILES['bookimage'];
 $bookpdf = $_FILES['bookpdf'];
	if($_POST) 
{
echo 'hii';
echo $bookpdf;
try{
 $stmt = $db_con->prepare("INSERT INTO addbook(booktitle, bookimage, bookpdf)
    VALUES(:booktitle, :bookimage, :bookpdf)");
 $stmt->execute(array(":booktitle"=>$booktitle, ":bookimage"=>$bookimage, ":bookpdf"=>$bookimage)); 
  echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
}
else
{
	echo 'Cannot save Try again';
}
?>