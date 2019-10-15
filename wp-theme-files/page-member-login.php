<?php get_header(); ?>
<main id="main">
  <div class="container">
    <section class="entry-content">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo get_stylesheet_directory_uri(); ?>/images/logo.png" class="img-fluid d-block mx-auto mt-4" alt="Lake Anna Business Partnership Logo" />
        </div>
        <div class="col-md-8">
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
        </div>
      </div>
    </section>
  </div>
</main>
<?php get_footer();