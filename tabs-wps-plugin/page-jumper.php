<?php
/**
 * @package Tabs-WPS-Plugin
 * @version 1.1
 */
/*
Plugin Name: Tabs WPS Plugin
Description: xxxxxxxxxxxxxxxx
Author: Chance Corbeil
Version: 1.1
Author URI: http://wpstrategy.com/
*/


// refrain from executing sensitive standalone PHP code before calling any WordPress functions.
defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Call the CSS. Our favorite!

/**
 * Register with hook 'wp_enqueue_scripts', which can be used for front end CSS and JavaScript
 */
add_action( 'wp_enqueue_scripts', 'prefix_add_my_stylesheet' );

/**
 * Enqueue plugin style-file
 */
function prefix_add_my_stylesheet() {
    // Respects SSL, Style.css is relative to the current file
    wp_register_style( 'prefix-style', plugins_url('style.css', __FILE__) );
    wp_enqueue_style( 'prefix-style' );
}

// Add content to the page

function page_jumper_tabs(){
    //Close PHP tags

    echo '<ul class="inpagenav">';

        // The Query
        query_posts(array(
        'post_type'      => array(
                            'page', 'post'),
              'order' 	 => 'ASC',
        'orderby'        => 'meta_value',
          'posts_per_page' => 50,
            'meta_key'       => 'paneltopage_panelorder',
                  ));

        // The Loop
        while ( have_posts() ) : the_post();

          echo '<li><a href="#';
          echo 'post-';the_ID();
          echo '" class="panelctabutton fancy">LINK HERE</a></li>';

        endwhile;

        // Reset Query
        wp_reset_query();

        echo '</ul>';
    echo '<div class="custom-text">Custom Text here</div>';

}

add_action('wp_head', 'page_jumper_tabs');




//This is here to help me test the page_jumper_tabs functions
//Delete Eventually
function fb_like($post_ID)  {
?>
<iframe src="http://www.facebook.com/plugins/like.php?href=<?php echo urlencode('http://'.$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"]); ?>&amp;layout=standard&amp;show_faces=true&amp;width=450&amp;action=like&amp;colorscheme=light&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:450px; height:80px;" allowTransparency="true"></iframe>
<?php
    return $post_ID;
}

add_action ( 'the_content', 'fb_like');






?>
