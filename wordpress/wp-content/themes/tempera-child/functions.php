<?php
/**
 * Tempera Child functions and definitions
 */

//-------------REMOVE WORDPRESS VERSION FROM HEAD AND FEEDS FOR SECURITY-------------
function complete_version_removal() {
    return '';
}
add_filter('the_generator', 'complete_version_removal');

remove_action('wp_head', 'wp_generator');

//-------------ENABLE SHORTCODES IN WIDGETS-------------
if ( !is_admin() ){
    add_filter('widget_text', 'do_shortcode', 11);
}

//-------------DISABLE SELF-PINGS------------- 
// source: http://wpsnipp.com/index.php/functions-php/disable-self-pings-with-pre_ping-hook/
function no_self_ping( &$links ) {
   $home = get_option( 'home' );
   foreach ( $links as $l => $link )
       if ( 0 === strpos( $link, $home ) )
           unset($links[$l]);
}
add_action( 'pre_ping', 'no_self_ping' );

   
//-------------REWRITE SEARCH SLUG TO .../SEARCH/TERM------------- 
// source: http://wpsnipp.com/index.php/functions-php/rewrite-the-search-results-slug-search-term/
function search_url_rewrite_rule() {
        if ( is_search() && !empty($_GET['s'])) {
                wp_redirect(home_url("/search/") . urlencode(get_query_var('s')));
                exit();
        }
}
add_action('template_redirect', 'search_url_rewrite_rule');

//-------------OPEN GRAPH COMPLIANCE------------- 
// source: http://www.wprecipes.com/how-to-use-open-graph-to-make-your-content-easily-recognizable-by-social-networks
/* NOTE:
 *    For full compliance, replace the <html> tag in header.php with:
 *    <html <?php language_attributes(); ?> prefix="og: http://ogp.me/ns#">
*/
function wptuts_opengraph_for_posts() {
    if ( is_singular() ) {
        global $post;
        setup_postdata( $post );
        $og_type = '<meta property="og:type" content="article" />' . "\n";
        $og_title = '<meta property="og:title" content="' . esc_attr( get_the_title() ) . '" />' . "\n";
        $og_url = '<meta property="og:url" content="' . get_permalink() . '" />' . "\n";
        $og_description = '<meta property="og:description" content="' . esc_attr( get_the_excerpt() ) . '" />' . "\n";
        if ( has_post_thumbnail() ) {
            $imgsrc = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'medium' );
            $og_image = '<meta property="og:image" content="' . $imgsrc[0] . '" />' . "\n";
        }
        echo $og_type . $og_title . $og_url . $og_description . $og_image;
    }
}
add_action( 'wp_head', 'wptuts_opengraph_for_posts' );

//-------------HIDE EMAIL ADDRESSES FROM SPAMBOTS------------- 
// source: http://www.wprecipes.com/how-to-automatically-hide-email-adresses-from-spambots-on-your-wordpress-blog
function security_remove_emails($content) {
    $pattern = '/([a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4})/i';
    $fix = preg_replace_callback($pattern,"security_remove_emails_logic", $content);

    return $fix;
}
function security_remove_emails_logic($result) {
    return antispambot($result[1]);
}
add_filter( 'the_content', 'security_remove_emails', 20 );
add_filter( 'widget_text', 'security_remove_emails', 20 );

//-------------DISABLE COMMENTS ON MEDIA ATTACHMENTS------------- 
// source: http://www.wpbeginner.com/wp-tutorials/how-to-disable-comments-on-wordpress-media-attachments/
function filter_media_comment_status( $open, $post_id ) {
	$post = get_post( $post_id );
	if( $post->post_type == 'attachment' ) {
		return false;
	}
	return $open;
}
add_filter( 'comments_open', 'filter_media_comment_status', 10 , 2 );

//-------------AVOID JUMP TO READ MORE LOCATION------------- 
// source: http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
function no_more_jumping($post) {
	return '<a href="'.get_permalink($post->ID).'" class="read-more">'.'Continue Reading'.'</a>';
}
add_filter('excerpt_more', 'no_more_jumping');
add_filter('the_content_more_link', 'remove_more_jump_link');
