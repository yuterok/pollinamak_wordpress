<?php
/*
  Template Name: Страница О себе
*/
?>
<?php get_header();

while (have_posts()) {
  the_post();
  ?>

  <div class="container about_page">
    <div class="about_block">
      <div class="about_block_inner">
        <h1 class="wow fadeIn hello_title" data-wow-duration="3s"><?php the_field('hello_text'); ?></h1>
        <img class="light-leak leak-about-hello-desktop" src="<?php bloginfo('template_url'); ?>/assets/images/light-leak-about-hello-desktop.png" alt="">
        <div class="about_p1">
          <?php the_field('about_p1');?>
        </div>
      </div>
      <div class="about_block_inner">
        <div class="about_image_1" style="background-image: url(<?php the_field('about_image_1'); ?>);">
          <img src="<?php bloginfo('template_url'); ?>/assets/images/brush.png" alt="">
        </div>
      </div>
    </div>
    <div class="tablet_about_1">
        <h1 class="wow fadeIn hello_title" data-wow-duration="3s"><?php the_field('hello_text'); ?></h1>
        <img class="light-leak leak-about-hello-desktop" src="<?php bloginfo('template_url'); ?>/assets/images/light-leak-about-hello-desktop.png" alt="">
      <div class="about_block_inner">
      <div class="about_p1">
          <?php the_field('about_p1');?>
        </div>
        <div class="about_image_1" style="background-image: url(<?php the_field('about_image_1'); ?>);">
          <img src="<?php bloginfo('template_url'); ?>/assets/images/brush.png" alt="">
        </div>
      </div>
    </div>

    <div class="about_block">
      <div class="about_block_inner">
        <div class="wow fadeInUp about_image_2" data-wow-offset="500" style="background-image: url(<?php the_field('about_image_2'); ?>);">
          <img class="wow fadeIn" data-wow-offset="550" data-wow-delay="0.9s" src="<?php bloginfo('template_url'); ?>/assets/images/light-leak-about-behind-desktop.png" alt="">
        </div>
      </div>
      <div class="about_block_inner" style="display: grid; grid-template-rows: auto 1fr auto;">
      <p></p>
        <div class="about_p2"><?php the_field('about_p2');?></div>
        <img class="about_stripe" src="<?php bloginfo('template_url'); ?>/assets/images/stripe.png" alt="">
      </div>
    </div>

    <div class="about_block">
      <div class="about_block_inner" style="display: grid">
      <div class="about_p3">
          <?php the_field('about_p3');?>
        </div>
      </div>
      <div class="about_block_inner">
          <div class="wow fadeInRight about_frame" data-wow-duration="1.5s" data-wow-offset="400">
            <img class="about_frame_photo" src="<?php the_field('frame_photo_1'); ?>" alt="">
            <img class="about_frame_photo" src="<?php the_field('frame_photo_2'); ?>" alt="">
            <img class="about_frame_photo" src="<?php the_field('frame_photo_3'); ?>" alt="">
          </div>
          <div class="wow fadeInRight about_frame_tablet" data-wow-duration="1.5s" data-wow-offset="400">
            <img class="about_frame_photo" src="<?php the_field('frame_photo_1'); ?>" alt="">
            <img class="about_frame_photo" src="<?php the_field('frame_photo_2'); ?>" alt="">
            <img class="about_frame_photo" src="<?php the_field('frame_photo_3'); ?>" alt="">
          </div>
      </div>
    </div>

  </div>
  <h2 style="text-align: center"><?php the_field('process_title'); ?></h2>
  <div class="wow fadeInLeft process_photos_container" data-wow-duration="1.5s" data-wow-offset="400">
    <img class="process_photo" src="<?php the_field('process_image_1'); ?>" alt="">
    <img class="process_photo" src="<?php the_field('process_image_2'); ?>" alt="">
    <img class="process_photo" src="<?php the_field('process_image_3'); ?>" alt="">
    <img class="process_photo" src="<?php the_field('process_image_4'); ?>" alt="">
  </div>
  <div class="container">
  <div class="process_text_block">
      <div class="wow fadeIn" data-wow-offset="100"><?php the_field('process_p1');?></div>
      <div class="wow fadeIn" data-wow-delay="0.3s" data-wow-offset="100"><?php the_field('process_p2');?></div>
      <div class="wow fadeIn" data-wow-delay="0.6s" data-wow-offset="100"><?php the_field('process_p3');?></div>
      <div class="wow fadeIn" data-wow-delay="0.9s"data-wow-offset="100"><?php the_field('process_p4');?></div>
  </div>
  </div>

<?php
}
;
include ('style_bar.php');

include ('form.php');
get_footer();
?>