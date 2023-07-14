<?php

/*
 * Template Name: Page Contact Us
 */
get_header(); ?>

    <div class="pageContact">
        <div class="container-md">
            <div class="pageContact-wrap">
                <div class="pageContact-col">
                <?php if ( has_post_thumbnail(get_the_ID()) ) { ?>
                    <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( get_the_ID() ), 'single-post-thumbnail' ); ?>
                    <div class="pageContact-img">
                        <img class="lozad" data-src="<?= $image[0]; ?>" alt="<?= the_title(); ?>">
                    </div>
                <?php } ?>
                </div>
                <div class="pageContact-col">

                    <div class="content-body">
                        <?= the_content(); ?>
                    </div>
  
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>








