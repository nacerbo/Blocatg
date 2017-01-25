<?php
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * Create your own blocatg_setup() function to override in a child theme.
 *
 * @since blocatg 0.1 Alpha
 */
class blocatgSetup {

  // theme textDomain
  protected $theme_textdomain;

  //add suport array of 2 indexed arrays
  protected $supports;

  /**
  * post main thumbnail size array of 2 indexs
  */
  protected $thumbnail_size;

  /**
  * image thumbnail sizes array of 2 indexed arrays
  */
  protected $image_sizes;

  /**
  * adding menus positions array of 2 indexed arrays
  */
  protected $nav_menus;

  function __construct($theme_text){
    $this->theme_textdomain( $theme_text );
    $this->thumbnail_size = array('width' => 500, 'height' => 359);
    $this->image_sizes = array(array('bc-single',           735, 530, true ),
                               array('bc-slide' ,           500,  359, true ),
                              );
    // add menus
    $menus = array(
  		'primary'    => __( 'Primary Menu' ,     $this->theme_textdomain ),
  	);
    register_nav_menus($menus);
    add_action( 'after_setup_theme', array( $this, 'blocatg_setup' ) );
  }
  /**
  * handel the load_theme_textdomain function
  */
  public function theme_textdomain($theme_text){
    $this->theme_textdomain = (string) $theme_text;
  }
  /**
  * handel the add_theme_support function in loop foreach
  *
  */
  private function add_theme_supports(){
    // to add new suppport element just add new array push in the end array_push($supports_array, $support_autom_feed ...
    $supports_array = array();
    // add theme support 'automatic-feed-links'
    $support_autom_feed = 'automatic-feed-links';
    // add theme support 'title-tag'
    $support_title = 'title-tag';
    // add theme support 'custom-logo'
    $support_logo = array('custom-logo' => array('height'      => 130,
                                              	 'width'       => 130,
                                              	 'flex-height' => true,
                                                ),
                          );
    // add theme support 'post-thumbnails'
    $support_thumbnails = 'post-thumbnails';
    // add theme support 'HTML-5'
    $support_html5 = array('html5' => array('search-form',
                                        		'comment-form',
                                        		'comment-list',
                                        		'gallery',
                                        		'caption',
                                            ),
                          );
    // add theme support 'post-formats'
    $support_formats = array('post-formats' => array(
                                                        'image',
                                                        'quote',
                                                        'gallery',
                                                        'audio',
                                                    ),
                          );

    array_push($supports_array, $support_autom_feed, $support_title, $support_logo, $support_thumbnails, $support_html5, $support_formats);
    // set the $supports var a value
    $this->supports = $supports_array;
    foreach ($this->supports as $support) {
      if(is_array($support)):
        add_theme_support(key($support), $support[key($support)]);
      else:
        add_theme_support($support);
      endif;
    }
  }
  /**
  * handel the hook
  */
  public function blocatg_setup(){
    load_theme_textdomain( $this->theme_textdomain );
    foreach ($this->image_sizes as $image_size) {
      add_image_size($image_size[0], $image_size[1], $image_size[2], $image_size[3]);
    }
    $this->add_theme_supports();
  }

}

$bctheme = new blocatgSetup('blocatg');

/**
 * Enqueues scripts and styles.
 *
 * @since blocatg 0.1 Alpha
 */
function blocatg_scripts() {
  // Theme stylesheet.
	wp_enqueue_style( 'blocatg-style', get_stylesheet_uri() );
  // Theme stylesheet.
    wp_enqueue_style( 'blocatg-owl-style', get_template_directory_uri() . '/assets/css/owl.carousel.css' );
  // Theme stylesheet.
    wp_enqueue_style( 'blocatg-font', 'https://fonts.googleapis.com/css?family=Raleway' );

  /*------------------------------------------------------------------------------------*/
  wp_deregister_script('jquery');
  wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
  // FontAwesome Js file
  wp_enqueue_script( 'blocatg-FontAwesome-script', 'https://use.fontawesome.com/b9139bcffb.js', array( ), '', true );
  // owl carousel Js file
  wp_enqueue_script( 'blocatg-owl-script', get_template_directory_uri() . '/assets/js/owl.carousel.min.js', array( 'jquery' ), '', true );
  // Theme Main Js code
  wp_enqueue_script( 'blocatg-script', get_template_directory_uri() . '/assets/js/blocatg.js', array( 'jquery', 'blocatg-owl-script'), '0.1', true );

}
add_action( 'wp_enqueue_scripts', 'blocatg_scripts' );

// Soundcloud oEmbed
function add_oembed_soundcloud(){
    wp_oembed_add_provider( 'http://soundcloud.com/*', 'http://soundcloud.com/oembed' );
}
add_action('init','add_oembed_soundcloud');

//metabox prefix 
define('MB_PREFIX', 'blocatg_') ;
//MetaBox files
define( 'RWMB_DIR', get_template_directory() . '/meta-box/' );
define( 'RWMB_URL', get_template_directory_uri() . '/meta-box/' );
require_once RWMB_DIR . 'meta-box.php';
require_once RWMB_DIR . 'fields.php';


// adding js code for edit/add new posts admin pages
function add_admin_scripts( $hook ) {
    wp_register_script('jquery', ("https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"), false, '1.11.3');
    wp_enqueue_script('blocatg-admin', get_stylesheet_directory_uri().'/assets/js/blocatg-admin.js' );
}
add_action( 'admin_enqueue_scripts', 'add_admin_scripts', 10, 1 );

// Exerpt Filters
function blocatg_custom_excerpt_length( $length ) {
	return 20;
}

function blocatg_custom_excerpt_more( $more ) {
	return ' ...';
}
add_filter( 'excerpt_length', 'blocatg_custom_excerpt_length', 999 );
add_filter( 'excerpt_more', 'blocatg_custom_excerpt_more' );