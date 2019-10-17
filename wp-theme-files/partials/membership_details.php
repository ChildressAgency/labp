<?php  
  $membership_levels = get_field('membership_levels', 'option');
  if($membership_levels): ?>
    <section id="membership-details">
      <h2><?php echo esc_html__('MEMBERSHIP', 'labp'); ?></h2>
      <h4 class="subtitle mb-5"><?php echo esc_html__('Select a level:', 'labp'); ?></h4>
      <div class="row">
        <div class="col-md-3">
          <div id="membership-levels" class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
            <?php $t = 0; foreach($membership_levels as $level): ?>

              <a href="#membership-<?php echo $t; ?>" id="tab-<?php echo $t; ?>" class="nav-link<?php if($t == 0){ echo ' active'; } ?>" data-toggle="pill" role="tab" aria-controls="membership-<?php echo $t; ?>" aria-selected="<?php echo ($t == 0) ? 'true' : 'false'; ?>"><?php echo esc_html($level['membership_level_title']); ?></a>

            <?php $t++; endforeach; reset($membership_levels); ?>

          </div>
        </div>
        <div class="col-md-9">
          <div id="membership-level-details" class="tab-content">
            <?php $p = 0; foreach($membership_levels as $level): ?>

              <div id="membership-<?php echo $p; ?>" class="tab-pane fade<?php if($p == 0){ echo ' show active'; } ?>" role="tabpanel" aria-labelledby="tab-<?php echo $p; ?>">
                <h3><?php echo esc_html($level['membership_level_title']); ?> <?php echo esc_html__('Membership', 'labp'); ?></h3>
                <h4 class="subtitle"><?php echo esc_html($level['membership_level_price']); ?></h4>
                <?php echo apply_filters('the_content', wp_kses_post($level['membership_level_description'])); ?>
              </div>

            <?php $p++; endforeach; ?>

          </div>
        </div>
  </div>
</section>
<?php endif; ?>