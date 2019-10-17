<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="entry-content">
      <article>
        <?php
          if(have_posts()){
            while(have_posts()){
              the_post();
              the_content();
            }
          }
        ?>
      </article>
      <?php get_template_part('partials/membership_details'); ?>
    </section>
  </div>
</main>
<?php get_footer();