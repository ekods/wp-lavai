<?php get_header(); ?>

  <?php if(have_posts()) : while(have_posts())  : the_post(); ?>
      <?= the_content(); ?>
  <?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
