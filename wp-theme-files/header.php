<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <meta http-equiv="cache-control" content="public">
  <meta http-equiv="cache-control" content="private">

  <title><?php echo esc_html(bloginfo('name')); ?></title>

  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <header id="header">
    <?php 
      $masthead_bg_img = get_field('masthead_background_image', 'option'); 
      $masthead_bg_img_position = get_field('masthead_background_image_position', 'option');
    ?>
    <div class="masthead" style="background-image:url(<?php echo esc_url($masthead_bg_img); ?>); background-position:<?php echo esc_attr($masthead_bg_img_position); ?>;">
      <div class="container">
        <?php
          $custom_logo_id = get_theme_mod('custom_logo');
          $logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');

          if(!has_custom_logo()){
            $logo_url = get_stylesheet_directory_uri() . '/images/logo-white.png';
          }
        ?>
        <a href="<?php echo esc_url(home_url()); ?>" class="logo">
          <img src="<?php echo esc_url($logo_url[0]); ?>" class="img-fluid d-block" alt="<?php echo esc_attr(bloginfo('name')); ?>" />
        </a>
      </div>
    </div>
    <nav id="header-nav" class="navbar navbar-light navbar-expand-lg">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle Navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <?php
          $header_nav_args = array(
            'theme_location' => 'header-nav',
            'menu' => '',
            'container' => 'div',
            'container_id' => 'navbar',
            'container_class' => 'collapse navbar-collapse justify-content-lg-center',
            'menu_id' => '',
            'menu_class' => 'navbar-nav',
            'echo' => true,
            'fallback_cb' => 'labp_header_fallback_menu',
            'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
            'depth' => 2,
            'walker' => new WP_Bootstrap_NavWalker()
          );
          wp_nav_menu($header_nav_args);
        ?>
      </div>
    </nav>
  </header>

  <?php if(get_field('choose_hero_style') == 'Page Title'): ?>
    <?php
      $hero_bg_img = get_field('hero_background_image');
      $hero_bg_img_position = get_field('hero_background_image_position');

      if(!$hero_bg_img){
        $hero_bg_img = get_field('default_hero_background_image', 'option');
        $hero_bg_img_position = get_field('default_hero_background_image_position', 'option');
      }
    ?>

    <section id="hero" class="hero" style="background-image:url(<?php echo esc_url($hero_bg_img); ?>); background-position:<?php echo esc_attr($hero_bg_img_position); ?>;">
      <div class="container">
        <div class="hero-caption">
          <?php if(is_home() || is_singular('post')): ?>
            <h1><?php echo esc_html__('Blog & News', 'labp'); ?></h1>
          <?php else: ?>
            <h1><?php echo esc_html(get_the_title()); ?></h1>
          <?php endif; ?>
        </div>
      </div>
      <div class="color-overlay"></div>
    </section>

  <?php else: ?>
    <?php
      $nav_hero_bg_img = get_field('nav_hero_background_image', 'option');
      $nav_hero_bg_img_position = get_field('nav_hero_background_image_position', 'option');
    ?>
    <section id="hero" class="hp-hero" style="background-image:url(<?php echo esc_url($nav_hero_bg_img); ?>); background-position:<?php echo esc_attr($nav_hero_bg_img_position); ?>;">
      <div class="row no-gutters">
        <div class="col-md-4 col-lg-3">
          <?php if(have_rows('hero_navigation', 'option')): ?>
            <nav class="hero-nav">
              <ul>
                <?php while(have_rows('hero_navigation', 'option')): the_row(); ?>
                  <?php
                    $menu_link = get_sub_field('menu_item_link');
                    global $post;
                    $cur_page_id = $post->ID;
                    $menu_link_id = get_sub_field('menu_item_link', false, false);
                  ?>
                  <li <?php if($cur_page_id == $menu_link_id){ echo ' class="active"'; } ?>><a href="<?php esc_url($menu_link['url']); ?>"><?php echo esc_html($menu_link['title']); ?></a></li>
                <?php endwhile; ?>
              </ul>
            </nav>
          <?php endif; ?>
        </div>
        <div class="col-md-8 col-lg-9">
          <div class="hero-caption">
            <?php
              $hero_caption_img = get_field('nav_hero_caption_img', 'option');
              if($hero_caption_img): ?>
                <img src="<?php echo esc_url($hero_caption_img['url']); ?>" class="img-fluid d-block mx-auto" alt="<?php echo esc_attr($hero_caption_img['alt']); ?>" />
            <?php endif; ?>
            <?php
              $hero_caption_title = get_field('nav_hero_caption_title', 'option');
              $hero_caption_subtitle = get_field('nav_hero_caption_subtitle', 'option');
              if($hero_caption_title): ?>
                <h1><?php echo esc_html($hero_caption_title); ?></h1>
            <?php endif; if($hero_caption_subtitle): ?>
              <p><?php echo esc_html($hero_caption_subtitle); ?></p>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
  <?php endif; ?>