<?php

/*
 * Template Name: Page Collection
 */
get_header(); ?>

    <div class="pageHead">
        <div class="container-md">
        <div class="w-100 text-center">
            <h2 class="pageTitle mb-60"><?php echo __(pll__('Collection'), 'lavai'); ?></h2>

            <div class="w-100 fm_CanelaTextTrial">
                <?= the_content(); ?>
            </div>
        </div>
        </div>
    </div>

    <div class="w-100 mb-60">
        <div class="container-md">
        
        <div class="collectionGroup">

        <?php
            $collection_group_item = get_post_meta( get_the_ID(), 'collection_group_item', true);

            foreach ($collection_group_item as $collection_group):
            ?>

            <div class="collectionGroupItem">
                <a href="<?= $collection_group['link']; ?>">
                <div class="collectionGroupItem-img">
                    <img src="<?= $collection_group['images']; ?>" alt="<?= $collection_group['title']; ?>">
                </div>

                <div class="w-100 mtb-20">
                    <h4><?= $collection_group['title']; ?></h4>
                </div>
                </a>
            </div>

            <?php endforeach; ?>


        </div>
        </div>

    </div>

<?php get_footer(); ?>








