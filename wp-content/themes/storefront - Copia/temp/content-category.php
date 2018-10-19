<?php
/**
 * The loop template file.
 *
 * Included on pages like index.php, archive.php and search.php to display a loop of posts
 * Learn more: https://codex.wordpress.org/The_Loop
 *
 * @package storefront
 */

//do_action( 'storefront_loop_before' );

while ( have_posts() ) : the_post(); ?>



<?php endwhile;

/**
 * Functions hooked in to storefront_paging_nav action
 *
 * @hooked storefront_paging_nav - 10
 */
//do_action( 'storefront_loop_after' );
