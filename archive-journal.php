<?php 
  get_header();
?>

  <div class="pageHead">
    <div class="container">
      <div class="w-100 text-center">
          <h2 class="pageTitle mb-20"><?php echo __(pll__('Journal'), 'lavai'); ?></h2>
      </div>
    </div>
  </div>

  <div class="w-100 mb-60">
    <div class="container">
      <div class="postArticle-wrap">
        <div class="postArticle-list">
          <?php query_posts($query_string);?>
          <?php if (have_posts()) : while (have_posts()) : the_post();?>
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
                          Post by <?= the_author_meta('display_name', 1); ?>
                      </div>
                    </div>
                </div>
            </div>
            <?php endwhile; else: ?>
            <p><?php _e('Sorry, no post available.'); ?></p>
            <?php endif; ?>
        </div>
      </div>
      

      <div class="clearfix"></div>
      <!--pagination-->
      <?php pagination_numeric_posts_nav(); ?>
      <!--pagination end-->

    </div>

  </div>
  
<?php get_footer(); ?>
