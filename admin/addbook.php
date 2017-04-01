<?php include 'header.php';
include_once 'dbconfig.php';
?>
<script>
function validateForm() {
    var x = document.forms["addbookform"]["booktitle"].value; 
    if (x == "") {
        alert("book title must be filled out");
        return false;
    }
   var y = document.forms["addbookform"]["bookimage"].value;
if(y == "")
{
alert("select File!");
return false;
}

var y = document.addbookform.elements["bookimage"].value;   
  var extension = y.substr(y.lastIndexOf('.') + 1).toLowerCase();
  var allowedExtensions = ['png', 'jpg', 'jpeg'];
  if (y.length > 0)
     {
          if (allowedExtensions.indexOf(extension) === -1) 
             {
               alert('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed.');
               return false;
             }
    }
  var z = document.forms["addbookform"]["bookpdf"].value;
if(z == "")
{
alert("select pdf file!");
return false;
}

var z = document.addbookform.elements["bookpdf"].value;   
  var extension = z.substr(z.lastIndexOf('.') + 1).toLowerCase();
  var allowedExtensions = ['pdf'];
  if (z.length > 0)
     {
          if (allowedExtensions.indexOf(extension) === -1) 
             {
               alert('Invalid file Format. Only ' + allowedExtensions.join(', ') + ' are allowed.');
               return false;
             }
    }
/*  File f = new File(z);
if(f.exists()){alert('already exits');}*/
  }

</script>


  <?php
$sql= "SELECT * FROM year";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>

  <div class="content">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Book</h4>
                            </div>
                            <div class="content">
                                <form name="addbookform"  action="addbookajax.php" onsubmit="return validateForm()" method="post"  enctype="multipart/form-data">
                                        <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Book Title</label>
                                                <input type="text" class="form-control border-input" name="booktitle" id="booktitle" placeholder="Book Title" >
                                            </div>
                                        </div>
                                         <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Book Year</label>
                                                <select name="bookyear" id="bookyear" class="form-control">
                <option value="">--Select--</option>
                                                <?php
                                                foreach($result as $row)
                                            {
                                            ?>
                                              <option value="<?php echo $row['year']; ?>"><?php echo $row['year']; ?></option>  
                                                <?php }?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label>Book No of Pages</label>
                                                <input type="text" class="form-control border-input" name="booknopages" id="booknopages" placeholder="Book No of Pages" >
                                            </div>
                                        </div> 
                                        </div>                                         
                                                                                  
                                       
                          <div class="row">
                           <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book Image</label>
                                                <div id="selectImage" class="Uploadbtn">
                                                <input type="file" class="form-control border-input file border-solid input-upload" name="bookimage" id="bookimage" >
                                                 <span>Upload Cove Page</span>
                                                </div>
                                                 </div>
                                                    </div>
                                                    
                          <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book pdf</label>
                                                <div id="selectImage" class="Uploadbtn1">
                                                <input type="file" class="form-control border-input file border-solid input-upload1" name="bookpdf" id="bookpdf" >
                                                 <span>Upload PDF</span>
                                                </div>
                                                 </div>
                                                    </div>
                                                    </div>
                                                     </div>
                                                        <div class="text-center">
                    <input type="submit" class="btn btn-info btn-fill btn-w m-b-3perc" id="addbookbtn" value="Add Book"/>
                    
                                    </div>
                                       
                                    </div>                                    
                                 
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
               
           
        
    
    <!---delete form -->
      <form action="" method="POST" enctype="multipart/form-data" name="deleteform" id="deleteform">
    <?php
$sql= "SELECT * FROM addbook";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
?>
<div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Book List</h4>
                            </div>
                             <div class="panel-body">

  <table class="table table-striped table-bordered" id="addbook">
 <thead>
                    <tr class="bold">
                                    
                        <th class="text-center">Book Title</th>
                        <th class="text-center">Book Year</th>
                        <th class="text-center">Book No Of Pages</th>
                        <th class="text-center">Book Image</th>
                        <th class="text-center">Book PDF</th>
                        <th class="text-center">Delete</th>
                         <th class="text-center">Edit</th>
                    </tr> 
                  </thead>
  
 
                  <tbody>
                                  <?php
foreach($result as $row)
{
?>
  <tr>
  <td class="m-auto text-center">
  <?php echo $row['booktitle']; ?>
  </td>
   <td class="m-auto text-center">
  <?php echo $row['year']; ?>
  </td>
   <td class="m-auto text-center">
  <?php echo $row['booknopages']; ?>
  </td>
  <td class="m-auto text-center">
<img src="<?php echo $row['bookimage'];?>" width="50" height="50" />
  </td>
  <td class="m-auto text-center">
<!--<iframe src="<?php// echo $row['bookpdf']?>" width="100%" style="height:100%"></iframe>-->
<i class="fa fa-file-pdf-o fa-3x m-auto" aria-hidden="true"></i>
  </td>
  <td class="m-auto text-center">
<a href="addbook.php?id=<?=$row['id']; ?>" id="delete">
<img src="images/delete.png" class="img-responsive img-size-30px m-auto">
</a>
  </td>
  <td class="m-auto text-center">
<a href="edit-book.php?id=<?=$row['id']; ?>" id="edit">
<img src="images/edit.png" class="img-responsive img-size-30px m-auto">
</a>
  </td>
  </tr>
  
  <?php
}
?>
  </tbody>

  </table>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
 </div>

<input type="hidden" id="delete_id" name="delete_id"/>
</form>
<?php
if(isset($_GET['id'])){
$delete_id = $_GET['id'];
//$sql = 'DELETE FROM addbook WHERE id = :delete_id';
 $stmt = $db_con->prepare("DELETE FROM addbook WHERE id = :id");
        //$q = $this->pdo->prepare($sql);
 //print_r($stmt);
        $stmt->execute(array(':id' => $delete_id));
    //         $url='http://localhost/admin/addbook.php';
    // header('Location: '.$url);
        if($stmt=1)
        {
       header("Refresh:0; url=http://localhost/admin/addbook.php");

      }
}


?>

    <?php include 'footer.php'; ?>
