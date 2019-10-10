  <section id="affiliations">
    <div class="container">
      <ul>
        <?php if(have_rows('affiliations', 'option')): while(have_rows('affiliations', 'option')): the_row(); ?>
          <li>
            <?php 
              $affiliate_img = get_sub_field('affiliate_image');
              if($affiliate_img): ?>
                <img src="<?php echo $affiliate_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($affiliate_img['alt']); ?>" />
            <?php endif; ?>
          </li>
        <?php endwhile; endif; ?>

        <?php 
          $join_labp_title = get_field('join_labp_title', 'option');
          $join_labp_subtitle = get_field('join_labp_subtitle', 'option');
          $join_labp_link = get_field('join_labp_link', 'option');

          if($join_labp_title || $join_labp_subtitle || $join_labp_link): ?>
            <li>
              <div class="join">
                <?php if($join_labp_title): ?>
                  <h2><?php echo esc_html($join_labp_title); ?></h2>
                <?php endif; if($join_labp_subtitle): ?>
                  <p><?php echo esc_html($join_labp_subtitle); ?></p>
                <?php endif; if($join_labp_link): ?>
                  <a href="<?php echo esc_url($join_labp_link['url']); ?>" class="btn-main"><?php echo esc_url($join_labp_link); ?></a>
                <?php endif; ?>
              </div>
            </li>
        <?php endif; ?>
      </ul>
    </div>
  </section>

  <?php
    $free_guide_content = get_field('free_guide_section_content', 'option');
    if($free_guide_content): ?>
      <section id="free-guide">
        <div class="container">
          <?php echo apply_filters('the_content', wp_kses_post($free_guide_content)); ?>
          <?php 
            $free_guide_link = get_field('free_guide_section_link', 'option');
            if($free_guide_link): ?>
              <a href="<?php echo esc_url($free_guide_link['url']); ?>" class="btn-main btn-clear"><?php echo esc_html($free_guide_link['title']); ?></a>
          <?php endif; ?>
        </div>
      </section>
  <?php endif; ?>

  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-5">
          <div class="social">
            <h3><?php echo esc_html__('Stay Connected', 'option'); ?></h3>
            <?php 
              $facebook = get_field('facebook', 'option');
              $twitter = get_field('twitter', 'option');
              $instagram = get_field('instagram', 'option');
              $youtube = get_field('youtube', 'option');
            ?>
            <?php if($facebook): ?>
              <a href="<?php echo esc_url($facebook); ?>" class="facebook" title="Facebook" target="_blank"><i class="fab fa-facebook"></i><span class="sr-only">Facebook</span></a>
            <?php endif; if($twitter): ?>
              <a href="<?php echo esc_url($twitter); ?>" class="twitter" title="Twitter" target="_blank"><i class="fab fa-twitter"></i><span class="sr-only">Twitter</span></a>
            <?php endif; if($instagram): ?>
              <a href="<?php echo esc_url($instagram); ?>" class="instagram" title="Instagram" target="_blank"><i class="fab fa-instagram"></i><span class="sr-only">Instagram</span></a>
            <?php endif; if($youtube): ?>
              <a href="<?php echo esc_url($youtube); ?>" class="youtube" title="YouTube" target="_blank"><i class="fab fa-youtube"></i><span class="sr-only">YouTube</span></a>
            <?php endif; ?>
          </div>

          <?php
            $address = get_field('address', 'option');
            $email = get_field('email', 'option');
          ?>
          <p class="contact">
            <?php echo esc_html($address); ?><br /><a href="mailto:<?php echo esc_attr($email); ?>"><?php echo esc_html($email); ?></a>
          </p>
          <p class="copyright">
            &copy;<?php echo date('Y'); ?> <?php echo esc_html(bloginfo('name')); ?><br />Website created by <a href="https://childressagency.com" target="_blank">Childress Agency</a>
          </p>
        </div>
        <div class="col-lg-7">
          <?php echo do_shortcode(get_field('footer_contact_form_shortcode')); ?>
        </div>
      </div>
    </div>
  </footer>
  <?php wp_footer(); ?>
</body>
</html>