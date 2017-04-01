<?php include_once "db.php"; 
include_once "header.php";
?>



  </div>
</nav>
<div id="page" class="m-t-10perc page-320px">
<div class="container">
<div class="book1-padding">
<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
<div class="content current" id="page1">


<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-left">
<div id="mhead"></div>
<img id='loading' src='img/loading.gif'>
<div id="demoajax" cellspacing="0">
</div>
</div>
</div>

<div class="clearfix"></div>

</div>     
</div>
</div>
</div>
</div>
</div>
</body>
<?php include('footer.php');?>
<script type="text/javascript" src="script.js"></script>
<script>
$('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if (target.length) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: target.offset().top - 30
        }, 1000);
    }
});


function onScroll(event) {
    var scrollPos = $(document).scrollTop();
    var top = '';
    $('#scroll-nav ul li a').each(function() {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#scroll-nav ul li a').removeClass("active");
            currLink.addClass("active");
        } else {
            currLink.removeClass("active");
        }
    });
}
  //jQuery to collapse the navbar on scroll
$(window).scroll(function() {
    if ($(".navbar").offset().top > 100) {
        $(".navbar-fixed-top").addClass("top-nav-collapse");
    } else {
        $(".navbar-fixed-top").removeClass("top-nav-collapse");
    }
});

//jQuery for page scrolling feature - requires jQuery Easing plugin
$(function() {
    $('a.page-scroll').bind('click', function(event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top
        }, 1500, 'easeInOutExpo');
        event.preventDefault();
    });
});
</script>
</html>