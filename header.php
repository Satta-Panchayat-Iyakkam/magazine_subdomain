<?php
include_once 'dbconfig.php';
 ?>
<html>
<title>Satta Panchayat Iyakkam</title>
<head>
<script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- <script src="http://code.jquery.com/jquery-2.1.3.min.js"></script> -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="http://botmonster.com/jquery-bootpag/jquery.bootpag.js"></script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
         <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
<!-- <script src="js/jquery.min.js"></script> -->
<!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script> -->
</head>
<body>
<nav class="navbar navbar-default navmenu m-position nav navbar-fixed-top container navbar-fixed-top col-lg-12 col-sm-12 col-md-12 menu-nav-c">
  <div class="container">
  <div class="row">
  <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">Satta Panchayat Iyakkam</a>
    </div>
    </div>
     </div>
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 m-t-2perc m-320px">
  <a href="index.php">
    <i class="fa fa-home fa-2x font-white pull-left fa-cin" aria-hidden="true" style="color:#fff;"></i>
    </a>
</div>



<div class="hidden-xs col-sm-10 col-md-10 col-lg-10">
<nav class="price-nav-style scroll-to-fixed-fixed pull-right" id="scroll-nav" style="z-index: 1000; position: relative; top: 0px; margin-left: 0px;"> 
 <ul class="pagination page-c">


    <li class="pag_prev numeros">  
    <?php
  $id = $_GET['id'];
  $sql = "select * from addpages where id = '".$id."'";
  $str='';
  $data = $con->query($sql);
  
  ?>

        <?php
        $i = 1;
           if($data!=null && $data->num_rows>0){
   while( $value = $data->fetch_array(MYSQLI_ASSOC)){
        ?>
<a href="#<?php echo $value['pagesid']; ?>"><?php echo $i; ?></a>
<input type="hidden" name="idvalue" id="idvalue" value="<?php echo $value['id']; ?>">
        <?php  $i++; }}  ?>

     </li>
    </ul>

</nav>

</div>


<!--<div class="visible-xs col-sm-10 col-md-10 col-lg-10">
<nav class="price-nav-style scroll-to-fixed-fixed pull-right" id="scroll-nav" style="z-index: 1000; position: relative; top: 0px; margin-left: 0px;"> 
<div class="main">
<div class="navigation">
    
    <a href="#" id="display1" class="display">prev</a>
    <a href="#" id="display" class="display">next</a>
</div>

</nav>

</div>

<script type="text/javascript">
$('div.section').first();

$('a.display').on('click', function(e) {
    e.preventDefault();

      var t = $(this).text(),
      that = $(this);

    if (t === 'next' && $('.current').next('div.section').length > 0) {
        var $next = $('.current').next('.section');
        var top = $next.offset().top;
        
        $('.current').removeClass('current');
      
        $('body').animate({
          scrollTop: top     
        }, function () {
               $next.addClass('current');
        });
  } else if (t === 'prev' && $('.current').prev('div.section').length > 0) {
        var $prev = $('.current').prev('.section');
        var top = $prev.offset().top;
        
        $('.current').removeClass('current');
      
        $('body').animate({
          scrollTop: top     
        }, function () {
               $prev.addClass('current');
        });
  } 
});
</script>-->