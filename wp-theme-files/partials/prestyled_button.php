<?php
  $link = get_field('button_link');
  if($link): ?>
    <a href="<?php echo esc_url($link['url']); ?>" class="btn-main"><?php echo esc_html($link['title']); ?></a>
<?php endif; ?>