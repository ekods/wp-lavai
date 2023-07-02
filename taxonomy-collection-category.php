<?php 
  get_header();


  global $polylang;
  $lang = pll_current_language();

  $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) );
  $term_id = $term->term_id;


  if(isset($_GET['collection_type'])){
   $type_parm = $_GET['collection_type'];
  }else{
    $type_parm = '';
  }
?>

  <div class="pageHead">
    <div class="container">
      <div class="w-100 text-center">
          <h2 class="pageTitle mb-60"><?php echo __(pll__('Collection'), 'lavai'); ?></h2>
      </div>
    </div>
  </div>

  <div class="w-100 mb-60">
    <div class="container">

      <div class="collectionPage">

        <div class="collectionSide">

        <?php
          $collection_category_value = get_terms( 'collection-type', array('hide_empty' => false, 'orderby' => 'tax_position', 'parent' => 0) );
            foreach ($collection_category_value as $collection_category):
          ?>

            <div class="collectionType">
              <h4>
                <a href="./?collection_type=<?= $collection_category->slug; ?>" onClick="window.location.reload();"><?= $collection_category->name; ?></a>
              </h4>
              <ul>
              <?php
              $queried_object = get_queried_object();
              $taxonomyName = $term->taxonomy;

                  $my_query = new WP_Query( array(
                      'post_type' => 'collection',
                      'posts_per_page' => -1,
                      'order' => 'ASC',
                      'tax_query' => array(
                        array(
                            'taxonomy' => 'collection-category',
                            'field'    => 'term_id',
                            'terms'    => $term_id,
                        ),
                        array(
                          'taxonomy' => 'collection-type',
                          'field'    => 'term_id',
                          'terms'    => $collection_category->term_id,
                      ),
                    ),
                  ));
                  while ($my_query->have_posts()) : $my_query->the_post();
              ?>
                <li>
                  <a href="<?= get_the_permalink(); ?>"><?= the_title(); ?></a>
                </li>
              <?php endwhile;
              wp_reset_postdata(); ?>
              </ul>

            </div>
            <?php endforeach; ?>

        </div>

        <div class="collectionWrap">
          <?php
          $queried_object = get_queried_object();
          $taxonomyName = $term->taxonomy;

              $my_query = new WP_Query( array(
                  'post_type' => 'collection',
                  'posts_per_page' => -1,
                  'order' => 'ASC',
                  'tax_query' => array(
                    array(
                        'taxonomy' => 'collection-category',
                        'field'    => 'term_id',
                        'terms'    => $term_id,
                    )
                  )
              ));
              while ($my_query->have_posts()) : $my_query->the_post();
          ?>

            <div class="collectionGroupItem">
              <a href="<?= get_the_permalink(); ?>">
                <div class="collectionGroupItem-img">
                  <img src="<?php if ( has_post_thumbnail() ) { the_post_thumbnail_url(); } ?>">
                </div>

                <div class="w-100 mtb-20">
                  <h4><?= the_title(); ?></h4>
                </div>
              </a>
            </div>


          <?php endwhile;
          wp_reset_postdata(); ?>
        </div>

      </div>

    </div>

  </div>
  
<?php get_footer(); ?>
