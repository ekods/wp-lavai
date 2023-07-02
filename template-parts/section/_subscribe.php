<div class="subscribeBlock">
  <div class="subscribeBox">
    <div class="modalclose"></div>

    <div class="subscribeBox-head">
      <h4><?php echo __(pll__('Subscribe'), 'lavai'); ?></h4>
    </div>

    <div class="subscribeBox-content">
      <p><?php echo __(pll__('Pupup Subscribe Head'), 'lavai'); ?></p>
      <form class="subscribe" method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="subscribe">
        <input type="text" name="s" id="subscribe" class="subscribeInput" autocomplete="off" placeholder="Type your subscribe ..." />
        <button class="subscribeBox-btn btn" type="submit" role="button"><?php echo __(pll__('Subscribe'), 'lavai'); ?></button>
      </form>
    </div>
  </div>
  <div class="overlayer"></div>
</div>