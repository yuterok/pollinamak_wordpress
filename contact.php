<?php
/*
  Template Name: Страница Контакты
*/
?>
<?php get_header();

while ( have_posts() ) {
    the_post();
?>

<div class="container page">

    <h3 class="page_title"><?php the_field('contacts_title');?></h3>

    <div class="wow fadeIn contacts_container">
      <div class="contacts_text_block">
        <div class="contacts_name"><?php the_field('contacts_name');?></div>
        <div class="contacts_details">
               <span class="contact_title"><?php the_field('contacts_email_title');?>:</span>
              <span><?php the_field('contacts_email');?></span>
              <span class="contact_title"><?php the_field('contacts_social_title');?>:</span>
              <span><?php the_field('contacts_inst');?></span>
        </div>
        <div class="socials">
                <a href="<?php the_field('facebook_link', 80);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/facebook.svg" alt=""></a>
                <a href="<?php the_field('instagram_link', 80);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/instagram.svg" alt=""></a>
                <a href="<?php the_field('linkedin_link', 80);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/linkedin.svg" alt=""></a>
                <a href="<?php the_field('contacts_vimeo_link');?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/vimeo.svg" alt=""></a>
          </div>

      </div>
      <div class="contacts_photo" style="background-image: url(<?php the_field('contacts_photo'); ?>);"></div> 
    </div>

</div>

<?php 
};
include('style_bar.php');

include('form.php');
get_footer();
?>
