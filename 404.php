<?php
get_header();
?>

<!-- wrapper -->
<div id="wrapper">
    <!-- content    -->
    <div class="content">
        <!--section   -->
        <section class="hero-section error-section">
          <div class="container">
              <div class="error-wrap">
                  <h2>404</h2>
                  <p>We're sorry, but the Page you were looking for, couldn't be found.</p>
                  <div class="clearfix"></div>
                  <a href="<?= esc_url(home_url()) ?>" class="btn color-btn flat-btn"> <span>Back to Home Page</span> <i class="fas fa-caret-right"></i></a>
              </div>
          </div>
        </section>
        <!-- section end  -->
    </div>
    <!-- content  end-->
</div>

<?php
get_footer();
