<?php get_header(); ?>
<?php
  $blog_page = get_page_by_path('blog-news');
  $blog_page_id = $blog_page->ID;
  $news_cat_id = '';
?>
  <main id="main">
    <div class="container">
      <section id="news">
        <div class="row">
          <div class="col-lg-6">
            <article>
              <?php echo apply_filters('the_content', wp_kses_post(get_field('news_section_intro', $blog_page_id))); ?>
            </article>
          </div>
          <div class="col-lg-6">
            <?php
              $news_section_intro_img = get_field('news_section_intro_image', $blog_page_id);
              if($news_section_intro_img): ?>
                <div class="border-box-right">
                  <img src="<?php echo esc_url($news_section_intro_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($news_section_intro_img['alt']); ?>" />
                </div>
            <?php endif; ?>
          </div>
        </div>

        <?php
          $recent_news = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'post_status' => 'publish',
            'category_name' => 'news'
          ));

          if($recent_news->have_posts()): ?>
            <div class="row">
              <div id="news-carousel" class="carousel slide two-item carousel-heights" data-ride="">
                <div class="carousel-inner">
                  <?php $n = 0; while($recent_news->have_posts()): $recent_news->the_post(); ?>

                    <div class="carousel-item<?php if($n == 0){ echo ' active'; } ?>">
                      <div class="col-md-6">
                        <?php get_template_part('partials/loop', 'blog'); ?>
                      </div>
                    </div>

                  <?php $n++; endwhile; wp_reset_postdata(); ?>
                </div>

                <a href="#news-carousel" class="carousel-control-prev" role="button" data-slide="prev">
                  <i class="fas fa-chevron-left" aria-hidden="true"></i>
                  <span class="sr-only"><?php echo esc_html__('Previous', 'labp'); ?></span>
                </a>
                <a href="#news-carousel" class="carousel-control-next" role="button" data-slide="next">
                  <i class="fas fa-chevron-right" aria-hidden="true"></i>
                  <span class="sr-only"><?php echo esc_html__('Next', 'labp'); ?></span>
                </a>
              </div>
            </div>

            <?php
              $news_cat_id = get_cat_ID('news');
              $news_cat_link = get_category_link($news_cat_id);
            ?>
            <a href="<?php echo esc_url($news_cat_link); ?>" class="btn-main mt-5"><?php echo esc_html__('All News', 'labp'); ?></a>
        <?php endif; ?>
      </section>

      <section id="blog-archive">
        <div class="row">
          <div class="col-lg-6">
            <?php
              $blog_section_intro_img = get_field('blog_section_intro_image', $blog_page_id);
              if($blog_section_intro_img): ?>
                <div class="border-box-left">
                  <img src="<?php echo esc_url($blog_section_intro_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($blog_section_intro_img['alt']); ?>" />
                </div>
            <?php endif; ?>
          </div>
          <div class="col-lg-6">
            <article>
              <?php echo apply_filters('the_content', wp_kses_post(get_field('blog_section_intro', $blog_page_id))); ?>
            </article>
          </div>
        </div>

      <?php echo do_shortcode('[ajax_load_more container_type="div" transition_container_classes="row" posts_per_page="6" scroll="false" post_type="post" button_label="View More" category__not_in="2"]'); ?>
      </section>
    </div>
  </main>
<?php get_footer();