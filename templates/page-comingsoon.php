
<?php

/*
 * Template Name: Page Coming Soom
 */


get_header(); ?>

    <section id="single-page" class="mtb-40">
      <div class="container mb-40">
        <div class="w-100 dinline-block">
          <?php custom_breadcrumbs(); ?>

          <div class="section-head mt-20">
            <h3><?= the_title() ?></h3>
          </div>
        </div>
      </div>
      
      <div class="container">
      <?php if(have_posts()) : while(have_posts())  : the_post(); ?>
        <div class="comingsoon-section">
          <h4><?php esc_html_e( 'Halaman ini masih dalam proses developemnt.', 'lavai_themes' ); ?></h4>
        </div>
       <?php endwhile; endif; wp_reset_postdata(); ?>
      </div>
    </section>

<?php get_footer(); ?>
