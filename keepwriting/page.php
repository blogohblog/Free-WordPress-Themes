<?php
/**
 * The page file
 *
 * @package WordPress
 * @subpackage keepwriting
 * @since keepwriting 1.0
 */

get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
 <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
     <h2 class="pagetitle"><?php the_title(); ?></h2>     
      <div class="post-meta"><span>Written by <?php the_author_posts_link() ?></span></div>       
     <div class="entry">
       <?php the_content(); ?>
     </div>    
 </div> <!--post -->

 <?php endwhile;?>
 <?php endif; ?>

<?php get_footer(); ?>