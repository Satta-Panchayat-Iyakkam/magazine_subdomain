<!DOCTYPE html>
<html>
  <head>
    <title>Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <link rel="stylesheet" href="css/font-awesome.min.css">
<link href='css/font.css' rel='stylesheet' type='text/css'>
<link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
<link href='css/login.css' rel='stylesheet' type='text/css'>
<script src="js/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript">
   $(function(){   
           $('.submit').click(function(){ 
      //form validation rules
            $("#login-form").validate({
                rules: {
                    username: "required",
                    password: "required"
                   },
                messages: {
                    username: "Required username",
                    password: {
                        required: "Required password",
                        minlength: "Your password must be at least 5 characters long"
                    }                
                },
                submitHandler: function(form) {
                   username=$("#username").val();
      password=$("#password").val();
               $.ajax({  
      type: "POST",
      url:'login.php', 
      data: $("#login-form").serialize()+"&btn=submit", 
      //dataType:'JSON',  
      success: function(html) 
      { 
    //alert (response);
       if(html=='true')    {
        setTimeout('window.location.href = "addbook.php"',1000);
       }
       else
       {    
         $(".invalid-err").html("<strong>Invalid username or password</strong>");            
       }        
      }        
   });
  }
});
});
});  
</script>  
  </head>
  <body>
  <!-- LOGIN FORM -->

  <div class="container">
  <div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12"> 
    <!-- Main Form -->
    <div class="login-form-1">
        <form id="login-form" method="post" action="" class="text-left">
<div class="text-center"><h3 class="brand-color"><strong>Satta Panchayat Iyakkam</strong></h3></div>
           <div class="text-center"><h3 class="brand-color"><strong>Login</strong></h3></div>
           <div class="err" id="add_err"></div>
            <div class="login-form-main-message"></div>
            <div class="main-login-form">
                <div class="login-group">
                    <div class="form-group">
                        <label for="lg_username" class="sr-only">Username</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="username">
                    </div>
                    <div class="form-group">
                        <label for="lg_password" class="sr-only">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="password">
                    </div>                                                 
                </div>
<input type="submit" id="btn-login" name="login-button" class="submit login-button" value="Login"/>
            <div class="row">
                      <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center m-t-5perc">
                      <span class="invalid-err blink_me"></span>
                     </div>
                    </div>   
            </div>   
                
        </form>
    </div>
     </div>
      </div>
       </div>       
    <!-- end:Main Form --> 
  </body>
</html>