<?php 
 //session_start();
 require_once 'dbconfig.php';
//if($_POST)
if(isset($_POST))
{
$imgfile=$_FILES["bookimage"]["name"];
$pdffile=$_FILES["bookpdf"]["name"];
$booktitle=$_POST['booktitle'];
$bookyear=$_POST['bookyear'];
$booknopages=$_POST['booknopages'];
/*
echo $booktitle;
echo $imgfile;
echo $pdffile;
echo $booknopages;*/
if($imgfile!==0)
{
$sourcePath = $_FILES['bookimage']['tmp_name']; // Storing source path of the file in a variable
$targetPath1 = "upload/".$_FILES['bookimage']['name']; // Target path where file is to be stored
//echo $targetPath1; 
move_uploaded_file($sourcePath,$targetPath1) ; // Moving Uploaded file
}
if($pdffile!==0)
{
$sourcePath = $_FILES['bookpdf']['tmp_name']; // Storing source path of the file in a variable
$targetPath2 = "uploadpdf/".$_FILES['bookpdf']['name']; // Target path where file is to be stored
//echo $targetPath2; 
move_uploaded_file($sourcePath,$targetPath2) ; // Moving Uploaded file
}



   $stmt = $db_con->prepare("INSERT INTO addbook(booktitle, booknopages, year, bookimage, bookpdf)
    VALUES(:booktitle, :booknopages, :bookyear, :bookimage, :bookpdf)");
$stmt->execute(array(":booktitle"=>$booktitle, ":booknopages"=>$booknopages, ":bookyear"=>$bookyear, ":bookimage"=>$targetPath1, ":bookpdf"=>$targetPath2)); 
 //$row = $stmt->fetch(PDO::FETCH_ASSOC);
   //$count = $stmt->rowCount();
    if( $stmt =1 ) {
    //echo 'saved';
     // $_SESSION['user_session'] = $row['id'];
    $url='http://systimanx.xyz/mag/admin/addbook.php';
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