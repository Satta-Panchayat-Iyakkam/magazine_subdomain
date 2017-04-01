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
                                          <table class="table table-striped">
 <thead>
                    <tr class="bold">  
                                    
                        <th>Book Title</th>
                        <th>Book Image</th>
                        <th>Book No Of Pages</th>
                        <th>Book PDF</th>
                        <th>Update</th>                      
                    </tr> 
                  </thead>
                 
                   <tbody>
  <tr>
  <td>
   <input type="text" class="form-control border-input" name="booktitle" id="booktitle"  value="<?php echo $result['booktitle']; ?>">
  </td>
   <td>
 <img  value="" src="<?php echo $result['bookimage'];?>" width="50%" height="50%" class="m-b-6perc" />
                      <input type="file" class="form-control border-input file" name="bookimage" id="bookimage" >
  </td>
   <td>
    <input type="text" class="form-control border-input" name="booknopages" id="booknopages"  value="<?php echo $result['booknopages']; ?>">
  </td>
   <td>
 <!--<iframe src="<?php echo $result['bookpdf']?>" width="40%" style="height:40%" ></iframe>-->
 <i class="fa fa-file-pdf-o fa-3x m-23-auto" aria-hidden="true"></i>
                      <input type="file" class="form-control border-input file" name="bookpdf" id="bookpdf" >    
  </td>
  <td>
      <input type="submit" class="btn btn-info btn-fill btn-w" id="" value="Edit Book"/>
  </td>
  </tr>

  </tbody>
   </table>
                   </div>
                   </div>
                   </div>
                   </div>
                   </div>                 
                                    
                                           
                                    </div>                                    
                              
                                    <div class="clearfix"></div>
                                </form>
                                   <?php include 'footer.php'; ?>