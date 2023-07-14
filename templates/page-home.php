<?php

/*
 * Template Name: Page Home
 */
get_header(); ?>
    <?php $frontpage_id = get_option( 'page_on_front' ); ?>

    <?php $the_query = new WP_Query ( "page_id= $frontpage_id" ); ?>
    <?php while ($the_query -> have_posts()) : $the_query -> the_post();
        $home_slide_fields = get_post_meta( get_the_ID(), 'home_slide', true);
    ?>
    <section id="heroSlider" class="heroSlider">
        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
            <?php
            if(!empty($home_slide_fields)):
            sort($home_slide_fields);
            foreach ($home_slide_fields as $home_slide): ?>
            <div class="swiper-slide">
                <picture>
                    <?php if(!empty($home_slide['images_mobile'])): ?>
                    <source media="(max-width: 767px)" srcset="<?php echo $home_slide['images_mobile']; ?>">
                    <source media="(min-width: 1440px)" srcset="<?php echo $home_slide['images']; ?>">
                    <?php else: ?>
                    <source srcset="<?php echo $home_slide['images']; ?>">
                    <?php endif; ?>
                    <img src="<?php echo $home_slide['images']; ?>" class="lozad" alt="">
                </picture>

                <div class="heroSlider-content">
                    <div class="container-fluid">
                        <?php if(!empty($home_slide['title'])){ echo "<h3>" . $home_slide['title'] . "</h3>"; } ?>
                        <div class="heroSlider-in">
                            <?php if(!empty($home_slide['subtitle'])){ echo "<p>" . $home_slide['subtitle'] . "</p>"; } ?>
                            <?php if(!empty($home_slide['link'])){ echo "<a href='" . $home_slide['link'] . "' class='btn'>VIEW MORE</a>"; } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>

            <div class="swiper-acc">
                <div class="swiper-nav">
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </section>


    <section class="sectionSc2">
        <div class="container">
            <h2><?php print_r(get_post_meta( get_the_ID(), 'hero-title', true)) ?></h2>
        </div>
    </section>
    <?php endwhile;?>
<?php get_footer(); ?>
