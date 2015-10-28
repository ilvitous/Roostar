// JavaScript Document

var $j = jQuery.noConflict();






$j(document ).ready(function() {



	var menuOpen = false

	 $j(".openhistory").click(function(e) {
	 	
	 	e.preventDefault();	

	 	$j(this).toggleClass("active");

	 	var history = $j(this).attr("href");

	 	$j("#"+history).slideToggle( "slow", function() {
    // Animation complete.
  		});



	  });
         
   	$j("#mobile-menu").mmenu({
         // options
      }, {
         // configuration
         
      });


	 var api = $j("#mobile-menu").data( "mmenu" );
	 
      
	 api.bind('opened', function () {
     $j("#menu-open").addClass("open");
	 });


      $j("#menu-open").click(function() {
          api.close();
          $j("#menu-open").removeClass("open");
      });  




	$j('.colonna-5').click(function(e){

	e.preventDefault;
	var $categoria = $j(this).attr('data-categoria');
	window.location.href = "index.php?page_id="+$categoria;

	});	


	var height = $j(".videoWrapper iframe").height()


	$j(".videoCaption").css("height", height);
	

	var heightContent = $j("#page-content").height()


	$j(".caption-content").css("height", heightContent);
	
	
});

$j(window).scroll(function(){
	

	
});