<?php
/*
  Template Name: Страница Услуги
*/
?>
<?php get_header();

while ( have_posts() ) {
    the_post();
?>

<div class="container page">

    <h3 class="page_title"><?php the_field('services_title');?></h3>
    <img class="light-leak leak-services-desktop wow fadeIn" data-wow-delay="1s" data-wow-duration="2s" src="http://pollinamak/wp-content/themes/pollinamak/assets/images/light-leak-services-desktop 1.png" alt="">
    <div class="services_container">

    <?php
    $services_query = new WP_Query(array(
        'post_type' => 'service', 
        'posts_per_page' => -1, 
        'order' => 'asc',
    ));
    
    while ($services_query->have_posts()) :
            $services_query->the_post();
    ?>
            <div class="wow fadeInUp services_card">
            <span class="services_title"><?php the_title(); ?></span>
                <div class="services_img" style="background-image: url('<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>')"></div> 
                <div class="services_options">
                    <div class="services_option">
                        <span><?php the_field('service_time_title', 212);?></span>
                        <span><?php echo get_post_meta(get_the_ID(), 'service_time', true); ?></span>
                    </div>
                    <div class="services_option">
                        <span><?php the_field('service_output_photos_title', 212);?></span>
                        <span><?php echo get_post_meta(get_the_ID(), 'service_output_photos', true); ?></span>
                    </div>
                </div>
                <div class="services_description">
                    <?php the_content(); ?>
                </div>
                <div class="services_price"><?php echo get_post_meta(get_the_ID(), 'service_price', true); ?></div>
            </div>
    <?php
        endwhile;
        wp_reset_postdata();
    ?>
    </div>
    <div class="services_notice">
        <div class="services_notice_title"><?php the_field('services_notice_title', 212);?></div>
        <p class="services_notice_text"><?php the_field('services_notice_text', 212);?></p>
    </div>
    <img class="wow fadeIn light-leak leak-services-desktop-2" data-wow-offset="300" data-wow-duration="2s" src="http://pollinamak/wp-content/themes/pollinamak/assets/images/light-leak-services-desktop 1.png" alt="">
</div>

<?php 
};
include('style_bar.php');

include('form.php');
get_footer();
?>
