<?php 
/**
 * keepwriting functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @package WordPress
 * @subpackage keepwriting
 * @since keepwriting 1.0
 */
if ( ! isset( $content_width ) ) {
  $content_width = 900;
}

// Add RSS thumbnail support
add_theme_support('post-thumbnails');

// Add RSS feed links to <head> for posts and comments.
  add_theme_support( 'automatic-feed-links' );

  add_theme_support("title-tag");

/////////////////////////Register Menu Location/////////////////////////
add_theme_support('menus');
add_action( 'init', 'keepwriting_register_my_menus' );
function keepwriting_register_my_menus() {
	register_nav_menus(
		array(
			'primary' => __( 'Primary', 'keepwriting' ),
		)
	);
}
/////////////////////////Register Menu Location/////////////////////////

////////////////ENQUEUE SCRIPTS AND MAKE SCRIPTS LOAD ASYNC////////////////////////////
function keepwriting_load_my_scripts() {  
        wp_enqueue_style('bootstrap_css', get_template_directory_uri().'/inc/bootstrap.min.css');
        wp_enqueue_style( 'style', get_stylesheet_uri() );
		    wp_enqueue_style('googleFonts', 'http://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic');
        wp_deregister_script('jquery');  
        wp_enqueue_script('jquery', 'http://code.jquery.com/jquery.js');  
        wp_enqueue_script('jquery');  
        wp_enqueue_script('bootstrap', get_template_directory_uri().'/inc/bootstrap.min.js'); 
        wp_enqueue_script('custom', get_template_directory_uri().'/inc/custom.js',0,0,true); 
    }  
add_action('wp_enqueue_scripts', 'keepwriting_load_my_scripts'); 


if (function_exists('wp_enqueue_script') && function_exists('is_singular')) 
{
	wp_enqueue_script( 'comment-reply' ); 
}
////////////////ENQUEUE SCRIPTS AND MAKE SCRIPTS LOAD ASYNC////////////////////////////


/////////////////////////Register Sidebar/////////////////////////
function keepwriting_sidebar() {
register_sidebar(array(
  'name' => __( 'Single Page Bottom Section', 'keepwriting' ),
  'id' => 'bottomsection',
  'description' => __( 'Widgets in this area will be shown on the bottom of single posts', 'keepwriting' ),
  'before_title' => '<h4>',
  'after_title' => '</h4><ul class="list-unstyled">'
));
}
add_action( 'widgets_init', 'keepwriting_sidebar' );
/////////////////////////Register Menu Location/////////////////////////

require_once('inc/wp_bootstrap_navwalker.php');

function keepwriting_excerpt($text) {
        global $post;
        if ( '' == $text ) {
                $text = get_the_content('');
                $text = apply_filters('the_content', $text);
                $text = str_replace('\]\]\>', ']]&gt;', $text);
                $text = preg_replace('@<script[^>]*?>.*?</script>@si', '', $text);
                $text = strip_tags($text, '<p><li><ul><ol><blockquote><a>');
                $excerpt_length = 150;
                $words = explode(' ', $text, $excerpt_length + 1);
                if (count($words)> $excerpt_length) {
                        array_pop($words);
                        array_push($words, '');
                        $text = implode(' ', $words);
                }
        }
        return $text;
}
remove_filter('get_the_excerpt', 'wp_trim_excerpt');
add_filter('get_the_excerpt', 'keepwriting_excerpt');

function keepwriting_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment;
    extract($args, EXTR_SKIP);

    if ( 'div' == $args['style'] ) {
        $tag = 'div';
        $add_below = 'comment';
    } else {
        $tag = 'li';
        $add_below = 'div-comment';
    }
?>
    <<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
    <?php if ( 'div' != $args['style'] ) : ?>
    <div id="div-comment-<?php comment_ID() ?>" class="comment-body panel panel-default">
    <?php endif; ?>
    <div class="comment-author vcard panel-heading">
        <?php printf( __( '<strong>%s</strong> <span class="timecomment"> left a comment on' ), get_comment_author_link() ); ?>
        <a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
        <?php printf( __('%1$s at %2$s', 'keepwriting'), get_comment_date(),  get_comment_time() ); ?>
        </a>
        <?php edit_comment_link( __( '(Edit)', 'keepwriting' ), '  ', '' );?>
        </span>
    </div>
    <div class="panel-body">

    <?php comment_text(); ?>
    </div>

    <div class="reply panel-footer">
    <?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
        <?php if ( $comment->comment_approved == '0' ) : ?>
        <em class="comment-awaiting-moderation pull-right"><?php _e( 'Your comment is awaiting moderation.', 'keepwriting' ); ?></em>
    <?php endif; ?>
    </div>
    <?php if ( 'div' != $args['style'] ) : ?>
    </div>
    <?php endif; 
    }
?>