jQuery(document).ready(function($){

  var mediaUploader;
  window.field_id = '';

    $('.upload').click(function(e) {
      e.preventDefault();
      window.field_id = $(this).attr('field-id');
      window.field_url = $(this).attr('field-url');
    // If the uploader object has already been created, reopen the dialog
      if (mediaUploader) {
        mediaUploader.open();
      return;
    }

    // Extend the wp.media object
    mediaUploader = wp.media.frames.file_frame = wp.media({
      title: 'Choose Image',
      button: {
      text: 'Choose Image'
    }, multiple: false });

  // When a file is selected, grab the URL and set it as the text field's value
  mediaUploader.on('select', function() {
    attachment = mediaUploader.state().get('selection').first().toJSON();
    $('#'+window.field_id).val(attachment.url);
    $('#'+window.field_url).attr('src',attachment.url);
   });

   // Open the uploader dialog
   mediaUploader.open();
  });

});
