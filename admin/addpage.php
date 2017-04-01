<?php include 'header.php';
include_once 'dbconfig.php';
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
                   data: "action=addpageform&booktitle="+booktitle,
                   dataType: 'html',
                   success: function(data)
                   { 
                    //var json = $.parseJSON(data);
                   // alert(data);
                     //var bpages= data[0].booknopages;
                     $('#booknopages').empty(); 
                     for($i=1; $i <= data; $i++){
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
                                         <div class="m-t-2perc">
                                            <div class="form-group">                            
                                            <div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
                                            <label>Book Content (Page1)</label>
                                          <textarea id="pagescontent" name="pagescontent" rows="10" cols="80"></textarea>
                                            </div>                                             
                                            </div>
                                            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3 m-t-5perc">                                           
                                            <div class="text-center">
                    <input type="submit" class="btn btn-info btn-fill btn-w m-b-3perc" id="addpagesbtn" value="Create Pages"/>
                     </div>
                                    </div>
                                        </div>
                                        </div>                                    
                                       
                                    </div>                                    
                                    
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
           </form>
        
<!--<script src="js/jquery-validation/lib/jquery.js"></script>-->

<script src="js/jquery-validation/dist/jquery.validate.min.js"></script>

<script src="js/jquery-validation/dist/additional-methods.js"></script>

<script src="js/tiny_mce/tiny_mce.js"></script>

<script>
  tinyMCE.init({
    mode: "textareas",
    theme : "advanced",
    width: "550",
    height: "400",
    plugins : "autolink,lists,pagebreak,style,layer,table,save,advhr,advimage,advlink,emotions,iespell,inlinepopups,insertdatetime,preview,media,searchreplace,print,contextmenu,paste,directionality,fullscreen,noneditable,visualchars,nonbreaking,xhtmlxtras,template,wordcount,advlist,autosave,visualblocks,jbimages",

    // Theme options
    theme_advanced_buttons1 : "bold,italic,underline,strikethrough,|,justifyleft,justifycenter,justifyright,justifyfull,styleselect,formatselect,fontselect,fontsizeselect",
    theme_advanced_buttons2 : "cut,copy,paste,pastetext,pasteword,|,search,replace,|,bullist,numlist,|,outdent,indent,blockquote,|,undo,redo,|,link,unlink,image,jbimages,cleanup,help,code,|,insertdate,inserttime,preview,|,forecolor,backcolor",

    // Example content CSS (should be your site CSS)
  //  content_css : "{{ asset('assets/admin/css/content.css') }}",

    // Drop lists for link/image/media/template dialogs
    template_external_list_url : "lists/template_list.js",
    external_link_list_url : "lists/link_list.js",
    external_image_list_url : "lists/image_list.js",
    media_external_list_url : "lists/media_list.js",

    // Style formats
    style_formats : [
      {title : 'Bold text', inline : 'b'},
      {title : 'Red text', inline : 'span', styles : {color : '#ff0000'}},
      {title : 'Red header', block : 'h1', styles : {color : '#ff0000'}},
      {title : 'Example 1', inline : 'span', classes : 'example1'},
      {title : 'Example 2', inline : 'span', classes : 'example2'},
      {title : 'Table styles'},
      {title : 'Table row 1', selector : 'tr', classes : 'tablerow1'}
    ],
    relative_urls : false,
    remove_script_host : true,
    document_base_url : "/",
    convert_urls : true, 


    // update validation status on change
    onchange_callback: function(editor) {
      tinyMCE.triggerSave();
      $("#" + editor.id).valid();
    }
  });
  $(function() {
    var validator = $("#addpageform").submit(function() {
      // update underlying textarea before submit validation
      tinyMCE.triggerSave();
    }).validate({
      ignore: "",
      rules: {
        
        pagescontent: "required"
       
      },
      errorPlacement: function(label, element) {
        // position error label after generated textarea
        if (element.is("textarea")) {
          label.insertAfter(element.next());
        } else {
          label.insertAfter(element)
        }
      }
    });
    validator.focusInvalid = function() {
      // put focus on tinymce on submit validation
      if (this.settings.focusInvalid) {
        try {
          var toFocus = $(this.findLastActive() || this.errorList.length && this.errorList[0].element || []);
          if (toFocus.is("textarea")) {
            tinyMCE.get(toFocus.attr("id")).focus();
          } else {
            toFocus.filter(":visible").focus();
          }
        } catch (e) {
          // ignore IE throwing errors when focusing hidden elements
        }
      }
    }
  })
  </script>       
   

    <?php include 'footer.php'; ?>
