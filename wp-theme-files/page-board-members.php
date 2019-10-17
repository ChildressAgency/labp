<?php get_header(); ?>
  <main id="main">
    <div class="container">
      <section id="board-members">
        <?php 
          if(have_posts()){
            while(have_posts()){
              the_post();
              the_content();
            }
          }
        ?>

        <?php
          $default_profile_image = get_field('default_profile_image');
          $president_name = get_field('board_president_name');
          if($president_name): ?>
            <div class="row board-president">
              <div class="col-md-4">
                <?php
                  $president_image = get_field('board_president_image');
                  if(!$president_image){
                    $president_image = $default_profile_image;
                  }
                ?>
                <img src="<?php echo esc_url($president_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($president_image['alt']); ?>" />
              </div>
              <div class="col-md-4">
                <div class="board-member">
                  <h3><?php echo esc_html($president_name); ?></h3>
                  <h4 class="board-member-title"><?php echo esc_html__('President', 'labp'); ?></h4>
                  <?php echo wp_kses_post(get_field('board_president_bio')); ?>
                </div>
              </div>
            </div>
        <?php endif; ?>

        <?php if(have_rows('board_members')): ?>
          <div class="row">
            <?php $b = 0; while(have_rows('board_members')): the_row(); ?>
              <?php if($b % 3 == 0){ echo '<div class="clearfix"></div>'; } ?>
              <div class="col-md-4">
                <div class="card board-member">
                  <?php 
                    $board_member_image = get_sub_field('board_member_image');
                    if(!$board_member_image){
                      $board_member_image = $default_profile_image;
                    }
                  ?>
                  <img src="<?php echo esc_url($board_member_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($board_member_image['alt']); ?>" />
                  <div id="board-member-<?php echo $b; ?>" class="card-header">
                    <h3>
                      <a href="#board-member-bio-<?php echo $b; ?>" data-toggle="collapse" aria-expanded="false" aria-controls="board-member-bio-<?php echo $b; ?>"><?php echo esc_html(get_sub_field('board_member_name')); ?></a>
                    </h3>
                    <?php 
                      $board_member_title = get_sub_field('board_member_title');
                      if($board_member_title): ?>
                        <h4 class="board-member-title"><?php echo esc_html($board_member_title); ?></h4>
                    <?php endif; ?>
                  </div>
                  <div id="board-member-bio-<?php echo $b; ?>" class="collapse" aria-labelledby="board-member-<?php echo $b; ?>" data-parent="#board-members">
                    <div class="card-body">
                      <?php echo wp_kses_post(get_sub_field('board_member_bio')); ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php $b++; endwhile; ?>
          </div>
        <?php endif; ?>
      </section>

      <?php if(have_rows('committee_chairs')): ?>
        <section id="committee-chairs">
          <h2 class="text-center"><?php echo esc_html__('Committee Chairs', 'labp'); ?></h2>
          <div class="row">
            <?php while(have_rows('committee_chairs')): the_row(); ?>
              <div class="col-md-6 col-lg-3">
                <h4 class="committee-title border-right"><?php echo esc_html(get_sub_field('committee_chair_title')); ?></h4>
                <?php if(have_rows('committee_chair_members')): while(have_rows('committee_chair_members')): the_row(); ?>
                  <div class="card board-member">
                    <?php 
                      $chair_member_image = get_sub_field('committee_chair_member_image');
                      if(!$chair_member_image){
                        $chair_member_image = $default_profile_image;
                      }
                    ?>
                    <img src="<?php echo esc_url($chair_member_image['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($chair_member_image['alt']); ?>" />
                    <div class="card-header">
                      <h3><?php echo esc_html(get_sub_field('committee_chair_member_name')); ?></h3>
                    </div>
                  </div>
                <?php endwhile; endif; ?>
              </div>
            <?php endwhile; ?>
          </div>
        </section>
      <?php endif; ?>

      <?php 
        $volunteer_section = get_field('volunteer_section');
        if($volunteer_section): ?>
          <section id="volunteer">
            <article>
              <?php echo apply_filters('the_content', wp_kses_post($volunteer_section)); ?>
              <?php
                $volunteer_link = get_field('volunteer_section_link');
                if($volunteer_link): ?>
                  <p class="text-center">
                    <a href="<?php echo esc_url($volunteer_link['url']); ?>" class="btn-main mt-4"><?php echo esc_html($volunteer_link['title']); ?></a>
                  </p>
              <?php endif; ?>
            </article>
          </section>
      <?php endif; ?>
    </div>
  </main>
<?php get_footer();