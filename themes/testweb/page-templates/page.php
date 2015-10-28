<?php
/*
Template Name: Pagina Standard
*/
?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 

		$image_id = get_post_thumbnail_id();
		$image_url = wp_get_attachment_image_src($image_id,'full', true);

		$titlePage = strtolower(get_the_title());

?>


<?php get_header(); ?>

	<section class="container-fluid main-image" id="section1">
			
			<div class="absolute-full" id="main-image">
				<img class="absolute-center" src="<? echo $image_url[0];?>">
			</div>

			<h1 class="absolute-center" id="main-title"><? the_title() ?></h1>

	</section>

	<section class="container-fluid main-content">
	<div class="row"><!-- rowpagina -->
		
	

				<div class="container">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<h1 class="wow fadeInUp">Qua ci mettiamo un titolo frizzantino!</h1>
						</div>

						
						<div class="col-sm-2">
													<div class="videoCaption caption-content">
														<div class="tableWrapper">
															<div class="tableCell">
																	<h2 style="margin-bottom:15px;">
																	Questa birra è forte, è doppio malto, rosso malpelo.</h2>

																	<h3>Andrea Zambon</h3>	
															</div>
														</div>	
													</div>
														
													

						</div>


						<div class="col-sm-6 col-sm-offset-1" id="page-content">
							<? the_content(); ?>

						</div>




						<div class="col-sm-2 col-sm-offset-1">
													 <div class="videoCaption caption-content">
														<div class="tableWrapper">
															<div class="tableCell">
																	<h2 style="margin-bottom:15px;">Esco a fumarmi una sigaretta. 
																	Ah, ma ho smesso di fumare. </h2>
																	<h3>Andrea Zambon (XIV Birra)</h3>	
															</div>
														</div>	
													</div>
														
						</div>



					</div>
				</div>

				<!-- gallerybest -->
				<div class="container-fluid" id="portfolio">

											<h1 class="wow fadeInUp">Qua delle foto molto belle dei vostri lavori</h1>
							<div class="row">

														<div class="touchcarousel black-and-white" id="portfolio-clienti">

														<ul class="touchcarousel-container my-gallery">
														<?
														$gallery = new Attachments( 'gallery_attachments' );
														if($gallery->exist()):
															$i=1;
														while( $attachment = $gallery->get() ) :
															$i++;
														$size = getimagesize($gallery->src( 'best-thumb' ));
														$sizeBig = getimagesize($gallery->src( 'full-uploaad' ));
														$imageTitle = $gallery->field( 'title' );
														$imageCaption = $gallery->field( 'caption' );
														$imageSource = $gallery->src( 'full-uploaad' );
														$imageThumb = $gallery->src( 'best-thumb' );
														?>


														
														
														<figure  class="touchcarousel-item gallerythumb" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
								                        <a data-index="<? echo $i; ?>" class="gallerybtn" href="<? echo $imageSource ?>" itemprop="contentUrl" data-size="<? echo $sizeBig[0] ?>x<? echo $sizeBig[1] ?>">
								                        <img src="<? echo $imageThumb; ?>" width="<? echo $size[0]?>px" height="<? echo $size[1]?>px" itemprop="thumbnail" alt="<? echo $imageTitle ?>" />
								                        </a>
								                        <figcaption itemprop="caption description"><? echo $title ?></figcaption>
														</figure>	
														
														


														<?
														endwhile;
														endif;
														?>




														</ul>
														</div>

							</div>							
				</div>
				<!-- gallerybest -->


				<!-- casehistory -->
				<div class="container">

						<h1 class="wow fadeInUp">Case History</h1>



						<?php
						$temp = $wp_query;
						$wp_query = null;
						$wp_query = new WP_Query( 
						array(
						'post_type' => 'casehistory', 
						'posts_per_page' => -1,  
						'orderby'=> 'date',
						'history-tax' => $titlePage, 
						'order' => 'DESC' ) );
						if ( have_posts() ) : 
						$i=0;
						while ( have_posts() ) : 
						the_post(); 
						++$i;
						$postid =  get_the_ID();
						?>
						
						 
						

						<div class="row casehistory wow fadeInUp">
						
						
						<div class="col-md-8 col-md-offset-2">
						<div class="row">
									
												
												<div class="col-xs-11 col-sm-11 col-md-11 col-lg-11">
												<h2><? the_title() ?></h2>	
												</div>


												<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
												<a href="<? echo get_the_ID();?>" class="openhistory"></a>
												</div>


						</div>
						<div class="titleHistory full"></div>

						<div class="row">
							
									<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 history-content" id="<? echo get_the_ID();?>">
									<? the_content() ?>
									
									<div class="row my-gallery" style="margin-top: 30px; margin-bottom: 30px">
										
									
									<?
									$gallery = new Attachments( 'gallery_attachments' );
									
									if($gallery->exist()):
									while( $attachment = $gallery->get() ) :
									$i++;
									$imageSource = $gallery->src( 'full' );
									$imageSourceNav = $gallery->src( 'square-thumb' );
									$imageTitle = $gallery->field( 'title' );
									$imageSpan = $gallery->field( 'caption' );
									$size = getimagesize($gallery->src( 'full-uploaad' ));
									
									?>

									<figure class="col-md-3 thumbGallery" itemprop="associatedMedia" itemscope itemtype="http://schema.org/ImageObject">
			                        <a class="gallerybtn"  href="<? echo $imageSource ?>" itemprop="contentUrl" data-size="<? echo $size[0] ?>x<? echo $size[1] ?>">
			                        <img src="<? echo $imageSourceNav?>" itemprop="thumbnail" alt="<? echo $imageTitle ?>" />
			                        </a>
			                        <figcaption itemprop="caption description"><? echo $title ?></figcaption>
			                        </figure>

			                        <?	endwhile;
									endif;
									?>
    
									</div>



									</div>


						</div>
						</div>
						</div>


						<?php endwhile; endif; ?>
						 <? wp_reset_query();?>
						
					
				</div>
				<!-- casehistory -->
		
	</div><!-- rowpagina -->
	</section>
	








   <?php endwhile; endif; ?>
                <? wp_reset_query();?> 


                <script>



    // Init Controller
var controller = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "onEnter", duration: "200%"}});

new ScrollMagic.Scene({triggerElement: "#section1"})
					.setTween("#section1 > #main-image", {y: "80%", ease: Linear.easeNone})

					.addTo(controller);	


var controllerOpacity = new ScrollMagic.Controller({globalSceneOptions: {triggerHook: "#main-image", duration: "100%"}});

new ScrollMagic.Scene({triggerElement: "#main-image"})
					.setTween("#main-image > img", {opacity: "0", ease: Linear.easeNone})
.addTo(controllerOpacity);	


new ScrollMagic.Scene({triggerElement: "#section1"})
					.setTween("#section1 > .absolute-center", {opacity: "0", ease: Linear.easeNone})
.addTo(controllerOpacity);	


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
            


<!-- Root element of PhotoSwipe. Must have class pswp. -->
<div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

    <!-- Background of PhotoSwipe. 
         It's a separate element, as animating opacity is faster than rgba(). -->
    <div class="pswp__bg"></div>

    <!-- Slides wrapper with overflow:hidden. -->
    <div class="pswp__scroll-wrap">

        <!-- Container that holds slides. PhotoSwipe keeps only 3 slides in DOM to save memory. -->
        <!-- don't modify these 3 pswp__item elements, data is added later on. -->
        <div class="pswp__container">
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
            <div class="pswp__item"></div>
        </div>

        <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
        <div class="pswp__ui pswp__ui--hidden">

            <div class="pswp__top-bar">

                <!--  Controls are self-explanatory. Order can be changed. -->

                <div class="pswp__counter"></div>

                <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

              

                <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                <!-- Preloader demo http://codepen.io/dimsemenov/pen/yyBWoR -->
                
                <div class="pswp__preloader">
                    <div class="pswp__preloader__icn">
                      <div class="pswp__preloader__cut">
                        <div class="pswp__preloader__donut"></div>
                      </div>
                    </div>
                </div>
            </div>

            <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                <div class="pswp__share-tooltip"></div> 
            </div>

            <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
            </button>

            <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
            </button>

            <div class="pswp__caption">
                <div class="pswp__caption__center"></div>
            </div>

          </div>

        </div>

</div>  
                              
<?php get_footer(); ?>




