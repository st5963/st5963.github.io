<?php $options = get_desing_plus_option(); ?>
<!DOCTYPE html>
<html class="pc" <?php language_attributes(); ?>>
<?php
     $options = get_desing_plus_option();
     if($options['use_ogp']) {
?>
<head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb#">
<?php } else { ?>
<head>
<?php }; ?>
<meta charset="<?php bloginfo('charset'); ?>">
<!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge"><![endif]-->
<?php if ( is_no_responsive() && wp_is_mobile() ) : ?>
<meta name="viewport" content="width=1250">
<?php else : ?>
<meta name="viewport" content="width=device-width">
<?php endif; ?>
<title><?php wp_title('|', true, 'right'); ?></title>
<meta name="description" content="<?php seo_description(); ?>">
<?php if($options['use_ogp']) { ogp(); }; ?>
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
<?php
     if ( $options['favicon'] ) {
       $favicon_image = wp_get_attachment_image_src( $options['favicon'], 'full');
       if(!empty($favicon_image)) {
?>
<link rel="shortcut icon" href="<?php echo esc_url($favicon_image[0]); ?>">
<?php }; }; ?>
<?php wp_enqueue_style('style', get_stylesheet_uri(), false, version_num(), 'all'); wp_enqueue_script( 'jquery' ); if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>
</head>
<body id="body" <?php body_class(); ?>>

<?php if ($options['use_load_icon']) { ?>
<div id="site_loader_overlay">
 <div id="site_loader_animation">
  <?php if ($options['load_icon'] == 'type3') { ?>
  <i></i><i></i><i></i><i></i>
  <?php } ?>
 </div>
</div>
<div id="site_wrap">
<?php } ?>

 <div id="header">
  <div id="header_inner" class="clearfix">
   <?php header_logo(); ?>
   <?php
        // global menu
        if (has_nav_menu('global-menu')) {
   ?>
   <div id="global_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'global-menu' , 'container' => '' ) ); ?>
    <?php
         // header menu (for mobile)
         if (has_nav_menu('header-menu')&&is_mobile()) {
    ?>
      <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'header-menu' , 'container' => '' ) ); ?>
    <?php }; ?>
   </div>
   <a href="#" class="menu_button"><span><?php _e('menu', 'tcd-w'); ?></span></a>
   <?php }; ?>
   <?php
        // header menu (right top / for PC)
        if (has_nav_menu('header-menu')&&!is_mobile()) {
   ?>
   <div id="header_menu">
    <?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'header-menu' , 'container' => '' ) ); ?>
   </div>
   <?php }; ?>
   <?php
        // social button (left top)
        if ($options['show_rss'] || $options['twitter_url'] || $options['facebook_url'] || $options['insta_url'] || $options['pint_url'] || $options['mail_url']) {
   ?>
   <ul id="header_social_link" class="social_link clearfix">
    <?php if ($options['twitter_url']) : ?><li class="twitter"><a class="target_blank" href="<?php echo esc_url($options['twitter_url']); ?>">Twitter</a></li><?php endif; ?>
    <?php if ($options['facebook_url']) : ?><li class="facebook"><a class="target_blank" href="<?php echo esc_url($options['facebook_url']); ?>">Facebook</a></li><?php endif; ?>
    <?php if ($options['insta_url']) : ?><li class="insta"><a class="target_blank" href="<?php echo esc_url($options['insta_url']); ?>">Instagram</a></li><?php endif; ?>
    <?php if ($options['pint_url']) : ?><li class="pint"><a class="target_blank" href="<?php echo esc_url($options['pint_url']); ?>">Pinterest</a></li><?php endif; ?>
    <?php if ($options['mail_url']) : ?><li class="mail"><a class="target_blank" href="<?php echo esc_url($options['mail_url']); ?>">Contact</a></li><?php endif; ?>
    <?php if ($options['show_rss']) : ?><li class="rss"><a class="target_blank" href="<?php bloginfo('rss2_url'); ?>">RSS</a></li><?php endif; ?>
   </ul>
   <?php }; ?>
  </div>
 </div><!-- END #header -->

 <?php
      // index slider ---------------------------------------------------------------------------
      if(is_front_page()) {
        if($options['show_index_slider'] == 1) {
 ?>
 <div id="header_slider_wrap" class="clearfix<?php if($options['index_slider_type'] == 'type2') { echo ' type2'; }; if($options['show_index_banner_content'] == 1) { echo ' has_banner_content'; } else { echo ' no_banner_content'; }; ?>">
  <div id="header_slider">
   <?php
        // if is index slider type1 -----------------------------------------------------
        if($options['index_slider_type'] == 'type1') {
          for($i=1; $i<= 5; $i++):
	          if ($options['index_slider_use_retina'] == 1) {
              $image = wp_get_attachment_image_src( $options['index_slider_image'.$i], 'size10');
            } else {
              $image = wp_get_attachment_image_src( $options['index_slider_image'.$i], 'size9');
            }
            if(!empty($image)) {
              $catch = $options['index_slider_catch'.$i];
              $button_label = $options['index_slider_button_label'.$i];
              $url = $options['index_slider_url'.$i];
              $target = $options['index_slider_target'.$i];
   ?>
   <div class="item item<?php echo $i; ?>" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;">
    <div class="caption<?php if(empty($button_label)) { echo ' no_button'; }; ?>">
     <p class="title" style="font-size:<?php echo esc_html($options['index_slider_font_size']); ?>px;"><a href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>><span><?php echo nl2br(esc_html($catch)); ?></span></a></p>
     <?php if(!empty($button_label)) { ?><a class="button" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>><?php echo esc_html($button_label); ?></a><?php }; ?>
    </div>
   </div><!-- END .item -->
   <?php
            }
          endfor;
        // if is index slider type2 -----------------------------------------------------
        } else {
          $post_num = $options['index_slider_num'];
          $post_type = $options['index_slider_post_type'];
          $post_order = $options['index_slider_post_type_order'];
          if($post_order=='date2'){
            $order = 'ASC';
          } else {
            $order = 'DESC';
          };
          if($post_order=='date1'||$post_order=='date2'){
            $post_order = 'date';
          };
          if($post_type == 'recent_post') {
            $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order);
          } else {
            $args = array('post_type' => 'post', 'posts_per_page' => $post_num, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order, 'meta_key' => $post_type, 'meta_value' => 'on');
          };
          $index_slider = new WP_Query($args);
          if ($index_slider->have_posts()) {
            $i = 1;
            while ($index_slider->have_posts()) : $index_slider->the_post();
	          if ($options['index_slider_use_retina'] == 1) {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $index_slider->ID ), "size10" );
            } else {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $index_slider->ID ), "size9" );
            };
            $no_image = esc_url(get_bloginfo('template_url')) . '/img/common/no_image3.gif';
   ?>
   <div class="item item<?php echo $i; ?>" style="background:url(<?php if(!empty($image)) { echo esc_attr($image[0]); } else { echo $no_image; }; ?>) no-repeat center center; background-size:cover;">
    <div class="caption">
     <p class="title" style="font-size:<?php echo esc_html($options['index_slider_font_size']); ?>px;"><a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a></p>
     <div class="meta clearfix">
      <p class="date"><time class="entry-date updated" datetime="<?php the_modified_time('c'); ?>"><?php the_time('Y.m.j'); ?></time></p>
      <p class="category"><?php echo show_parent_category(); ?></p>
     </div>
    </div>
   </div><!-- END .item -->
   <?php
            $i++; endwhile; wp_reset_query();
          };
        };// END slider type2
   ?>
  </div><!-- END #header_slider -->
  <?php
       // header banner (right side) -----------------------------------------------------------------
       if($options['show_index_banner_content'] == 1) {
  ?>
  <div id="header_banner_content" class="clearfix">
   <?php
        // if is index slider type1 -----------------------------------------------------
        if($options['index_banner_content_type'] == 'type1') {
          for($i=1; $i<= 2; $i++):
	          if ($options['index_banner_content_use_retina'] == 1) {
              $image = wp_get_attachment_image_src( $options['index_banner_content_image'.$i], 'size7');
            } else {
              $image = wp_get_attachment_image_src( $options['index_banner_content_image'.$i], 'size6');
            }
            if(!empty($image)) {
              $catch = $options['index_banner_content_catch'.$i];
              $url = $options['index_banner_content_url'.$i];
              $target = $options['index_banner_content_target'.$i];
   ?>
   <div class="item item<?php echo $i; ?>" style="background:url(<?php echo esc_attr($image[0]); ?>) no-repeat center center; background-size:cover;">
    <a class="button" style="font-size:<?php echo esc_html($options['index_banner_font_size']); ?>px;" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>><?php echo nl2br(esc_html($catch)); ?></a>
    <a class="overlay" href="<?php echo esc_url($url); ?>"<?php if($target == 1) { echo ' target="_blank"'; }; ?>></a>
   </div><!-- END .item -->
   <?php
            }
          endfor;
        // if is index slider type2 -----------------------------------------------------
        } else {
          $post_type = $options['index_banner_content_post_type'];
          $post_order = $options['index_banner_content_post_type_order'];
          if($post_order=='date2'){
            $order = 'ASC';
          } else {
            $order = 'DESC';
          };
          if($post_order=='date1'||$post_order=='date2'){
            $post_order = 'date';
          };
          if($post_type == 'recent_post') {
            $args = array('post_type' => 'post', 'posts_per_page' => 2, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order);
          } else {
            $args = array('post_type' => 'post', 'posts_per_page' => 2, 'ignore_sticky_posts' => 1, 'orderby' => $post_order, 'order' => $order, 'meta_key' => $post_type, 'meta_value' => 'on');
          };
          $index_banner_content = new WP_Query($args);
          if ($index_banner_content->have_posts()) {
            $i = 1;
            while ($index_banner_content->have_posts()) : $index_banner_content->the_post();
	          if ($options['index_banner_content_use_retina'] == 1) {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $index_banner_content->ID ), "size7" );
            } else {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $index_banner_content->ID ), "size6" );
            };
            $no_image = esc_url(get_bloginfo('template_url')) . '/img/common/no_image3.gif';
   ?>
   <div class="item item<?php echo $i; ?>" style="background:url(<?php if(!empty($image)) { echo esc_attr($image[0]); } else { echo $no_image; }; ?>) no-repeat center center; background-size:cover;">
    <a class="button" style="font-size:<?php echo esc_html($options['index_banner_font_size']); ?>px;" href="<?php the_permalink(); ?>"><?php echo trim_title(45); ?></a>
    <a class="overlay" href="<?php the_permalink(); ?>"></a>
   </div><!-- END .item -->
   <?php
            $i++; endwhile; wp_reset_query();
          };
        };// END slider type2
   ?>
  </div><!-- END #header_banner_content -->
  <?php }; // END if show header content ?>
 </div><!-- END #header_slider_wrap -->
 <?php
        }; // END if show index slider
      }; // END if is front page
 ?>

 <div id="main_contents" class="clearfix">
