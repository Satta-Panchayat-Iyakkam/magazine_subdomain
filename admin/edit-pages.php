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
$contentsql=$result['pagescontent'];
$content=$_POST['pagescontent'];
//echo $contentsql;
}
if(isset($_POST['pagescontent'])){
$content=$_POST['pagescontent'];
//echo $content;
 $stmt = $db_con->prepare("UPDATE addpages SET content=:content WHERE pagesid=:edit_id");
 $stmt->execute(array(":content"=>$content, ":edit_id"=>$edit_id)); 
   if($stmt=1)
        {
       header("Refresh:0; url=http://localhost/mag-fin/admin/edit-pages.php");
     }

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

    <textarea id="pagescontent" name="pagescontent" rows="10" cols="80"><?php echo $result['content']; ?></textarea>
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
   <script src="js/jquery-validation/lib/jquery.js"></script>

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
    var validator = $("#addpagesform").submit(function() {
      // update underlying textarea before submit validation
      tinyMCE.triggerSave();
    }).validate({
      ignore: "",
      rules: {
        
        content: "required"
       
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