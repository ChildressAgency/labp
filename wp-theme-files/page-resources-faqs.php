<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <?php if(have_rows('resources')): ?>
        <section id="resources">
          <div class="row">
            <div class="col-lg-6">
              <h2><?php echo esc_html__('Resources', 'labp'); ?></h2>
              <ul class="resource-list">
                <?php while(have_rows('resources')): the_row(); ?>
                  <li>
                    <h3><?php the_sub_field('resource_title'); ?></h3>
                    <?php $resource_link = get_sub_field('resource_link'); ?>
                    <a href="<?php echo esc_url($resource_link['url']); ?>"><?php echo esc_html($resource_link['title']); ?></a>
                  </li>
                <?php endwhile; ?>
              </ul>
            </div>
            <div class="col-lg-6">
              <?php 
                $resource_section_image = get_field('resource_section_image');
                if($resource_section_image): ?>
                  <div class="border-box-right">
                    <img src="<?php echo esc_url($resource_section_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($resource_section_image['alt']); ?>" />
                  </div>
              <?php endif; ?>
            </div>
          </div>
        </section>
      <?php endif; ?>

      <?php if(have_rows('faq_sections')): ?>
        <section id="faqs">
          <h2><?php echo esc_html__('FAQ\'s', 'labp'); ?></h2>
          <div class="row">
            <div class="col-lg-6">
              <?php while(have_rows('faq_sections')): the_row(); ?>

                <section class="faq-section">
                  <?php
                    $faq_section_title = get_sub_field('faq_section_title');
                    $faq_section_title_slug = sanitize_title($faq_section_title);
                  ?>
                  <h3><?php echo esc_html($faq_section_title); ?></h3>
                  <?php if(have_rows('faqs')): ?>

                    <div id="<?php echo esc_attr($faq_section_title_slug); ?>" class="accordion">
                      <?php $i = 0; while(have_rows('faqs')): the_row(); ?>

                        <div class="card">
                          <?php 
                            $question_id = $faq_section_title_slug . '-question-' . $i;
                            $answer_id = $faq_section_title_slug . '-answer-' . $i;
                          ?>
                          <div id="<?php echo esc_attr($question_id); ?>" class="card-header">
                            <h4>
                              <a href="#<?php echo esc_attr($answer_id); ?>" class="collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="<?php echo esc_attr($answer_id); ?>"><?php the_sub_field('question'); ?></a>
                            </h4>
                          </div>
                          <div id="<?php echo esc_attr($answer_id); ?>" class="collapse" aria-labelledby="<?php echo esc_attr($question_id); ?>" data-parent="#<?php echo esc_attr($faq_section_title_slug); ?>">
                            <div class="card-body">
                              <?php the_sub_field('answer'); ?>
                            </div>
                          </div>
                        </div>

                      <?php $i++; endwhile; ?>
                    </div>
                  <?php endif; ?>
                </section>

              <?php endwhile; ?>
            </div>
            <div class="col-lg-6">
              <?php 
                $faq_section_image = get_field('faq_section_image');
                if($faq_section_image): ?>
                  <div class="border-box-right">
                    <img src="<?php echo esc_url($faq_section_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($faq_section_image['alt']); ?>" />
                  </div>
              <?php endif; ?>
            </div>
          </div>
        </section>
      <?php endif; ?>
    </div>
  </main>
<?php get_footer();