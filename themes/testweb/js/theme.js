// JavaScript Document

var $j = jQuery.noConflict();






$j(document ).ready(function() {



	var menuOpen = false

	


         
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
	alert($categoria);

	});	


	var height = $j(".videoWrapper iframe").height()


	$j(".videoCaption").css("height", height);
	
	
	
});

$j(window).scroll(function(){
	

	
});