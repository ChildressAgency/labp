<?php
add_action('wp_footer', 'show_template');
function show_template() {
	global $template;
	print_r($template);
}

add_action('wp_enqueue_scripts', 'jquery_cdn');
function jquery_cdn(){
  if(!is_admin()){
    wp_deregister_script('jquery');
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.3.1.min.js', false, null, true);
    wp_enqueue_script('jquery');
  }
}

add_action('wp_enqueue_scripts', 'labp_scripts');
function labp_scripts(){
  wp_register_script(
    'bootstrap-popper',
    'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js',
    array('jquery'),
    '',
    true
  );

  wp_register_script(
    'bootstrap-scripts',
    'https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js',
    array('jquery', 'bootstrap-popper'),
    '',
    true
  );

  wp_register_script(
    'labp-scripts',
    get_stylesheet_directory_uri() . '/js/custom-scripts.min.js',
    array('jquery', 'bootstrap-scripts'),
    '',
    true
  );

  wp_enqueue_script('bootstrap-popper');
  wp_enqueue_script('bootstrap-scripts');
  wp_enqueue_script('labp-scripts');
}

add_filter('script_loader_tag', 'labp_add_script_meta', 10, 2);
function labp_add_script_meta($tag, $handle){
  switch($handle){
    case 'jquery':
      $tag = str_replace('></script>', ' integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-popper':
      $tag = str_replace('></script>', ' integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>', $tag);
      break;

    case 'bootstrap-scripts':
      $tag = str_replace('></script>', ' integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>', $tag);
      break;
  }

  return $tag;
}

add_action('wp_enqueue_scripts', 'labp_styles');
function labp_styles(){
  wp_register_style(
    'google-fonts',
    'https://fonts.googleapis.com/css?family=Barlow+Condensed:300,400|Barlow:300,400,500,600,700&display=swap'
  );

  wp_register_style(
    'fontawesome',
    'https://use.fontawesome.com/releases/v5.6.3/css/all.css'
  );

  wp_register_style(
    'labp-css',
    get_stylesheet_directory_uri() . '/style.css'
  );

  wp_enqueue_style('google-fonts');
  wp_enqueue_style('fontawesome');
  wp_enqueue_style('labp-css');
}

add_filter('style_loader_tag', 'labp_add_css_meta', 10, 2);
function labp_add_css_meta($link, $handle){
  switch($handle){
    case 'fontawesome':
      $link = str_replace('/>', ' integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">', $link);
      break;
  }

  return $link;
}

add_action('after_setup_theme', 'labp_setup');
function labp_setup(){
  add_theme_support('post-thumbnails');
  //set_post_thumbnail_size(320, 320);

  add_theme_support(
    'custom-logo',
    array(
      'height' => 150,
      'width' => 145,
      'flex-height' => true,
      'flex-width' => true
    )
  );

  register_nav_menus(array(
    'header-nav' => 'Header Navigation',
  ));

  load_theme_textdomain('labp', get_stylesheet_directory_uri() . '/languages');

  add_theme_support('editor-styles');
  add_editor_style('style-editor.css');
}

require_once dirname(__FILE__) . '/includes/class-wp-bootstrap-navwalker.php';

function labp_header_fallback_menu(){ ?>
  <div id="navbar" class="collapse navbar-collapse justify-content-lg-center">
    <ul class="navbar-nav">
      <li class="nav-item<?php if(is_page('resources-faqs')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('resource-faqs')); ?>" class="nav-link"><?php echo esc_html__('Resources & Faqs', 'labp'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('partnerships')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('partnerships')); ?>" class="nav-link"><?php echo esc_html__('Partnerships', 'labp'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('directory')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('directory')); ?>" class="nav-link"><?php echo esc_html__('Directory', 'labp'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('join-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('join-us')); ?>" class="nav-link"><?php echo esc_html__('Join Us', 'labp'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('calendar')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('calendar')); ?>" class="nav-link"><?php echo esc_html__('Calendar', 'labp'); ?></a>
      </li>
      <li class="nav-item<?php if(is_home()){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('blog-news')); ?>" class="nav-link"><?php echo esc_html__('Blog & News', 'labp'); ?></a>
      </li>
      <li class="nav-item<?php if(is_page('contact-us')){ echo ' active'; } ?>">
        <a href="<?php echo esc_url(home_url('contact-us')); ?>" class="nav-link"><?php echo esc_html__('Contact Us', 'labp'); ?></a>
      </li>
    </ul>
  </div>
<?php }

add_filter('block_categories', 'labp_custom_block_category', 10, 2);
function labp_custom_block_category($categories, $post){
  return array_merge(
    $categories,
    array(
      array(
        'slug' => 'custom-blocks',
        'title' => esc_html__('Custom Blocks', 'labp'),
        'icon' => 'wordpress'
      )
    )
  );
}

add_action('acf/init', 'labp_register_blocks');
function labp_register_blocks(){
  if(function_exists('acf_register_block_type')){
    acf_register_block_type(array(
      'name' => 'img_left_offset_border',
      'title' => esc_html__('Image with Left Offset Border', 'labp'),
      'description' => esc_html__('Image with Left Offset Border', 'labp'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/img_left_offset_border.php',
      //'enqueue_style' => get_stylesheet_directory_uri() . '/partials/img_offset_border.css'
    ));

    acf_register_block_type(array(
      'name' => 'img_right_offset_border',
      'title' => esc_html__('Image with Right Offset Border', 'labp'),
      'description' => esc_html__('Image with Right Offset Border', 'labp'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/img_right_offset_border.php',
      //'enqueue_style' => get_stylesheet_directory_uri() . '/partials/img_offset_border.css'
    ));

    acf_register_block_type(array(
      'name' => 'prestyled_button',
      'title' => esc_html__('Pre-styled Button', 'labp'),
      'description' => esc_html__('Add a pre-styled button', 'labp'),
      'category' => 'custom-blocks',
      'mode' => 'auto',
      'align' => 'full',
      'render_template' => get_stylesheet_directory() . '/partials/prestyled_button.php',
      'enqueue_style' => get_stylesheet_directory_uri() . '/partials/prestyled_button.css'
    ));
  }
}