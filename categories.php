<?php
/*
Template Name: Страница Портфолио (категории фотографий)
*/
?>

<?php
get_header();
$current = wpm_get_language();
    while ( have_posts() ) {
        the_post();
?>

    <div class="container page">

    <h3 class="page_title"><?php the_field('portfolio_title');?></h3>

    <div class="categories_buttons_container" >

        <?php
            $args = array(
                'orderby' => 'date',
                'order' => 'asc',
                'exclude' => '31'
            );
            $cats = get_terms('media_category', $args);
            foreach ($cats as $cat) {

                echo '<a href="' . $current . '/portfolio/' . $cat->slug . '" class="wow fadeInUp categorie_btn">';
                echo '<img class="categorie_img" src="'. $cat->description.'" alt="">';
                echo '<p>'. $cat->name .'</p>';
                echo '</a>';

            }
    ?>
    </div>
</div>
<?php 
    };
    include('style_bar.php');

    include('form.php');
    get_footer();
?>