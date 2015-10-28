<?
define("THEME_DIR", get_template_directory_uri());

define("IMAGES_DIR", get_template_directory_uri().'/images/');

define("BLOG_URL", get_site_url());

require_once('BFI_Thumb.php');



/*--- REMOVE GENERATOR META TAG ---*/
remove_action('wp_head', 'wp_generator');
// ENQUEUE STYLES
     


function theme_load_styles() {
	if (!is_admin()) {
		
		wp_enqueue_style('main', get_template_directory_uri() . '/style.css');
		wp_enqueue_style('bootstrap', get_template_directory_uri() . '/bootstrap/css/bootstrap.css');
		wp_enqueue_style('layout', get_template_directory_uri() . '/css/layout.css');
    wp_enqueue_style('mmenu', get_template_directory_uri() . '/css/jquery.mmenu.all.css');
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');

    wp_enqueue_style('touchcarousel', get_template_directory_uri() . '/js/touchcarousel/touchcarousel.css');
    wp_enqueue_style('black-and-white-skin', get_template_directory_uri() . '/js/touchcarousel/black-and-white-skin/black-and-white-skin.css');

    wp_enqueue_style('photoswipe', get_template_directory_uri() . '/js/photoswipe/photoswipe.css');
    wp_enqueue_style('photoswipe-skin', get_template_directory_uri() . '/js/photoswipe/default-skin/default-skin.css');


	}
}
add_action('get_header', 'theme_load_styles');

  




// LOAD JQUERY
function add_google_jquery() {
   if ( !is_admin() ) {
      wp_deregister_script('jquery');
      wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false);
      wp_enqueue_script('jquery');
   }
}
add_action('wp_print_scripts ', 'add_google_jquery');

     
// ENQUEUE SCRIPTS
     
function enqueue_scripts() {
        
    /** REGISTER HTML5 Shim **/
    wp_register_script( 'html5-shim', 'http://html5shim.googlecode.com/svn/trunk/html5.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'html5-shim' );
         
    /** REGISTER HTML5 OtherScript.js **/
    
	   wp_register_script( 'custom-script', THEME_DIR . '/js/theme.js', array( 'jquery' ), '1', false );
      wp_enqueue_script( 'custom-script' );
	
	wp_register_script( 'modernizr', THEME_DIR . '/js/modernizr.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'modernizr' );

    wp_register_script( 'mmenu', THEME_DIR . '/js/jquery.mmenu.min.all.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'mmenu' );

     wp_register_script( 'wow', THEME_DIR . '/js/wow.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'wow' );

    wp_register_script( 'jquery.touchcarousel', THEME_DIR . '/js/touchcarousel/jquery.touchcarousel-1.2.min.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'jquery.touchcarousel' );
	  

    wp_register_script( 'queryloader2', THEME_DIR . '/js/queryloader2.min.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'queryloader2' );      


    wp_register_script( 'photoswipe', THEME_DIR . '/js/photoswipe/photoswipe.min.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'photoswipe' );  

    wp_register_script( 'photoswipe-ui', THEME_DIR . '/js/photoswipe/photoswipe-ui-default.min.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'photoswipe-ui' );   

    wp_register_script( 'gallery', THEME_DIR . '/js/gallery.js', array( 'jquery' ), '1', false );
    wp_enqueue_script( 'gallery' );          



}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );


function pw_load_scripts() {
	wp_localize_script('custom-script', 'custom_vars', array(
			'templateUrl' => get_template_directory_uri(),
			'blogUrl' => get_site_url(),
		)
	);
}
add_action('wp_enqueue_scripts', 'pw_load_scripts');


//THEME SUPPORT
add_theme_support( 'post-thumbnails' );

function register_my_menus() {
register_nav_menus(
array(
'main-home' => __( 'Main Menu Home' ),
)
);
}

add_action( 'init', 'register_my_menus' );

add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
     if( in_array('current-menu-item', $classes) ){
             $classes[] = 'active ';
     }
     return $classes;
}


add_theme_support('category-thumbnails');


//ATTACHMENT

add_filter( 'attachments_default_instance', '__return_false' ); // disable the default instance



function gallery_attachments( $attachments )
{
  $fields         = array(
    array(
      'name'      => 'title',                         // unique field name
      'type'      => 'text',                          // registered field type
      'label'     => __( 'Title', 'attachments' ),    // label to display
      'default'   => 'title',                         // default value upon selection
    ),
    array(
      'name'      => 'caption',                       // unique field name
      'type'      => 'text',                      // registered field type
      'label'     => __( 'Caption', 'attachments' ),  // label to display
      'default'   => 'caption',                       // default value upon selection
    ),
	
);

  $args = array(

    // title of the meta box (string)
    'label'         => 'Gallery',

    // all post types to utilize (string|array)
    'post_type'     => array('page', 'casehistory'),

    // meta box position (string) (normal, side or advanced)
    'position'      => 'normal',

    // meta box priority (string) (high, default, low, core)
    'priority'      => 'high',

    // allowed file type(s) (array) (image|video|text|audio|application)
    'filetype'      => null,  // no filetype limit

    // include a note within the meta box (string)
    'note'          => 'Images Gallery',

    // by default new Attachments will be appended to the list
    // but you can have then prepend if you set this to false
    'append'        => true,

    // text for 'Attach' button in meta box (string)
    'button_text'   => __( 'Add Images', 'images' ),

    // text for modal 'Attach' button (string)
    'modal_text'    => __( 'Add Images', 'images' ),

    // which tab should be the default in the modal (string) (browse|upload)
    'router'        => 'browse',

    // whether Attachments should set 'Uploaded to' (if not already set)
    'post_parent'   => false,

    // fields array
    'fields'        => $fields,

  );

  $attachments->register( 'gallery_attachments', $args ); // unique instance name
}

add_action( 'attachments_register', 'gallery_attachments' );



// IMAGE
add_action( 'after_setup_theme', 'baw_theme_setup' );
function baw_theme_setup() {
	  add_image_size( 'square-thumb', 400, 400, true );

    add_image_size( 'best-thumb', 9999, 200);

    add_image_size( 'full-uploaad', 2000, 2000);

}



/*CUSTOM POST*/

function my_custom_post_portfolio() {
  $labels = array(
    'name'               => _x( 'Portfolio', 'post type general name' ),
    'singular_name'      => _x( 'Portfolio', 'post type singular name' ),
    'add_new'            => _x( 'Add new Portfolio', 'Work' ),
    'add_new_item'       => __( 'Add new Portfolio' ),
    'edit_item'          => __( 'Edit Portfolio' ),
    'new_item'           => __( 'New Portfolio' ),
    'all_items'          => __( 'All Portfolios' ),
    'view_item'          => __( 'View Portfolio' ),
    'search_items'       => __( 'Search Portfolio' ),
    'not_found'          => __( 'No Portfolio found' ),
    'not_found_in_trash' => __( 'No Portfolio found in trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Portfolio Clienti',

  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Works',
    'public'        => true,
    'publicly_queryable'   => false,
    'menu_position' => 2,
    'supports'      => array( 'title','thumbnail'),
    'has_archive'   => 'true',
    'menu_icon' => get_bloginfo('template_directory').'/images/portfolioCP.png',
  


          

  );
  register_post_type( 'portfolio', $args ); 
}

add_action( 'init', 'my_custom_post_portfolio' );


function my_custom_post_casehistory() {
  $labels = array(
    'name'               => _x( 'Case History', 'post type general name' ),
    'singular_name'      => _x( 'Case History', 'post type singular name' ),
    'add_new'            => _x( 'Add new Case History', 'Work' ),
    'add_new_item'       => __( 'Add new Case History' ),
    'edit_item'          => __( 'Edit Case History' ),
    'new_item'           => __( 'New Case History' ),
    'all_items'          => __( 'All Case History' ),
    'view_item'          => __( 'View Case History' ),
    'search_items'       => __( 'Search Case History' ),
    'not_found'          => __( 'No Case History found' ),
    'not_found_in_trash' => __( 'No Case History found in trash' ), 
    'parent_item_colon'  => '',
    'menu_name'          => 'Case History',

  );
  $args = array(
    'labels'        => $labels,
    'description'   => 'Case History',
    'public'        => true,
    'publicly_queryable'   => false,
    'menu_position' => 2,
    'supports'      => array( 'title','thumbnail', 'editor'),
    'has_archive'   => 'true',
    'menu_icon' => get_bloginfo('template_directory').'/images/portfolioCP.png',
  


          

  );
  register_post_type( 'casehistory', $args ); 
}

add_action( 'init', 'my_custom_post_casehistory' );


function create_news_taxonomies() {
    register_taxonomy(
        'history-tax',
        array('casehistory'),
        array(
            'labels' => array(
                'name' => 'Categorie',
                'add_new_item' => 'Aggiungi nuova categoria',
                'new_item_name' => "Nuova categoria informazione"
            ),
            'show_ui' => true,
            'show_tagcloud' => false,
            'hierarchical' => true
        )
    );
}
add_action( 'init', 'create_news_taxonomies' );


/*CUSTOM POST*/



//SAVE META

function wpt_save_events_meta($post_id, $post) {

	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['eventmeta_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;

	// OK, we're authenticated: we need to find and save the data
	// We'll put it into an array to make it easier to loop though.
	
	

	
	// Add values of $events_meta as custom fields

	foreach ($events_meta as $key => $value) { // Cycle through the $events_meta array!
		if( $post->post_type == 'revision' ) return; // Don't store custom data twice
		$value = implode(',', (array)$value); // If $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { // If the custom field already has a value
			update_post_meta($post->ID, $key, $value);
		} else { // If the custom field doesn't have a value
			add_post_meta($post->ID, $key, $value);
		}
		if(!$value) delete_post_meta($post->ID, $key); // Delete if blank
	}

}

add_action('save_post', 'wpt_save_events_meta', 1, 2); // save the custom fields


