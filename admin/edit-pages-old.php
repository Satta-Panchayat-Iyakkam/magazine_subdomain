<?php
include 'header.php';
require_once 'dbconfig.php';
include 'editor.php';
?>

<?php
if(isset($_GET['id'])){
$edit_id = $_GET['id'];
//echo $edit_id;
$stmt= $db_con->prepare("SELECT * FROM addpages WHERE pagesid = :id");
//print_r($stmt);
$stmt->execute(array(':id' => $edit_id));
$result = $stmt->fetch();
$contentsql=$result['content'];
$content=$_POST['content'];
//echo $contentsql;
}
if(isset($_POST['content'])){
$content=$_POST['content'];
//echo $content;
 $stmt = $db_con->prepare("UPDATE addpages SET content=:content WHERE pagesid=:edit_id");
 $stmt->execute(array(":content"=>$content, ":edit_id"=>$edit_id)); 
}
?>
  <form action="" name="addpagesform" method="POST" enctype="multipart/form-data" >
                               <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-12 col-md-12">
                        <div class="card m-t-3perc">
                            <div class="header">
                                <h4 class="title">Edit Book Pages</h4>
                            </div>
                             <div class="panel-body">
                                          <table class="table table-striped">
 <thead>
                    <tr class="bold">  
                                    
                        <th>Book Content</th>
                      <!--  <th>Book Image</th>-->
                <th>Update</th>                      
                    </tr> 
                  </thead>
                 
                   <tbody>
  <tr>
  <td>
   <!--<input type="text" class="form-control border-input" name="pagescontent" id="pagescontent"  value="<?php echo $result['content']; ?>">-->
    <textarea class="textarea form-control pagescontent" placeholder="Enter text" name="content" id="content" style="width: 700px; height: 200px"><?php echo $result['content']; ?></textarea>
  </td> 
  <td>
      <input type="submit" class="btn btn-info btn-fill btn-w" id="" value="Save Changes"/>
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