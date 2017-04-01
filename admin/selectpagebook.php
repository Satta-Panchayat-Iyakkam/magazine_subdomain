<?php 
 
include_once 'dbconfig.php';

if(isset($_POST))
{
	$booktitleid=$_POST['booktitle'];
	
    $sql= $db_con->prepare("SELECT booknopages,id FROM addbook WHERE id=$booktitleid");

$sql->execute();
$result = $sql->fetch();

if(isset($result['booknopages']))
{
   echo $result['booknopages']	;
   exit;

}
else
{
	echo 0;
}

 
}
?>
