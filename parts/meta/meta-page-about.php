<?php
add_action('add_meta_boxes', 'add_about_meta');
function add_about_meta()
{
    global $post;

    if(!empty($post))
    {
        $pageTemplate = get_post_meta($post->ID, '_wp_page_template', true);
        if($pageTemplate == 'templates/page-about.php' )
        {
          add_meta_box( 'repeatable-fields', 'About Item', 'repeatable_meta_box_about_item_display', 'page', 'normal', 'default');
        }
    }
}


function repeatable_meta_box_about_item_display() {
    global $post;
    $about_item = get_post_meta($post->ID, 'about_item', true);
    wp_nonce_field( 'hhs_repeatable_meta_box_nonce_about_item', 'hhs_repeatable_meta_box_nonce_about_item' );


    print_r(get_post_meta(get_queried_object_id(), 'about_item', true));

    ?>
    <style media="screen">
      .repeatable-item-wrapper {
        width: 100%;
        margin-bottom: 20px;
        float: left;
      }

      .repeatable-item-label {
        width: 140px;
        display: table-cell;
        vertical-align: middle;
      }

      .repeatable-item-value {
        display: table-cell;
      }

      .repeatable-item {
        display: table;
        width: 100%;
        margin-bottom: 10px;
      }
    </style>

  	<script type="text/javascript">
  	jQuery(document).ready(function( $ ){
      var i = $(".repeatable-item-ex").length - 1;

  		$( '#add-row' ).on('click', function() {
  			var row = $( '.empty-row.screen-reader-text.group' ).clone(true);
      			row.removeClass( 'empty-row screen-reader-text group' );
      			row.insertBefore( '#repeatable-fieldset-one .repeatable-item-wrapper:last' );
            row.find( 'input[name="order[]"]' ).val(i);
  			i++;
  			return false;
  		});

  		$( '.remove-row' ).on('click', function() {
  			$(this).parents('.repeatable-item-wrapper').remove();
  			return false;
  		});

  	});
  	</script>

    <div id="repeatable-fieldset-one" width="100%">
      <?php

      $is = 0;

      if ( $about_item ) :

        sort($about_item);
        foreach ( $about_item as $field ) {
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
              Title
            </div>
            <div class="repeatable-item-value">
              <input type="text" class="widefat" name="title[]" value="<?php if($field['title'] != '') echo esc_attr( $field['title'] ); ?>" />
            </div>
          </div>

          <div class="repeatable-item">
            <div class="repeatable-item-label">
              Sub Title
            </div>
            <div class="repeatable-item-value">
              <input type="text" class="widefat" name="sub_title[]" value="<?php if($field['sub_title'] != '') echo esc_attr( $field['sub_title'] ); ?>" />
            </div>
          </div>

          <div class="repeatable-item">
            <div class="repeatable-item-label">
              Images
            </div>
            <div class="repeatable-item-value">
              <input name="images[]" class="images" type="hidden" value="<?php if($field['images'] != '') echo esc_attr( $field['images'] ); ?>"  />
              <br>
              <img class="meta-image-preview" src="<?php if($field['images'] != '') echo esc_attr( $field['images'] ); ?>" alt="" width="200px;">
              <br>
              <input class="images_button button button-small" type="button" value="Upload Image" /><br/>

            </div>
          </div>

          <div class="repeatable-item">
						<div class="repeatable-item-label">
							Description
						</div>
						<div class="repeatable-item-value">
            <?php 
              $desc_value =  $field['description'];
              $desc_value = (empty($desc_value))? '': $desc_value;
              wp_editor( $desc_value, 'description_'. $is , array( 
                'wpautop'               => false,
                'textarea_rows'         =>5,	
                'media_buttons'         => true,	
                'textarea_name'         =>'description[]',
                'tinymce'               => array(
                  'toolbar1'              => 'bold,italic,underline,link,unlink,bullist',
                  'toolbar2'              => '',
                ),
              ) ); 
            ?>
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
              <input type="text" class="widefat" name="order[]" value="<?php echo $is; ?>" style="width: 50px"/>
            </div>
          </div>

          <div class="repeatable-item">
            <div class="repeatable-item-label">
              Title
            </div>
            <div class="repeatable-item-value">
              <input type="text" class="widefat" name="title[]"/>
            </div>
          </div>

          <div class="repeatable-item">
            <div class="repeatable-item-label">
              Sub Title
            </div>
            <div class="repeatable-item-value">
              <input type="text" class="widefat" name="sub_title[]"/>
            </div>
          </div>

          <div class="repeatable-item">
            <div class="repeatable-item-label">
              Images
            </div>
            <div class="repeatable-item-value">
              <input name="images[]" class="images" type="hidden"  />
              <input class="images_button button button-small" type="button" value="Upload Image" /><br/>
              <br>
              <img class="meta-image-preview" src="" alt="" width="200px;">
              <br>
            </div>
          </div>

          <div class="repeatable-item">
						<div class="repeatable-item-label">
							Description
						</div>
						<div class="repeatable-item-value">
            <?php 
              $desc_value =  $field['description'];
              $desc_value = (empty($desc_value))? '': $desc_value;
              wp_editor( $desc_value, 'description_'. $is , array( 
                'wpautop'               => false,
                'textarea_rows'         =>5,	
                'media_buttons'         => true,	
                'textarea_name'         =>'description[]',
                'tinymce'               => array(
                  'toolbar1'              => 'bold,italic,underline,link,unlink,bullist',
                  'toolbar2'              => '',
                ),
              ) ); 
            ?>
						</div>
					</div>

          <a class="button remove-row" href="#">Remove</a>

        </div>


      <?php endif; ?>

      <!-- empty hidden one for jQuery -->
      <div class="repeatable-item-wrapper empty-row repeatable-item-ex screen-reader-text group">

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
            Title
          </div>
          <div class="repeatable-item-value">
            <input type="text" class="widefat" name="title[]"/>
          </div>
        </div>

        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Sub Title
          </div>
          <div class="repeatable-item-value">
            <input type="text" class="widefat" name="sub_title[]"/>
          </div>
        </div>

        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Images
          </div>
          <div class="repeatable-item-value">
            <input name="images[]" class="images" type="hidden"  />
            <input class="images_button button button-small" type="button" value="Upload Image" /><br/>
            <br>
            <img class="meta-image-preview" src="" alt="" width="200px;">
            <br>
          </div>
        </div>

        <div class="repeatable-item">
          <div class="repeatable-item-label">
            Description
          </div>
          <div class="repeatable-item-value">
            <textarea class="widefat" name="description[]" rows="10"></textarea>
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



function repeatable_meta_box_about_item_save($post_id) {
    if ( ! isset( $_POST['hhs_repeatable_meta_box_nonce_about_item'] ) ||
    ! wp_verify_nonce( $_POST['hhs_repeatable_meta_box_nonce_about_item'], 'hhs_repeatable_meta_box_nonce_about_item' ) )
        return;

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return;

    if (!current_user_can('edit_post', $post_id))
        return;

    $old = get_post_meta($post_id, 'about_item', true);
    $new = array();

    $order = $_POST['order'];
    $title = $_POST['title'];
    $sub_title = $_POST['sub_title'];
    $images = $_POST['images'];
    $description = $_POST['description'];

    $count = count( $title );

    for ( $i = 0; $i < $count; $i++ ) {
      if ( $title[$i] != '' ) :
        $new[$i]['order'] = stripslashes( strip_tags( $order[$i] ) );
        $new[$i]['title'] = stripslashes( strip_tags( $title[$i] ) );
        $new[$i]['sub_title'] = stripslashes( strip_tags( $sub_title[$i] ) );
        $new[$i]['description'] = stripslashes($description[$i] );

        $new[$i]['images'] = stripslashes( strip_tags( $images[$i] ) );
      endif;
    }
    if ( !empty( $new ) && $new != $old )
        update_post_meta( $post_id, 'about_item', $new );

    elseif ( empty($new) && $old )
        delete_post_meta( $post_id, 'about_item', $old );
}
add_action('save_post', 'repeatable_meta_box_about_item_save');
 ?>
