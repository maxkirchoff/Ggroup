<?php
add_action( 'after_setup_theme', 'blankslate_setup' );
function blankslate_setup() {
load_theme_textdomain( 'blankslate', get_template_directory() . '/languages' );
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'post-thumbnails' );
add_theme_support( 'html5', array( 'search-form' ) );
global $content_width;

if ( ! isset( $content_width ) ) { $content_width = 1920; }
  register_nav_menus( array( 'main-menu' => esc_html__( 'Main Menu', 'blankslate' ) ) );
  register_nav_menus( array( 'footer-menu' => esc_html__( 'Footer Menu', 'blankslate' ) ) );
}

add_action( 'wp_enqueue_scripts', 'blankslate_load_scripts' );

function blankslate_load_scripts() {
  wp_enqueue_style( 'blankslate-style', get_stylesheet_uri() );
  wp_enqueue_script( 'jquery' );
}

add_action( 'wp_footer', 'blankslate_footer_scripts' );

function blankslate_footer_scripts() {
?>
  <script>
    jQuery(document).ready(function ($) {
      var deviceAgent = navigator.userAgent.toLowerCase();
      if (deviceAgent.match(/(iphone|ipod|ipad)/)) {
        $("html").addClass("ios");
        $("html").addClass("mobile");
      }
      if (navigator.userAgent.search("MSIE") >= 0) {
        $("html").addClass("ie");
      }
      else if (navigator.userAgent.search("Chrome") >= 0) {
        $("html").addClass("chrome");
      }
      else if (navigator.userAgent.search("Firefox") >= 0) {
        $("html").addClass("firefox");
      }
      else if (navigator.userAgent.search("Safari") >= 0 && navigator.userAgent.search("Chrome") < 0) {
        $("html").addClass("safari");
      }
      else if (navigator.userAgent.search("Opera") >= 0) {
        $("html").addClass("opera");
      }
    });
  </script>
<?php
}

add_filter( 'document_title_separator', 'blankslate_document_title_separator' );

function blankslate_document_title_separator( $sep ) {
  $sep = '|';
  return $sep;
}

add_filter( 'the_title', 'blankslate_title' );

function blankslate_title( $title ) {
  if ( $title == '' ) {
    return '...';
  } else {
    return $title;
  }
}


add_filter( 'intermediate_image_sizes_advanced', 'blankslate_image_insert_override' );

function blankslate_image_insert_override( $sizes ) {
  unset( $sizes['medium_large'] );
  return $sizes;
}

add_action( 'widgets_init', 'blankslate_widgets_init' );

function blankslate_widgets_init() {
  register_sidebar( array(
  'name' => esc_html__( 'Sidebar Widget Area', 'blankslate' ),
  'id' => 'primary-widget-area',
  'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
  'after_widget' => '</li>',
  'before_title' => '<h3 class="widget-title">',
  'after_title' => '</h3>',
  ) );
}

add_action( 'wp_head', 'blankslate_pingback_header' );

function blankslate_pingback_header() {
  if ( is_singular() && pings_open() ) {
    printf( '<link rel="pingback" href="%s" />' . "\n", esc_url( get_bloginfo( 'pingback_url' ) ) );
  }
}

add_action( 'comment_form_before', 'blankslate_enqueue_comment_reply_script' );

function blankslate_enqueue_comment_reply_script() {
  if ( get_option( 'thread_comments' ) ) {
    wp_enqueue_script( 'comment-reply' );
  }
}

function blankslate_custom_pings( $comment ) {
?>
  <li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php
}

add_filter( 'get_comments_number', 'blankslate_comment_count', 0 );

function blankslate_comment_count( $count ) {
  if ( ! is_admin() ) {
    global $id;
    $get_comments = get_comments( 'status=approve&post_id=' . $id );
    $comments_by_type = separate_comments( $get_comments );
    return count( $comments_by_type['comment'] );
  } else {
    return $count;
  }
}

//
// Stylesheets and Javascript
//

function theme_scripts_styles() {

    $version_number = '1.2.4';
    global $debugging;
    
    wp_enqueue_style( 'slick-theme-styles', get_stylesheet_directory_uri() . '/js/slick/slick.css', array(), $version_number );
    wp_enqueue_style( 'slick-styles', get_stylesheet_directory_uri() . '/js/slick/slick-theme.css', array(), $version_number );

    wp_enqueue_script( 'slick-js', get_stylesheet_directory_uri() . '/js/slick/slick.js', array( 'jquery' ), $version_number, true );

    // Theme registration stylesheet, combined theme stylesheet and any other necessary styles
    wp_enqueue_style( 'registration-stylesheet', get_stylesheet_directory_uri() . '/style.css', array(), $version_number );
    wp_enqueue_style( 'theme-styles', get_stylesheet_directory_uri() . '/css/theme.css', array(), $version_number );

    wp_enqueue_script( 'app-js', get_stylesheet_directory_uri() . '/js/app.js', array( 'jquery' ), $version_number, true );
}

add_action( 'wp_enqueue_scripts', 'theme_scripts_styles' );

function ea_disable_editor( $id = false ) {

	$excluded_templates = array(
		'page-homepage.php',
    'page-about.php',
    'page-people.php',
	);

	$excluded_ids = array(
		 get_option( 'page_on_front' )
	);

	if( empty( $id ) )
		return false;

	$id = intval( $id );
	$template = get_page_template_slug( $id );

	return in_array( $id, $excluded_ids ) || in_array( $template, $excluded_templates );
}

/**
 * Disable Gutenberg by template
 *
 */
function ea_disable_gutenberg( $can_edit, $post_type ) {

	if( ! ( is_admin() && !empty( $_GET['post'] ) ) )
		return $can_edit;

	if( ea_disable_editor( $_GET['post'] ) )
		$can_edit = false;

	return $can_edit;

}
add_filter( 'gutenberg_can_edit_post_type', 'ea_disable_gutenberg', 10, 2 );
add_filter( 'use_block_editor_for_post_type', 'ea_disable_gutenberg', 10, 2 );

/**
 * Disable Classic Editor by template
 *
 */
function ea_disable_classic_editor() {

	$screen = get_current_screen();
	if( 'page' !== $screen->id || ! isset( $_GET['post']) )
		return;

	if( ea_disable_editor( $_GET['post'] ) ) {
		remove_post_type_support( 'page', 'editor' );
	}

}
add_action( 'admin_head', 'ea_disable_classic_editor' );

// Add image size for backgrounds
add_image_size( 'virtual_background', 1920, 1080, true );
// Add image size for backgrounds
add_image_size( 'virtual_background_thumb', 480, 270, true );

add_image_size( 'homepage_hero', 1600, 1200, true );
add_image_size( 'quote_image', 1080, 1000, true );
add_image_size( 'resources_header_image', 1440, 480, true );
add_image_size( 'headshot_image', 500, 500, true );
set_post_thumbnail_size( 910, 676, true );
add_image_size( 'featured_article_page_image', 1440, 480, true );


show_admin_bar(false);


/**
* Removes or edits the 'Protected:' part from posts titles
*/
add_filter( 'protected_title_format', 'remove_protected_text' );
function remove_protected_text() {
  return __('%s');
}


// Add the custom columns to the book post type:
add_filter( 'manage_backgrounds_posts_columns', 'set_custom_edit_backgrounds_columns' );
function set_custom_edit_backgrounds_columns($columns) {
    unset( $columns['author'] );
    unset( $columns['tags'] );
    unset( $columns['date'] );
    $columns['media'] = __( 'Media', 'your_text_domain' );

    return $columns;
}

// Add the data to the custom columns for the book post type:
add_action( 'manage_backgrounds_posts_custom_column' , 'custom_backgrounds_column', 10, 2 );
function custom_backgrounds_column( $column, $post_id ) {
    switch ( $column ) {
        case 'media' :
            if (get_post_meta( $post_id , 'background_type' , true ) == 'video') {
              echo "<video class='background-video' muted autoplay loop playsinline webkit-playsinline><source src='" . wp_get_attachment_url( get_post_meta( $post_id , "video" , true ) ) . "' type='video/mp4'></video>";
            } else {
              echo "<img src='" . wp_get_attachment_image_src(get_post_meta( $post_id , 'image' , true ), 'virtual_background_thumb')[0] . "'>";
            }
            break;
    }
}

function tenxceo_custom_logo_setup() {
  $defaults = array(
  'height'      => 70,
  'width'       => 300,
  'flex-height' => true,
  'flex-width'  => true,
  'header-text' => array( 'site-title', 'site-description' ),
  );
  add_theme_support( 'custom-logo', $defaults );
 }
 add_action( 'after_setup_theme', 'tenxceo_custom_logo_setup' );


 add_filter( 'enter_title_here', 'custom_enter_title' );
 function custom_enter_title( $input ) {
     if ( 'team_member' === get_post_type() ) {
         return __( 'Enter team member name here', 'your_textdomain' );
     }

     return $input;
 }

 add_filter( 'nav_menu_css_class', 'wp_object_menu_item_id_class', 10, 2 );
 /**
 * Custom Nav Menu Class For Page ID
 */
function wp_object_menu_item_id_class( $classes, $item )
{
    if( isset( $item->object_id ) )
        $classes[] = sprintf( 'wp-object-id-%d', $item->object_id );

    return $classes;
}
