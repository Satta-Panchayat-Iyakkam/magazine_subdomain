<?php
include('db.php');

 if(isset($_REQUEST['actionfunction']) && $_REQUEST['actionfunction']!=''){
$actionfunction = $_REQUEST['actionfunction'];
  
   call_user_func($actionfunction,$_REQUEST,$con,$limit);
}
function showData($data,$con,$limit){

  $page = $data['page'];
  $id = $data['id'];
   if($page==1){
   $start = 0;  
  }
  else{
  $start = ($page-1)*$limit;
  }
  
  $sql = "select * from addpages where id = '".$id."' order by id asc limit $start,$limit";
  $str='';
  $data = $con->query($sql);
  if($data!=null && $data->num_rows>0){
   while( $row = $data->fetch_array(MYSQLI_ASSOC)){
$str.="<div class='data-container' data-pagenumber=".$row['bookpagesnumber']."><p>".$row['content']."</p></div>  
        <div class='pageCounter'> <span id='pageCounterNumber'></span></div>";
  }
   $str.="<input type='hidden' class='nextpage' value='".($page+1)."'><input type='hidden' class='isload' value='true'><input type='hidden' name='idvalue' class='nextid' id='idvalue' value='".$id."'>";
   }else{
    $str .= "<input type='hidden' class='isload' value='false'><p>Finished</p>";
   }
  
   
echo $str; 

}

?>
<style type="text/css">
@media (min-width:320px) and (max-width:769px){
 .pageCounter {
  position: fixed;
  bottom: 0;
  right: 6px;
  background-color: rgb(0, 150, 255);
  color: white;
  padding: 0px;
  font-size: 30px;
}
}
</style>
<script type="text/javascript">
  // ---------------------------------
// PageCounter object
//
// To start execute ScrollingPageTracker.init(pageNumberAttribute, pageChangeCallback)
//
// Also available: Scrolling PageTracker.getCurrentPageNumber()
// ---------------------------------
var ScrollingPageTracker = {
  // All pages
  // Each index is an object with two properties:
  //
  // 'elem' -> a jQuery wrapped reference to the page element (not used unless _updatePageOnScreen() is updated as described in the comments above it)
  //
  // 'topPos' -> How many pixels from the top of the document that this element begins
  _pages: [],

  // Number of current page in view
  _currentPageNumber: 1,

  // jQuery elements of all pages
  _pageElems: null,

  _winElem: $(window),

  // A page is accepted as the currentPage when its top is within this distance from top of the viewport
  _pageInViewOffset: null,
  
  _pageChangeCallback: null,
  
  _pageNumberAttribute: null,

  _updatePageInViewOffset: function() {
    this._pageInViewOffset = this._winElem.height() / 4;
  },

  // Function to update 'pages' array
  _updatePages: function() {
    this._pageElems = $('[' + this._pageNumberAttribute + ']');
    
    var i;
    var numPageElems = this._pageElems.length;
    var pageInLoop;
    var pageInLoopNumber;
    
    for (i = 0; i < numPageElems; i++) {
      pageInLoop = this._pageElems.eq(i);
      pageInLoopNumber = pageInLoop.attr(this._pageNumberAttribute);
    
      this._pages[pageInLoopNumber] = {
        elem: pageInLoop,
        topPos: pageInLoop.offset().top
      };
    }
  },

  // Function to determine page on the screen
  // NOTE: This needs to be executed every time pages are added
  // NOTE2: It assumes the positions of pages are fixed. If they are not, change this:
  //
  // pages[i].topPos
  //
  // to this:
  //
  // pages[i].elem.offset().top
  _updatePageOnScreen: function() {
    var numPages = this._pages.length;
    var i;
    var docViewTop = this._winElem.scrollTop();

    for (i = numPages - 1; i >= 0 ; i--) {
      //console.log('pages[' + i + '].topPos = ' + pages[i].topPos + ', docViewTop = ' + docViewTop + ',  pageInViewOffset = ' +  pageInViewOffset); 
    
      if (this._pages[i].topPos < (docViewTop + this._pageInViewOffset)) {
        this._setPageNumber(i);
        break;
      }
    } 
  },
  
  _setPageNumber: function(newPageNumber) {
    if (newPageNumber !== this._currentPageNumber)
    {
      this._pageChangeCallback(newPageNumber);
    }
    
    this._currentPageNumber = newPageNumber;
  },
  
  getCurrentPageNumber: function() {
    return this._currentPageNumber
  },

  // Set current page on initial load
  // Make sure to test the following scenarios:
  // a) Scroll down past the first page and press refresh
  // b) Scroll down past the first page, navigate away, then press back
  // Initialise the page tracker
  //
  // pageNumberAttribute: The attribute name that stores the page numbers
  // pageChangeCallback: A function that is called upon the page number changing. The new page number is passed as an argument
  init: function(pageNumberAttribute, pageChangeCallback) {
    this._pageChangeCallback = pageChangeCallback;
    this._pageNumberAttribute = pageNumberAttribute;
    
    this._updatePageInViewOffset(); 
    this._updatePages();
    this._updatePageOnScreen(); 
    
      // Listener to update pageInViewOffset on window resize
    this._winElem.on('resize', function(e) {
      ScrollingPageTracker._updatePageInViewOffset();
      ScrollingPageTracker._updatePages();
      ScrollingPageTracker._updatePageOnScreen();
    }); 

    // Listener to reset page number on scroll
    this._winElem.on('scroll', function(e) {
      ScrollingPageTracker._updatePageOnScreen();
    });
  }
  
}; 

// ---------------------------------
// Setup
// ---------------------------------
// Handling display of page counter
var pageCounterDisplayElem = $('#pageCounterNumber');

var updatePageCounter = function(pageNumber) {
  pageCounterDisplayElem.text(pageNumber);
  console.log('Page number updated to: ' + pageNumber);
};

// ---------------------------------
// Usage
// ---------------------------------
ScrollingPageTracker.init('data-pagenumber', updatePageCounter);

// Set initial page
updatePageCounter(ScrollingPageTracker.getCurrentPageNumber());
</script>
</html>