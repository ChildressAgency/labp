<?php
  $image = get_field('border_offset_image');
  if($image): ?>
    <div class="border-box-left">
      <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($image['alt']); ?>" />
    </div>
<?php endif; ?>