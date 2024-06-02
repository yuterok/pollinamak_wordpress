<?php
/*
  Template Name: Категория Еда & Напитки
*/
?>
<?php get_header();

while ( have_posts() ) {
    the_post();
?>

<div class="container page">


<?php include('photo_categories_nav.php');
?>
    
    <div class="portfolio_grid"></div>

</div>


<script>
const posts = [];
const images = [
    <?php
                $args = array(
                'post_type' => 'attachment',
                'numberposts' => -1,
                'post_status' => null,
                'post_parent' => null,
                'orderby' => 'title',
                'order' => 'desc',
                'tax_query' => array(
                    array(
                        'taxonomy' => 'media_category',
                        'field' => 'slug',
                        'terms' => 'fooddrinks',
                        ),
                    )); 
                $attachments = get_posts($args);
                if ($attachments) {
                    foreach ($attachments as $post) {
                        $image_url = wp_get_attachment_url( $post->ID );
                        echo '"' . $image_url . '" ,';
                        
                    }
                }
        ?>
];
</script>



<?php 
};
include('style_bar.php');

include('form.php');
get_footer();
?>
