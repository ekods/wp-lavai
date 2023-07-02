<?php

  //Call Ajax Post Leaders
  function fetch_modal_content_news() {
    if ( isset($_REQUEST) ) {
      $cat_id = $_REQUEST['cat_id'];
    ?>

    <div class="ajax-inner fl-wrap">
        <div class="list-post-wrap">
          <?php
              global $post;
              $args = array( 'post_type'=> 'post', 'posts_per_page' => 10, 'cat' => $cat_id );
              $the_query = new WP_Query( $args );
              if($the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
            ?>
            <!--list-post-->
            <div class="list-post fl-wrap">
                <div class="list-post-media">
                    <a href="<?php echo the_permalink(); ?>">
                        <div class="bg-wrap">
                            <div class="bg" data-bg="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); }else{ echo get_template_directory_uri().'/images/thumb-default.jpg'; } ?>"></div>
                        </div>
                    </a>
                </div>
                <div class="list-post-content">
                    <h3><a href="<?php echo the_permalink(); ?>"><?= the_title(); ?></a></h3>
                    <div class="post_w">
                      <span class="post-date"><i class="far fa-calendar"></i> <?= the_time( 'l, j F Y' ); ?></span>
                      <span class="post-date"><i class="far fa-clock"></i> <?php echo reading_time(); ?></span>
                    </div>
                </div>
            </div>
            <!--list-post end-->
            <?php  endwhile; endif; ?>
        </div>
    </div>

    <?php
    }
    die();
  }
  add_action( 'wp_ajax_fetch_modal_content_news', 'fetch_modal_content_news' );
  add_action( 'wp_ajax_nopriv_fetch_modal_content_news', 'fetch_modal_content_news' );

 ?>
