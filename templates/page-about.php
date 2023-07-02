<?php

/*
 * Template Name: Page About
 */
get_header(); ?>

    <div class="pageAbout">
        <div class="container-md">
            <div class="pageAbout-wrap">

                <div class="pageHead">
                    <div class="w-100 text-center">
                        <h2 class="pageTitle mb-20"><?= the_title(); ?></h2>

                        <div class="pageAbout-anchor">
                            <ul>
                            <?php
                                $about_fields = get_post_meta( get_the_ID(), 'about_item', true);
                                if(!empty($about_fields)):
                                    sort($about_fields);
                                    foreach ($about_fields as $about): ?>

                                    <li>
                                        <?php if(!empty($about['title'])){ echo "<a href='#" . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $about['title']))). "'>" . $about['title'] . "</a>"; } ?>
                                    </li>

                                <?php endforeach; endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="content-body">
                    <?= the_content(); ?>
                </div>

                <div class="brandLogo">
                    <?php get_template_part( 'template-parts/parts/_logo-sc' ); ?>
                </div>

                <?php
                $about_fields = get_post_meta( get_the_ID(), 'about_item', true);
                if(!empty($about_fields)):
                    $is = 1;

                    sort($about_fields);
                    foreach ($about_fields as $about): ?>

                    <div id="<?= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $about['title']))); ?>" class="pageAbout-item itemAbout<?= $is; ?>">
                        <div class="pageAbout-itemHead text-center pb-40">
                            <?php if(!empty($about['title'])){ echo "<h3>0" . $is . " ". $about['title'] . "</h3>"; } ?>
                            <?php if(!empty($about['sub_title'])){ echo "<p>" . $about['sub_title'] . "</p>"; } ?>
                        </div>

                        <div class="pageAbout-itemInner">
                            <?php if(!empty($about['images'])){ ?>
                            <div class="pageAbout-itemCol">
                                <div class="pageAbout-itemImg">
                                    <img data-src="<?= $about['images'] ?>" class="lozad" alt="">
                                </div>
                            </div>
                            <?php } ?>
                            <div class="pageAbout-itemCol">
                                <div class="pageAbout-itemBody">
                                    <?php if(!empty($about['description'])){ echo $about['description']; } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                <?php  $is++; endforeach; endif; ?>
            </div>
        </div>
    </div>

<?php get_footer(); ?>
