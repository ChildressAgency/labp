<div class="card blog-loop-item">
  <?php
    if(has_post_thumbnail()){
      $blog_post_id = get_the_ID();
      $featured_img_url = get_the_post_thumbnail_url($blog_post_id, 'full');
      $featured_img_id = get_post_thumbnail_id($blog_post_id);
      $featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);
    }
  ?>
  <img src="<?php echo esc_url($featured_img_url); ?>" class="card-img-top" alt="<?php echo esc_attr($featured_img_alt); ?>" />
  <div class="card-body">
    <h3 class="card-title"><?php the_title(); ?></h3>
    <p class="card-subtitle"><?php echo get_the_date('F d, Y'); ?></p>
    <?php the_excerpt(); ?>
    <a href="<?php the_permalink(); ?>" class="read-more"><?php echo esc_html__('READ MORE', 'option'); ?></a>
  </div>
</div>
