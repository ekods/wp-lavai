<?php get_header(); ?>
<!--?php setPostViews(get_the_ID()); ?-->

<div class="singleWrap">
  <div class="container-md">
    <div class="postSingle">
      <div class="postSingle-main">
        <?php custom_breadcrumbs(); ?>

        <?php if(have_posts()) : while(have_posts())  : the_post(); ?>
        <div class="w-100">
          <h2 class="mb-20 fm_CanelaTextTrial"><?= the_title(); ?></h2>
          <p class="mb-40"><?= the_time( 'M d, Y' ); ?></p>

          <!-- <div class="postArticle-item_thumb">
              <a href="<?php echo get_the_permalink(); ?>">
                  <div class="thumb-sq">
                      <img class="lozad" data-src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); }else{ echo 'https://dummyimage.com/800x610/e0e0e0/fff'; } ?>" alt="">
                  </div>
              </a>
          </div> -->

          <div class="content-body mb-40">
            <?= the_content(); ?>
          </div>

          <div class="share-holder ver-share fl-wrap mb-40">
              <div class="shareTitle"><?php echo __(pll__('Share'), 'lavai'); ?></div>
              <div class="shareContainer isShare"></div>
          </div>

        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>

      </div>
      <div class="postSingle-related">

        <div class="w-100 mb-20 pb-20">
          <h5 class="extrabold mb-10"><?php echo __(pll__('Related News'), 'lavai'); ?></h5>

          <div class="postList-side mt-20">
            <!-- Swiper -->
            <div class="swiper sliderPost-side">
              <div class="swiper-wrapper">
              <?php
                //query arguments
                $args = array(
                    'post_type' => 'journal',
                    'post_status' => 'publish',
                    'posts_per_page' => 4,
                    'post__not_in' => array ($post->ID),
                );
                $relatedPosts = new WP_Query( $args );

                //loop through query
                if($relatedPosts->have_posts()){
                    while($relatedPosts->have_posts()){
                        $relatedPosts->the_post();
                ?>
                    <div class="swiper-slide">

                      <div class="postArticle-item">
                          <div class="postArticle-item_thumb">
                              <a href="<?php echo get_the_permalink(); ?>">
                                  <div class="thumb-sq">
                                      <img class="lozad" data-src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); }else{ echo 'https://dummyimage.com/800x610/e0e0e0/fff'; } ?>" alt="">
                                  </div>
                              </a>
                          </div>
                          <div class="postArticle-item_content">
                              <a href="<?php echo get_the_permalink(); ?>">
                                  <h5><?php the_title(); ?></h5>
                              </a>

                              <div class="postArticle-item_bottom">
                                <div class="postArticle-item_date">
                                    <?= the_time( 'M, d Y' ); ?>
                                </div>
                                <div class="postArticle-item_author">
                                  <?php echo __(pll__('Post by'), 'lavai'); ?> <?= the_author_meta('display_name', 1); ?>
                                </div>
                              </div>
                          </div>
                      </div>

                    </div>
                    <?php
                  }
                }
                wp_reset_postdata(); ?>
              </div>
            </div>

            <div class="swiper-acc">
              <div class="swiper-pagination"></div>
            </div>
            <!-- Swiper End -->


          </div>
        </div>

      </div>


    </div>
  </div>
</div>
<script>

var init = false;

  function swiperCard() {
      if (!init) {
        init = true;
        swiper = new Swiper(".sliderPost-side", {
          direction: "horizontal",
          slidesPerView: "auto",
          spaceBetween: 40,
          slidesPerView: 2,
          pagination: {
            el: ".swiper-pagination",
            clickable: true,
          },
          breakpoints: {
            320: {
              slidesPerView: 1,
              spaceBetween: 15
            },
            330: {
              slidesPerView: 2,
              spaceBetween: 15
            },
            600: {
              slidesPerView: 2,
              spaceBetween: 40
            },
          }
        });
      }

  }
  swiperCard();
  window.addEventListener("resize", swiperCard);

</script>

<?php get_footer(); ?>
