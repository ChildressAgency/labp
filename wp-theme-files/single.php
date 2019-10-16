<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="entry-content">
      <article>
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
          <header class="article-header">
            <?php
              if(has_post_thumbnail()){
                $blog_post_id = get_the_ID();
                $featured_img_url = get_the_post_thumbnail_url($blog_post_id, 'full');
                $featured_img_id = get_post_thumbnail_id($blog_post_id);
                $featured_img_alt = get_post_meta($featured_img_id, '_wp_attachment_image_alt', true);

                echo '<img src="' . esc_url($featured_img_url) . '" class="aligncenter" alt="' . esc_attr($featured_img_alt) . '" />';
              }
            ?>
            <h2><?php the_title(); ?></h2>
            <p class="subtitle"><?php echo get_the_date('F j, Y'); ?></p>
          </header>
          <?php the_content(); ?>
          <nav class="blog-pager">
              <ul class="pager">
                  <li class="previous">
                      <?php previous_post_link('%link', '&larr; Previous Post'); ?>
                  </li>
                  <li class="next">
                      <?php next_post_link('%link', 'Next Post &rarr;'); ?>
                  </li>
              </ul>
          </nav>          
        <?php endwhile; endif; ?>
      </article>
    </section>
  </div>
</main>
<?php get_footer();