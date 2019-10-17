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
          else{
            echo esc_html__('Sorry, we could not find what you were looking for.', 'labp');
          }
        ?>
      </article>
    </section>
  </div>
</main>
<?php get_footer();