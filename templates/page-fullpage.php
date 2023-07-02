
<?php

/*
 * Template Name: Full Width
 */


get_header(); ?>

  <section id="full-page" class="mtb-40">
    <div class="container mb-40">
      <div class="w-100 dinline-block">
        <?php custom_breadcrumbs(); ?>

        <div class="section-head mt-20">
          <h3><?= the_title() ?></h3>
        </div>
      </div>
    </div>
    
    <div class="container-full">
      <?php if(have_posts()) : while(have_posts())  : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>
  </section>

<?php get_footer(); ?>