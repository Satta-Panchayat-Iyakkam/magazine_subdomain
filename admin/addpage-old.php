<?php include 'header.php';
//include_once 'dbconfig.php';
include 'editor.php';
?>
<script>
function validateForm() {
   var w = document.forms["addpagesform"]["booktitle"].value; 
    if (w == "") {
        alert("Book Title must be filled out");
        return false;
    }
 var z = document.forms["addpagesform"]["bookpagesnumber"].value; 
    if (z == "") {
        alert("Book Pages Number must be filled out");
        return false;
    }

   var x = document.forms["addpagesform"]["pagescontent"].value;

    var x = document.forms["addpagesform"]["pagescontent"].value; 
    if (x == "") {
        alert("Book Content must be filled out");
        return false;
    }

  }

</script>
<script type="text/javascript">
$(document).ready(function(){
    $('#booktitle').on('change',function(){
var booktitle = $(this).val();
//alert(booktitle);
$.ajax({
      type: "POST",
                   url: "selectpagebook.php",
                   data: "action=addpageform&booktitle=" + booktitle,
                   dataType: 'json',
                   success: function(data)
                   { 
                    //var json = $.parseJSON(data);
                     var bpages= data[0].booknopages; 
                     for($i=1; $i <= bpages; $i++){
                     // alert($i);
                       $('#booknopages').append($('<option>').text($i).attr('value', $i));
                     }
                     
                 }
                  

               });
    });
     });

</script>
<form id="addpageform" class="addpageform" method="post" action="addpagesajax.php">
  <div class="content">
            <div class="container-fluid">
                <div class="row">                    
                    <div class="col-lg-12 col-md-12">
                        <div class="card m-t-3perc">
                            <div class="header">
                                <h4 class="title">Add Pages</h4>
                            </div>
                            <div class="content">
                                <form name="addpagesform"  action="addpagesajax.php" onsubmit="return validateForm()" method="post"  enctype="multipart/form-data">
                                       <div class="row">
                                        <div class="col-md-6">
                                        <div class="form-group">
                                        <label>Book Title</label>
                                          <?php
$sql= "SELECT * FROM addbook";
$stmt = $db_con->prepare($sql);
$stmt->execute();
$result = $stmt->fetchAll();
//print_r($result);
echo $result['id'];
?>

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
                                         <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Book Pages Number</label>
                           <select name="booknopages" id="booknopages" class="form-control">
 <option value="" >--Select--</option>
   </select>
                                            </div>
                                        </div>                                     
                                        </div>
                                       
                                  
                                   

                          <div class="row">
                                         <div class="col-md-12">
                                            <div class="form-group">                            
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                            <label>Book Content (Page1)</label>
                                          <textarea class="textarea form-control pagescontent" placeholder="Enter text" name="pagescontent" id="pagescontent" style="width: 890px; height: 200px"></textarea>
                                            </div>                                             
                                            </div>
                                        </div>
                                        </div>                                    
                                       
                                    </div>                                    
                                    <div class="text-center">
                    <input type="submit" class="btn btn-info btn-fill btn-w m-b-3perc" id="addpagesbtn" value="Create Pages"/>
                    
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </form>
        
   

    <?php include 'footer.php'; ?>
