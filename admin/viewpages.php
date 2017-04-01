<?php include 'header.php';
include_once 'dbconfig.php';
?>

<form action="viewpages.php" method="post">

<div class="container-fluid">
                                
                    <div class="col-lg-12 col-md-12 m-t-3perc">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Select Book</h4>
                            </div>
                            <div class="content">
                            <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
							<?php
							
$sql= "SELECT * FROM addbook";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
							?>
                                        <label>Book Title</label>
<select name="booktitle" id="booktitle" class="form-control">
 <option value="" >--Select--</option>
<?php
      foreach($result as $row)

{
?>

 <option value="<?php echo $row['id'];?>"><?php echo ($row['booktitle']);?></option>

                                    <?php
}
  ?>
   </select>
  </div>
   </div>
      <div class="col-md-4 m-t-2perc">
         <div class="form-group">
         <input type="submit" class="btn btn-info btn-fill btn-w m-b-3perc m-t-3perc" value="View Pages">
   </div>
      </div>
     </div>
       </div>
         </div>

   </div>
  <?php
if($_POST)
{
 $booktitle = $_POST['booktitle'];
//echo $bookid;
$sql= $db_con->prepare("SELECT * FROM addbook as book LEFT JOIN addpages as pages on book.id = pages.id WHERE book.id = '".$booktitle."'");

$sql->execute();
$result = $sql->fetchAll();

//print_r($result);
//echo json_encode($result);

  //echo json_encode($result);
  //response()->json(array('success' => true, 'result' => $result));
//echo $result['content'];
?>
<div>
<?php //echo $result['content'];	?>
</div>
<div class="container-fluid">   
<div class="row">                            
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title text-center">Pages List</h4>
                            </div>
                            

                             <div class="panel-body">

  <table class="table table-striped" id="fetchtbl">
 <thead>
                    <tr class="bold">
                                    
                        <th class="text-center">Book Pages</th>               
                        <th class="text-center">Delete</th>
                         <th class="text-center">Edit</th>
                    </tr> 
                  </thead>
                  <?php
                  foreach($result as $sql)
{
?>
              <tbody>
  <tr>
  <td class="m-auto text-center" name="content" id>
  <!--<?php // echo $sql['content'];?>-->
  <?php  echo substr ($sql['content'], 0, 50);?>
  </td>
  <td class="m-auto text-center">
<a href="viewpages.php?id=<?=$sql['pagesid']; ?>" id="delete">
<img src="images/delete.png" class="img-responsive img-size-30px m-auto">
</a>
  </td>
  <td class="m-auto text-center">
<a href="edit-pages.php?id=<?=$sql['pagesid']; ?>" id="edit">
<img src="images/edit.png" class="img-responsive img-size-30px m-auto">
</a>
  </td>
  </tr>
  </tbody>
 <?php
}
?>
  </table>
  </div>
</div>
</div>
</div>
</div>
</div>
</div>
<?php
}
?>
   </form>
    <!---delete form -->
      <form action="" method="POST" enctype="multipart/form-data" name="deleteform" id="deleteform">
    <?php
$sql= "SELECT * FROM addpages";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
 ?>

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
 $stmt = $db_con->prepare("DELETE FROM addpages WHERE pagesid = :id");
        //$q = $this->pdo->prepare($sql);
 //print_r($stmt);
        $stmt->execute(array(':id' => $delete_id));
    //         $url='http://localhost/admin/addbook.php';
    // header('Location: '.$url);
        if($stmt=1)
        {
         $url='http://systimanx.xyz/mag/admin/addpage.php';
     header('Location: '.$url);

      }
}


?>

    <?php include 'footer.php'; ?>