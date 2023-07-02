<?php

/*
 * Template Name: Page Collection Group
 */
get_header(); ?>

    <div class="pageAbout --collection">
        <div class="container-md">
            <div class="pageAbout-wrap mb-100">

                <div class="pageHead">
                    <div class="w-100 text-center">
                        <h2 class="pageTitle mb-20"><?= the_title(); ?></h2>
                    </div>
                </div>

                <div class="pageBody">
                    <?php
                    $collection_group_page_item = get_post_meta( get_the_ID(), 'collection_group_page_item', true);
                    if(!empty($collection_group_page_item)):
                        $is = 1;

                        sort($collection_group_page_item);
                        foreach ($collection_group_page_item as $collection_group): ?>

                        <div class="pageAbout-item itemAbout<?= $is; ?>">
                            <div class="pageAbout-itemInner">
                                <div class="pageAbout-itemCol"></div>
                                <div class="pageAbout-itemCol">
                                    <div class="pageAbout-itemBody">
                                        <?php if(!empty($collection_group['title'])){ echo "<h3 class='mb-30'>". $collection_group['title'] . "</h3>"; } ?>
                                    </div>
                                </div>
                            </div>
                            <div class="pageAbout-itemInner">
                                <?php if(!empty($collection_group['images'])){ ?>
                                <div class="pageAbout-itemCol">
                                    <div class="pageAbout-itemImg">
                                        <img data-src="<?= $collection_group['images'] ?>" class="lozad" alt="">
                                    </div>
                                </div>
                                <?php } ?>
                                <div class="pageAbout-itemCol">
                                    <div class="pageAbout-itemBody">
                                        <?= htmlspecialchars_decode($collection_group['description']); ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <?php  $is++; endforeach; endif; ?>
                </div>
            </div>
        </div>
    </div>

<?php get_footer(); ?>








