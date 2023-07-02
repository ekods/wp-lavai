<?php get_header(); ?>
<!--?php setPostViews(get_the_ID()); ?-->

<div class="singleWrap">
  <div class="container-md">
    <div class="postSingle">
      <div class="postSingle-main">

        <?php if(have_posts()) : while(have_posts())  : the_post();
          $gallery_meta = get_post_meta( get_the_ID(), 'gallery', true);
        ?>
        <div class="collectionSingle">

          <div class="collectionSingle-nav">
          <?php
          $prev_post = get_previous_post();
          if($prev_post) {
            $prev_title = strip_tags(str_replace('"', '', $prev_post->post_title));
            echo "\t" . '<a class="navprev" rel="prev" href="' . get_permalink($prev_post->ID) . '" title="' . $prev_title. '" class=" ">'. $prev_title . '</a>' . "\n";
          }

          $next_post = get_next_post();
          if($next_post) {
            $next_title = strip_tags(str_replace('"', '', $next_post->post_title));
            echo "\t" . '<a class="navnext" rel="next" href="' . get_permalink($next_post->ID) . '" title="' . $next_title. '" class=" ">'. $next_title . '</a>' . "\n";
          }
          ?>
          </div>


          <div class="collectionSingle-gallery">
            <div class="collectionGallery">
              <?php
              if(!empty($gallery_meta)):
              sort($gallery_meta);
              foreach ($gallery_meta as $gallery): ?>
              <div class="collectionGallery-item">
                <a href="<?= $gallery['images'] ?>">
                  <div class="collectionGallery-img">
                    <img src="<?= $gallery['images'] ?>" />
                  </div>
                </a>
              </div>
              <?php endforeach; endif; ?>
            </div>
            <div class="collectionGallery-nav">
            <?php
              if(!empty($gallery_meta)):
              sort($gallery_meta);
              foreach ($gallery_meta as $gallery): ?>
              <div class="collectionGallery-item">
                <div class="collectionGallery-img">
                  <img src="<?= $gallery['images'] ?>" />
                </div>
              </div>
              <?php endforeach; endif; ?>
            </div>

          </div>

          <div class="collectionSingle-content">

            <div class="w-100 mb-40">
              <h2 class="fm_CanelaTextTrial mb-10"><?= the_title(); ?></h2>

              <?php
              $collection_subtitle = get_post_meta( get_the_ID(), 'collection-subtitle', true );
              if(!empty($collection_subtitle)){ echo "<h4 class='fm_CanelaTextTrial'>" . $collection_subtitle . "</h4>"; } ?>
            </div>


            <div class="content-body mb-40">
              <?= the_content(); ?>

              <?php
              $collection_detail = get_post_meta( get_the_ID(), 'collection-detail', true );
              if(!empty($collection_detail)): ?>
              <div class="content-body-detail">
                <?= $collection_detail; ?>
              </div>
              <?php endif; ?>
            </div>

            <div class="w-100 mtb-60">
              <a href="<?php echo get_the_permalink(pll_get_post(get_page_by_path( 'Contact Us' )->ID));?>" class="btn btn-auto"><?php  echo __(pll__('Contact Us'), 'lavai'); ?></a>
            </div>

            <div class="share-holder ver-share fl-wrap mb-40">
                <div class="shareTitle"><?php echo __(pll__('Share'), 'lavai'); ?></div>
                <div class="shareContainer isShare"></div>
            </div>

          </div>
        </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>

      </div>



    </div>
  </div>
</div>


<?php get_footer(); ?>
