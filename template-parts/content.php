<?php get_header(); ?>

  <?php if(have_posts()) : while(have_posts())  : the_post(); ?>
  <section class="mtb-40">
    <div class="container mb-40">
      <div class="w-100 dinline-block">
        <?php custom_breadcrumbs(); ?>

        <div class="section-head mt-20">
          <h3><?= the_title() ?></h3>
        </div>
      </div>
    </div>
    
    <div class="container">
      <div class="w-100 dflex mt-40">
          <?= the_content(); ?>
      </div>
    </div>
  </section>
  <?php endwhile; endif; wp_reset_postdata(); ?>

<?php get_footer(); ?>
