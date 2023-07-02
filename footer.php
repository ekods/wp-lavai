</div>

<footer class="footer">
  <div class="footerMain">
    <div class="container">
      <div class="footerInner">
        <?php get_template_part( 'template-parts/section/_boxNav' ); ?>
      </div>
    </div>
  </div>


  <div class="footerBottom">
    <div class="container">
      <div class="footerBottom-inner">
          <div class="footerCopyright">
            <?php echo __(pll__('Footer Copyright'), 'lavai'); ?>
          </div>

        <div class="footerSosmed">
          <?php get_template_part( 'template-parts/parts/_sosmed' ); ?>
        </div>
      </div>
    </div>
  </div>
</footer>


<!-- Back to top button -->
<a id="backtop">
  <div class="backtopArrow"></div>
  <span><?php echo __(pll__('Back to top'), 'lavai'); ?></span>
</a>


<!-- Search -->
<?php get_template_part( 'template-parts/section/_search' ); ?>

<!-- Search -->
<?php get_template_part( 'template-parts/section/_subscribe' ); ?>


<!-- MENU OVERLAY -->
<?php get_template_part( 'template-parts/section/_menuNav' ); ?>


<?php wp_footer(); ?>
</body>
</html>
