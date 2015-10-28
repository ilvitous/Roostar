<?php
/*
Template Name: Home Page
*/
?>



<?php get_header(); ?>


	
	<!-- homeslider -->
	<section class="section" id="section-1">

	<div class="home-slider">

		<div class="row">

			<div class="colonna-5" id="comunicazione" data-categoria='comnunicazione'>
				<div class="black"></div>
				<div class="hover">
					<div class="categoria-title-container">
						<div class="categoria-title"><h1>COMUNICAZIONE</h1></div>
					</div>
				</div>
			</div>

			<div class="colonna-5" id="eventi" data-categoria='eventi'>
			<div class="black"></div>
				<div class="hover">
					<div class="categoria-title-container">
						<div class="categoria-title"><h1>EVENTI</h1></div>
					</div>
				</div>
			</div>

			<div class="colonna-5" id="allestimenti" data-categoria='allestimenti'>
			<div class="black"></div>
				<div class="hover">
					<div class="categoria-title-container">
						<div class="categoria-title"><h1>ALLESTIMENTI</h1></div>
					</div>
				</div>
			</div>

			<div class="colonna-5" id="vetrinistica" data-categoria='vetrinistica'>
			<div class="black"></div>
				<div class="hover">
					<div class="categoria-title-container">
						<div class="categoria-title"><h1>VETRINISTICA</h1></div>
					</div>
				</div>
			</div>

			<div class="colonna-5" id="ristrutturazioni"data-categoria='ristrutturazioni'>
			<div class="black"></div>
				<div class="hover">
					<div class="categoria-title-container">
						<div class="categoria-title"><h1>RISTRUTTURAZIONI</h1></div>
					</div>
				</div>
			</div>

		</div>
	
		<div style="text-align: center; margin-top: 20px;">
		<img src="<? echo IMAGES_DIR; ?>/scroll.png" width="60px" height="60px;">
		</div>
	</div>
		


	 </section>
	<!-- homeslider -->

<!-- secion-2 -->
	<section class="section" id="section-2">

				

						

									<div class="container">

									<h1 class="wow fadeInUp">RooStar: siamo belle e brave, brave e belle!</h1>
										
										<div class="row">
												

												<div class="col-sm-2">
													<div class="videoCaption">
														<div class="tableWrapper">
															<div class="tableCell">
																	<h2 style="margin-bottom:15px;">
																	Ho fatto la festa della cozza... L'oratorio...ma l'unico posto dove non ho mai fatto chiusura è...
																	La biblioteca!!!</h2>

																	<h3>Braguti Paolo</h3>	
															</div>
														</div>	
													</div>
														
													

												</div>





												<div class="col-sm-6 col-sm-offset-1">
													<div class="videoWrapper">
														<iframe src="https://www.youtube.com/embed/WvrF5i4-ud4" frameborder="0" allowfullscreen></iframe> --> --> -->
													</div>
												</div>

													<div class="col-sm-2 col-sm-offset-1">
													  <div class="videoCaption">
														<div class="tableWrapper">
															<div class="tableCell">
																	<h2 style="margin-bottom:15px;">Alla mattina c'ho una verga...che ci posso ammazzare i topi</h2>
																	<h3>Massimo Bitta Gervasi</h3>	
															</div>
														</div>	
													</div>
														
													

												</div>




										</div>

									</div>

									
									<div class="container-fluid" id="portfolio">

											<h1 class="wow fadeInUp">Portfolio clienti</h1>
													
													<div class="row">

														<div class="touchcarousel  black-and-white" id="portfolio-clienti">
															<ul class="touchcarousel-container">

															<?php
															$temp = $wp_query;
															$wp_query = null;
															$wp_query = new WP_Query( 
															array(
															'post_type' => 'portfolio', 
															'posts_per_page' => -1,  
															'orderby'=> 'date', 
															'order' => 'DESC' ) );
															if ( have_posts() ) : 
															$i=0;
															while ( have_posts() ) : 
															the_post(); 
															++$i;
															$postid =  get_the_ID();

															$image_id = get_post_thumbnail_id();
	 									  					$image_url = wp_get_attachment_image_src($image_id,'full', true);
	 									  					$size = getimagesize($image_url[0]);
										  


															?>
															

																	<li class="touchcarousel-item">

																		<img src="<? echo $image_url[0];?>" width="<? echo $size[0]?>px" height="<? echo $size[1]?>px" />	
																	
																	</li> 

															

															<?php endwhile; endif; ?>
               												<? wp_reset_query();?>
               												</ul>


														</div>
													</div>

													
										
									</div>



						

				
				
	</section>
<!-- secion-2 -->

<script>



    // Init Controller
var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});

new ScrollMagic.Scene({triggerElement: "#section-1"})
					.setTween("#section-1 > .home-slider", {y: "50%", ease: Linear.easeNone})
					.addTo(controller);

		



		$j("#portfolio-clienti").touchCarousel({				
				itemsPerPage: 1,				
				scrollbar: true,
				scrollbarAutoHide: true,
				scrollbarTheme: "dark",				
				pagingNav: false,
				snapToItems: false,
				scrollToLast: false,
				useWebkit3d: true,				
				loopItems: false
			});		
			
</script>




               
<?php get_footer(); ?>