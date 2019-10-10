<?php get_header(); ?>
<?php
  $blog_page = get_page_by_path('blog-news');
  Blog_page_id = $blog_page->ID;
?>
  <main id="main">
    <div class="container">
      <section id="news">
        <div class="row">
          <div class="col-lg-6">
            <article>
              <?php echo apply_filters('the_content', wp_kses_post(get_field('blog_page_intro', $blog_page_id))); ?>
            </article>
          </div>
          <div class="col-lg-6">
            <?php
              $blog_page_intro_img = get_field('blog_page_intro_image', $blog_page_id);
              if($blog_page_intro_img): ?>
                <div class="border-box-right">
                  <img src="<?php echo esc_url($blog_page_intro_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($blog_page_intro_img['alt']); ?>" />
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
                  <span class="sr-only">Previous</span>
                </a>
                <a href="#news-carousel" class="carousel-control-next" role="button" data-slide="next">
                  <i class="fas fa-chevron-right" aria-hidden="true"></i>
                  <span class="sr-only">Next</span>
                </a>
              </div>
            </div>

            <a href="#" class="btn-main mt-5">All News</a>
        <?php endif; ?>
      </section>

      <section id="blog">
        <div class="row">
          <div class="col-lg-6">
            <div class="border-box-left">
              <img src="../wp-theme-files/images/lake-dock.jpg" class="img-fluid d-block mx-auto" alt="" />
            </div>
          </div>
          <div class="col-lg-6">
            <article>
              <h2>Lake Anna Blog</h2>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
            </article>
          </div>
        </div>

        <div id="blog-loop" class="row">
          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="../wp-theme-files/images/people-at-picnic-table.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h3 class="card-title">Blog Title 1</h3>
                <p class="card-subtitle">April 4, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
                <a href="#" class="read-more">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="../wp-theme-files/images/beerfest.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h3 class="card-title">Blog Title 2</h3>
                <p class="card-subtitle">April 2, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
                <a href="#" class="read-more">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="clearfix d-none d-md-block d-lg-none"></div>

          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="../wp-theme-files/images/raft-rental.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h3 class="card-title">Blog Title 3</h3>
                <p class="card-subtitle">March 28, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
                <a href="#" class="read-more">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="clearfix d-none d-lg-block"></div>

          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="../wp-theme-files/images/two-people-restaurant.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h3 class="card-title">Blog Title 4</h3>
                <p class="card-subtitle">March 22, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
                <a href="#" class="read-more">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="../wp-theme-files/images/on-microphone.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h3 class="card-title">Blog Title 5</h3>
                <p class="card-subtitle">March 17, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
                <a href="#" class="read-more">READ MORE</a>
              </div>
            </div>
          </div>

          <div class="clearfix d-none d-md-block d-lg-none">

          <div class="col-md-6 col-lg-4">
            <div class="card">
              <img src="../wp-theme-files/images/band-playing.jpg" class="card-img-top" alt="" />
              <div class="card-body">
                <h3 class="card-title">Blog Title 6</h3>
                <p class="card-subtitle">March 08, 2019</p>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus pulvinar dui nec sodales tempus. Aliquam et nulla vel lacus sodales faucibus. Phasellus est est, auctor ac pharetra vitae, congue in sapien. Aliquam purus lacus, tincidunt sit amet.</p>
                <a href="#" class="read-more">READ MORE</a>
              </div>
            </div>
          </div>
        </div>

        <div class="ajax-pagination"></div>
      </section>
    </div>
  </main>
<?php get_footer();