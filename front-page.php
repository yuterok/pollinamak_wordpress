<?php
/*
Template Name: Главная страница
*/
?>
<?php get_header();
$current = wpm_get_language();
while (have_posts()) {
  the_post();
  ?>

    <div class="video-wrapper">
        <video class="video_desktop" playsinline autoplay muted loop>
            <source autoplay muted loop src="<?php the_field('banner_video');?>">
        </video>
        <video class="video_mobile" playsinline autoplay muted loop>
            <source autoplay muted loop src="<?php the_field('banner_video_mobile');?>">
        </video>
        <div class="banner_text"><?php the_field('banner_text');?>
        </div>
      </div>

      <div class="style_bar" style="margin: 0;">
        <div class="style_bar_img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/полосочка_desktop.svg)"></div>
        <div class="style_bar_img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/полосочка_desktop.svg)"></div>
        <div class="style_bar_img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/полосочка_desktop.svg)"></div>
        <div class="style_bar_img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/полосочка_desktop.svg)"></div>
        <div class="style_bar_img" style="background-image: url(<?php bloginfo('template_url'); ?>/assets/images/полосочка_desktop.svg)"></div>
    </div>

    <div class="container">
        <div class="main_about_block">
            <div class="main_about_text">
                <h1 style="font-size: 113px;"><?php the_field('about_me_h1');?></h1>
                <?php the_field('about_p1'); ?>
                <?php the_field('about_p2'); ?>
            </div>
            <div class="wow fadeInUp main_about_image" style="background-image: url(<?php the_field('about_photo'); ?>);">
                <img src="<?php bloginfo('template_url'); ?>/assets/images/brush.png" alt="">
            </div>
            <?php
        ?>
        </div>
        <div class="main_about_block_tablet">
            <h1><?php the_field('about_me_h1');?></h1>
            <div class="main_about_inner_tablet">
                <div class="main_about_text">
                    <?php the_field('about_p1'); ?>
                    <?php the_field('about_p2'); ?>
                </div>
                <div class="wow fadeInUp main_about_image" style="background-image: url(<?php the_field('about_photo'); ?>);">
                    <img src="<?php bloginfo('template_url'); ?>/assets/images/brush.png" alt="">
                </div>
            </div>

            <?php
        }?>
        </div>
        <h2><?php the_field('my_works_h1');?></h2>
    </div>

<!-- Swiper -->
<div class="swiper swiperDesktop">
    <div class="swiper-wrapper">
    <?php
                    $args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'post_status' => null,
                        'post_parent' => null,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'media_category',
                                'field' => 'slug',
                                'terms' => 'slider',
                            ),
                        )); 
                    $attachments = get_posts($args);
                    if ($attachments) {
                        foreach ($attachments as $post) {
                            $image_url = wp_get_attachment_url( $post->ID );
                            // echo '<a class="wow fadeInLeft card data-fancybox" href="'. $image_url .'" data-fancybox="gallery">';
                            // echo '<img src="'. $image_url .'">';
                            // echo '<div class="overlay"></div>';
                            // echo '</a>';
                            echo '<div class="wow fadeInLeft swiper-slide" data-wow-duration="1.5s"><img src="' . $image_url .'" alt=""></div>';
                        }
                    }
                    ?>
    </div>
  </div>
  <div class="swiper swiperLaptop">
    <div class="swiper-wrapper">
    <?php
                    $args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'post_status' => null,
                        'post_parent' => null,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'media_category',
                                'field' => 'slug',
                                'terms' => 'slider',
                            ),
                        )); 
                    $attachments = get_posts($args);
                    if ($attachments) {
                        foreach ($attachments as $post) {
                            $image_url = wp_get_attachment_url( $post->ID );
                            // echo '<a class="wow fadeInLeft card data-fancybox" href="'. $image_url .'" data-fancybox="gallery">';
                            // echo '<img src="'. $image_url .'">';
                            // echo '<div class="overlay"></div>';
                            // echo '</a>';
                            echo '<div class="wow fadeInLeft swiper-slide" data-wow-duration="1.5s"><img src="' . $image_url .'" alt=""></div>';
                        }
                    }
                    ?>
    </div>
  </div>
  <div class="swiper swiperTablet">
    <div class="swiper-wrapper">
    <?php
                    $args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'post_status' => null,
                        'post_parent' => null,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'media_category',
                                'field' => 'slug',
                                'terms' => 'slider',
                            ),
                        )); 
                    $attachments = get_posts($args);
                    if ($attachments) {
                        foreach ($attachments as $post) {
                            $image_url = wp_get_attachment_url( $post->ID );
                            // echo '<a class="wow fadeInLeft card data-fancybox" href="'. $image_url .'" data-fancybox="gallery">';
                            // echo '<img src="'. $image_url .'">';
                            // echo '<div class="overlay"></div>';
                            // echo '</a>';
                            echo '<div class="wow fadeInLeft swiper-slide" data-wow-duration="1.5s"><img src="' . $image_url .'" alt=""></div>';
                        }
                    }
                    ?>
    </div>
  </div>
  <div class="swiper swiperMobile">
    <div class="swiper-wrapper">
    <?php
                    $args = array(
                        'post_type' => 'attachment',
                        'numberposts' => -1,
                        'post_status' => null,
                        'post_parent' => null,
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'media_category',
                                'field' => 'slug',
                                'terms' => 'slider',
                            ),
                        )); 
                    $attachments = get_posts($args);
                    if ($attachments) {
                        foreach ($attachments as $post) {
                            $image_url = wp_get_attachment_url( $post->ID );
                            // echo '<a class="wow fadeInLeft card data-fancybox" href="'. $image_url .'" data-fancybox="gallery">';
                            // echo '<img src="'. $image_url .'">';
                            // echo '<div class="overlay"></div>';
                            // echo '</a>';
                            echo '<div class="wow fadeInLeft swiper-slide" data-wow-duration="1.5s"><img src="' . $image_url .'" alt=""></div>';
                        }
                    }
                    ?>
    </div>
  </div>
  <?php while (have_posts()) {
  the_post();
        ?>
        <a class="slider_link" href="<?php echo $current;?>/portfolio"><?php the_field('more_works');?></a>

        <?php };?>

        </script>

    <?php
    include('form.php');
    get_footer();
    ?>