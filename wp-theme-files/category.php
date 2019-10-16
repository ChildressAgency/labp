<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section id="blog-archive">
      <?php $cur_cat = get_queried_object(); ?>
      <h2><?php echo esc_html($cur_cat->name); ?></h2>

      <?php echo do_shortcode('[ajax_load_more container_type="div" transition_container_classes="row" posts_per_page="6" scroll="false" post_type="post" button_label="View More" category="' . $cur_cat->slug . '"]'); ?>
    </section>
  </div>
</main>
<?php get_footer();