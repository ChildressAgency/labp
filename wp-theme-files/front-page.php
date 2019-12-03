<?php get_header(); ?>
  <main id="main">

    <?php if(have_rows('featured_events')): ?>
      <?php 
        $first_event_date = '';
        $first_event_desc = '';
        $first_event_link = '';
      ?>
      <section id="featured-events">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="small-gallery border-box-left">
                <div id="featured-events-carousel" class="carousel slide carousel-heights" data-ride="carousel">
                  <div class="carousel-inner">
                    <?php $e = 0; while(have_rows('featured_events')): the_row(); ?>

                      <?php 
                        if($e == 0){
                          $first_event_date = get_sub_field('featured_event_date');
                          $first_event_desc = get_sub_field('featured_event_description');
                          $first_event_link = get_sub_field('featured_event_link');
                        }
                      ?>
                      <div class="carousel-item<?php if($e == 0){ echo ' active'; } ?>" data-event_date="<?php echo esc_attr(get_sub_field('featured_event_date')); ?>" data-event_desc="<?php echo wp_kses_post(get_sub_field('featured_event_description')); ?>" data-event_link="<?php echo esc_url(get_sub_field('featured_event_link')); ?>">
                        <?php $featured_event_img = get_sub_field('featured_event_image'); ?>
                        <img src="<?php echo esc_url($featured_event_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($featured_event_img['alt']); ?>" />
                      </div>

                    <?php $e++; endwhile; ?>

                </div>

                <a href="#featured-events-carousel" class="carousel-control-prev" role="button" data-slide="prev">
                  <i class="fas fa-chevron-left" aria-hidden="true"></i>
                  <span class="sr-only"><?php echo esc_html__('Previous', 'labp'); ?></span>
                </a>
                <a href="#featured-events-carousel" class="carousel-control-next" role="button" data-slide="next">
                  <i class="fas fa-chevron-right" aria-hidden="true"></i>
                  <span class="sr-only"><?php echo esc_html__('Next', 'labp'); ?></span>
                </a>
              </div>
            </div>
          </div>
          <div class="col-lg-6">
            <h2><?php echo esc_html__('Featured Events', 'labp'); ?></h2>
            <article id="featured-event">
              <h4 class="subtitle"><?php echo esc_html($first_event_date); ?></h4>
              <?php echo wp_kses_post($first_event_desc); ?>
              <a href="<?php echo esc_url($first_event_link); ?>" class="read-more"><?php echo esc_html__('READ MORE', 'labp'); ?></a>
            </article>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>

    <section id="social-feed">
      <div class="container">
        <div class="row">
          <div class="col-lg-5">
            <article>
              <?php the_field('social_media_section_content'); ?>
            </article>
          </div>
          <div class="col-lg-7">
            <?php
              $facebook_feed_shortcode = get_field('facebook_feed_shortcode'); 
              if($facebook_feed_shortcode){
                echo do_shortcode($facebook_feed_shortcode);
              }
              else{
                echo '<img src="' . get_stylesheet_directory_uri() . '/images/facebook-stream-placeholder.jpg" class="img-fluid d-block" alt="Facebook Feed Placeholder" />';
              }
            ?>
          </div>
        </div>
      </div>
    </section>

    <?php if(have_rows('where_to_stay')): ?>
      <?php
        $first_stay_location = '';
        $first_stay_desc = '';
        $first_stay_link = '';
      ?>
      <section id="where-to-stay-section">
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="small-gallery border-box-right">
                <div id="where-to-stay-carousel" class="carousel slide" data-ride="">
                  <div class="carousel-inner">
                    <?php $s = 0; while(have_rows('where_to_stay')): the_row(); ?>

                      <?php
                        if($s == 0){
                          $first_stay_location = get_sub_field('where_to_stay_location');
                          $first_stay_desc = get_sub_field('where_to_stay_description');
                          $first_stay_link = get_sub_field('where_to_stay_link');
                        }
                      ?>
                      <div class="carousel-item<?php if($s == 0){ echo ' active'; } ?>" data-stay_location="<?php echo wp_kses_post(get_sub_field('where_to_stay_location')); ?>" data-stay_description="<?php echo wp_kses_post(get_sub_field('where_to_stay_description')); ?>" data-stay_link="<?php echo esc_url(get_sub_field('where_to_stay_link')); ?>">
                        <?php $where_to_stay_img = get_sub_field('where_to_stay_image'); ?>
                        <img src="<?php echo esc_url($where_to_stay_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($where_to_stay_img['alt']); ?>" />
                      </div>
                    
                    <?php $s++; endwhile; ?>
                  </div>

                  <a href="#where-to-stay-carousel" class="carousel-control-prev" role="button" data-slide="prev">
                    <i class="fas fa-chevron-left" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo esc_html__('Previous', 'labp'); ?></span>
                  </a>
                  <a href="#where-to-stay-carousel" class="carousel-control-next" role="button" data-slide="next">
                    <i class="fas fa-chevron-right" aria-hidden="true"></i>
                    <span class="sr-only"><?php echo esc_html__('Next', 'labp'); ?></span>
                  </a>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h2><?php echo esc_html__('Where to Stay', 'labp'); ?></h2>
              <article id="where-to-stay">
                <h4 class="subtitle"><?php echo esc_html($first_stay_location); ?></h4>
                <?php echo wp_kses_post($first_stay_desc); ?>
                <a href="<?php echo esc_url($first_stay_link); ?>" class="btn-main"><?php echo esc_html__('Map & Directions', 'labp'); ?></a>
              </article>
            </div>
          </div>
        </div>
      </section>
    <?php endif; ?>

  </main>
<?php get_footer();