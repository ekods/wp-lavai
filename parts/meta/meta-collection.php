<?php


function add_collection_meta() {

  global $post;
  if(!empty($post))
  {
    add_meta_box( 'collection', 'Collection Content', 'meta_collection', 'collection', 'normal', 'high');
    add_meta_box( 'repeatable-fields', 'Gallery Item', 'repeatable_meta_box_gallery_display', 'collection', 'normal', 'high');
  }

}
add_action('add_meta_boxes', 'add_collection_meta', 1);


  function meta_collection( $post) {
    wp_nonce_field( '_hcf_meta_nonce', 'hcf_meta_nonce' ); ?>

    <table class="form-table">
      <tbody>

        <tr class="form-field">
          <th scope="row">
              <label for="collection-subtitle">Sub Title</label>
          </th>
          <td>
  					<input id="collection-subtitle" type="text" name="collection-subtitle" value="<?php echo get_post_meta( get_the_ID(), 'collection-subtitle', true ); ?>">
          </td>
        </tr>

        <tr class="form-field">
          <th scope="row">
              <label for="collection-detail">Detail</label>
          </th>
          <td>
            <?php wp_editor( get_post_meta( get_the_ID(), 'collection-detail', true ), 'collection-detail', array( 'textarea_rows' =>5,	'media_buttons' => false,	'tinymce'          => array(
              'wpautop'               => false,
              'wp_autoresize_on'      => true,
              'toolbar1'              => 'bold,italic,underline,link,unlink,bullist',
              'toolbar2'              => '',
            ),) ); ?>
          </td>
        </tr>

      </tbody>

    </table>

  <?php }


  function get_meta_collection( $value ) {
    global $post;

    $field = get_post_meta( $post->ID, $value, true );
    if ( ! empty( $field ) ) {
      return is_array( $field ) ? stripslashes_deep( $field ) : stripslashes( wp_kses_decode_entities( $field ) );
    } else {
      return false;
    }
  }


  /**
   * Save meta box content.
   */
  function meta_save_collection( $post_id ) {

      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
      if ( $parent_id = wp_is_post_revision( $post_id ) ) {
          $post_id = $parent_id;
      }
      if ( ! isset( $_POST['hcf_meta_nonce'] ) || ! wp_verify_nonce( $_POST['hcf_meta_nonce'], '_hcf_meta_nonce' ) ) return;

      $fields = [
		  'collection-subtitle',
		  'collection-detail'
      ];
      foreach ( $fields as $field ) {
          if ( array_key_exists( $field, $_POST ) ) {
            update_post_meta( $post_id, $field, $_POST[$field] );
          }

       }

  }
  add_action( 'save_post', 'meta_save_collection' );




function repeatable_meta_box_gallery_display() {
  global $post;
  $gallery = get_post_meta($post->ID, 'gallery', true);
  wp_nonce_field( 'hhs_repeatable_meta_box_nonce_gallery', 'hhs_repeatable_meta_box_nonce_gallery' );


  print_r(get_post_meta(get_queried_object_id(), 'gallery', true));

  ?>
  <style media="screen">
    .repeatable-item-wrapper {
      width: 100%;
      margin-bottom: 30px;
      float: left;
      position: relative;
    }

    .repeatable-item-label {
      width: 140px;
      display: table-cell;
      vertical-align: middle;
    }

    .repeatable-item-value {
      display: flex;
      flex-wrap: wrap;
      align-items: center;
      gap: 10px;
    }

    .repeatable-item {
      display: table;
      width: 100%;
      margin-bottom: 10px;
    }

    .button.remove-row {
      position: absolute;
      top: 0;
      right: 0;
    }
  </style>

  <script type="text/javascript">
  jQuery(document).ready(function( $ ){
    var i = $(".repeatable-item-ex").length - 1;

    $(document).on("click", "#add-row" , function() {
      var row = $( '.empty-row.screen-reader-text.group' ).clone(true);
          row.removeClass( 'empty-row screen-reader-text group' );
          row.insertBefore( '#repeatable-fieldset-one .repeatable-item-wrapper:last' );
          row.find( 'input[name="order[]"]' ).val(i);
      i++;
      return false;
    });

    $(document).on("click", ".remove-row" , function() {
      $(this).parents('.repeatable-item-wrapper').remove();
      return false;
    });

  });
  </script>

  <div id="repeatable-fieldset-one" width="100%">
    <?php

    $is = 0;
    if ( $gallery ) :
      sort($gallery);
      foreach ( $gallery as $field ) {
    ?>
      <div class="repeatable-item-wrapper repeatable-item-ex">
        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Order
          </div>
          <div class="repeatable-item-value">
            <input type="text" class="widefat" name="order[]" value="<?php if($field['order'] != '') echo esc_attr( $field['order'] ); ?>"  style="width: 50px" />
          </div>
        </div>

        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Images
          </div>
          <div class="repeatable-item-value">
            <input name="images[]" class="images" type="hidden" value="<?php if($field['images'] != '') echo esc_attr( $field['images'] ); ?>"  />
            <img class="meta-image-preview" src="<?php if($field['images'] != '') echo esc_attr( $field['images'] ); ?>" alt="" width="100px;">
            <input class="images_button button button-small" type="button" value="Upload Image" />

          </div>
        </div>

        <a class="button remove-row" href="#">Remove</a>

      </div>

    <?php
    $is++;
    }
    else :
    // show a blank one
    ?>
      <div class="repeatable-item-wrapper repeatable-item-ex">
        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Order
          </div>
          <div class="repeatable-item-value">
            <input type="text" class="widefat" name="order[]" value="<?= $is; ?>" style="width: 50px"/>
          </div>
        </div>

        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Images
          </div>
          <div class="repeatable-item-value">
            <input name="images[]" class="images" type="hidden"  />
            <input class="images_button button button-small" type="button" value="Upload Image" /><br/>
            <img class="meta-image-preview" src="<?php if($field['images'] != '') echo esc_attr( $field['images'] ); ?>" alt="" width="100px;">
          </div>
        </div>

        <a class="button remove-row" href="#">Remove</a>

      </div>


    <?php endif; ?>

    <!-- empty hidden one for jQuery -->
    <div class="repeatable-item-wrapper repeatable-item-ex empty-row screen-reader-text group">

      <div class="repeatable-item">
        <div class="repeatable-item-label">
          Order
        </div>
        <div class="repeatable-item-value">
          <input type="text" class="widefat" name="order[]" style="width: 50px"/>
        </div>
      </div>


      <div class="repeatable-item">
        <div class="repeatable-item-label">
          Images
        </div>
        <div class="repeatable-item-value">
          <input name="images[]" class="images" type="hidden"  />
          <input class="images_button button button-small" type="button" value="Upload Image" /><br/>
          <img class="meta-image-preview" src="" alt="" width="100px;">
        </div>
      </div>

      <a class="button remove-row" href="#">Remove</a>

    </div>

  </div>

  <hr>
  <hr>

  <p><a id="add-row" class="button" href="#">Add another</a></p>

  <script>
  jQuery(document).ready( function($) {

    jQuery('.images_button').click(function() {

      var div = $(this).parent();
      var send_attachment_bkp = wp.media.editor.send.attachment;
      wp.media.editor.send.attachment = function(props, attachment) {
        console.log(div);
        jQuery(div).find('.images').val(attachment.url);
        jQuery(div).find('.meta-image-preview').attr('src',attachment.url);
        wp.media.editor.send.attachment = send_attachment_bkp;
      }

      wp.media.editor.open();
      return false;
    }); // End on click



  });
  </script>

  <?php
}


function repeatable_meta_box_gallery_save($post_id) {
    if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce_gallery'] ) ||
    ! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce_gallery'], 'hhs_repeatable_meta_box_nonce_gallery' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'gallery', true);
    $new = array();

    $order = $_POST['order'];
    $images = $_POST['images'];

    $count = count( $order );

    for ( $i = 0; $i < $count; $i++ ) {
      if ( $images[$i] != '' ) :
        $new[$i]['order'] = stripslashes( strip_tags( $order[$i] ) );

        $new[$i]['images'] = stripslashes( strip_tags( $images[$i] ) );
      endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'gallery', $new );

    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'gallery', $old );
}
add_action('save_post', 'repeatable_meta_box_gallery_save');

?>
