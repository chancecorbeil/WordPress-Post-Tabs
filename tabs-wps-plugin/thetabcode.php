<ul class="inpagenav">

<?php
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

if ( get_post_meta($post->ID, 'paneltopage_panelorder', true) ) :

  echo '<li><a href="#';
  echo $post->post_name;
  echo '" class="panelctabutton fancy"> </a></li>';

endif;

endwhile;

// Reset Query
wp_reset_query();
?>

</ul>
