<?php
include 'header.php';
require_once 'dbconfig.php';
?>

<?php
if(isset($_GET['id'])){
$edit_id = $_GET['id'];
//echo $edit_id;
$stmt= $db_con->prepare("SELECT * FROM addbook WHERE id = :id");
//print_r($stmt);
$stmt->execute(array(':id' => $edit_id));
$result = $stmt->fetch();
$imgfilesql=$result['bookimage'];
$pdffilesql=$result['bookpdf'];
//echo $pdffilesql;
}

if($_POST)
{
$imgfile=$_FILES["bookimage"]["name"];
$pdffile=$_FILES["bookpdf"]["name"];
$booktitle=$_POST['booktitle'];
$booknopages=$_POST['booknopages'];


if($imgfile=='')
{
$imgfilesql=$result['bookimage'];
//echo $imgfilesql;
  $stmt = $db_con->prepare("UPDATE addbook SET booktitle=:booktitle, booknopages=:booknopages, bookimage=:imgfilesql WHERE id=:edit_id");
$stmt->execute(array(":booktitle"=>$booktitle, ":booknopages"=>$booknopages, ":imgfilesql"=>$imgfilesql, ":edit_id"=>$edit_id)); 
}
else if($imgfile!==0)
{
$imgfile=$_FILES["bookimage"]["name"];
// $imgfile= uniqid(); 
$sourcePath = $_FILES['bookimage']['tmp_name']; 
$targetPath1 = "upload/".uniqid().$_FILES['bookimage']['name']; 
move_uploaded_file($sourcePath,$targetPath1) ; 
  $stmt = $db_con->prepare("UPDATE addbook SET booktitle=:booktitle, booknopages=:booknopages, bookimage=:bookimage WHERE id=:edit_id");
$stmt->execute(array(":booktitle"=>$booktitle, ":booknopages"=>$booknopages,  ":bookimage"=>$targetPath1, ":edit_id"=>$edit_id)); 
}
if($pdffile=='')
{
$pdffilesql=$result['bookpdf'];
//echo $pdffilesql;
  $stmt = $db_con->prepare("UPDATE addbook SET booktitle=:booktitle, booknopages=:booknopages, bookpdf=:pdffilesql WHERE id=:edit_id");
$stmt->execute(array(":booktitle"=>$booktitle, ":booknopages"=>$booknopages, ":pdffilesql"=>$pdffilesql, ":edit_id"=>$edit_id)); 
}
else if($pdffile!==0)
{
$pdffile=$_FILES["bookpdf"]["name"];
$sourcePath2 = $_FILES['bookpdf']['tmp_name']; 
$targetPath2 = "uploadpdf/".uniqid().$_FILES['bookpdf']['name']; 
//echo $targetPath1; 
move_uploaded_file($sourcePath2,$targetPath2) ;

  $stmt = $db_con->prepare("UPDATE addbook SET booktitle=:booktitle, booknopages=:booknopages, bookpdf=:bookpdf WHERE id=:edit_id");
$stmt->execute(array(":booktitle"=>$booktitle, ":booknopages"=>$booknopages, ":bookpdf"=>$targetPath2, ":edit_id"=>$edit_id));  
}      
}
?>

  <form action="" name="addbookform" method="POST" enctype="multipart/form-data" >
                               <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Edit Book Pages</h4>
                            </div>
                             <div class="panel-body">
                              <div class="main_tabs">
                                    <div class="col">
                                     <h5>  Book Title</h5>
                                    </div>
                                    <div class="col">
                                     <h5>  Book Image</h5>
                                    </div>
                                    <div class="col">
                                     <h5>  Book No Of Pages</h5>
                                    </div>
                                    <div class="col">
                                     <h5>  Book PDF</h5>
                                    </div>
                                    <div class="col">
                                     <h5> Update</h5>
                                    </div>
                              </div>
                                <div class="main_tabs">
                                    <div class="col">
                                     <input type="text" class="form-control border-input" name="booktitle" id="booktitle"  value="<?php echo $result['booktitle']; ?>">
                                    </div>
                                    <div class="col">
                                         <div class="d-flex">
                                             <div class="flex-1">
                                           <img  value="" src="<?php echo $result['bookimage'];?>" width="40%" height="90%" class="m-b-6perc" />
                                           </div>
                                           <div class="flex-2">
                                                                <input type="file"  name="bookimage" id="bookimage" class="bookimage1">
                                                                </div>
                                                                </div>
                                    </div>
                                    <div class="col">
                                         <input type="text" class="form-control border-input" name="booknopages" id="booknopages"  value="<?php echo $result['booknopages']; ?>">
                                    </div>
                                    <div class="col">
                                         <i class="fa fa-file-pdf-o fa-2x m-23-auto" aria-hidden="true"></i>
                                           <input type="file"  name="bookpdf" id="bookpdf" class="bookpdf1" > 
                                    </div>
                                    <div class="col">
                                          <input type="submit" class="btn btn-info btn-fill btn-w" id="" value="Edit Book"/>
                                    </div>
                                </div>       
                             </div>
                   </div>
                   </div>
                   </div>
                   </div>                 
                                    
                                           
                                    </div>                                    
                              
                                    <div class="clearfix"></div>
                                </form>
                                   <?php include 'footer.php'; ?>