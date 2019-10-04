/*!
 * theme custom scripts
*/

jQuery(document).ready(function($){
  $('#featured-events-carousel').on('slide.bs.carousel', function(e){
    var $slide_content_container = $('#featured-event');
    var $new_slide = e.relatedTarget;
    var event_date = '<h4 class="subtitle">' + $($new_slide).data('event_date') + '</h4>';
    var event_desc = $($new_slide).data('event_desc');
    var event_link = $($new_slide).data('event_link');

    $slide_content_container.children().fadeOut('fast', function(){
      $(this).remove();
      $($slide_content_container).html(event_date + event_desc + event_link).fadeIn('fast');
    });
  });

  $('#where-to-stay-carousel').on('slide.bs.carousel', function(e){
    var $slide_content_container = $('#where-to-stay');
    var $new_slide = e.relatedTarget;
    var stay_location = '<h4 class="subtitle">' + $($new_slide).data('stay_location') + '</h4>';
    var stay_desc = $($new_slide).data('stay_description');
    var stay_link = $($new_slide).data('stay_link');

    $slide_content_container.children().fadeOut('fast', function(){
      $(this).remove();
      $($slide_content_container).html(stay_location + stay_desc + stay_link).fadeIn('fast');
    });
  });
});