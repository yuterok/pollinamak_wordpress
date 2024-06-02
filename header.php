<!DOCTYPE html>
<html <?php language_attributes() ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="google-site-verification" content="kfy7IYyBxkrmnqW6u4-34yoyQ8TUU1vzCJqS_vPwUoQ" />
    <?php
    wp_head();
    $current = wpm_get_language();
    while ( have_posts() ) {
        the_post();
    ?>
</head>
<body>
    <header>
        <div class="container">
            <?php the_custom_logo(); ?>
            <div class="nav">
                <div class="dropdown">
                    <a class="link dropbtn" href="<?php echo $current;?>/portfolio"><?php the_field('portfolio_title', 80);?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6667 5.66675L8.00004 10.3334L3.33337 5.66675" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="dropdown-content">
                        <?php
                        $args = array(
                            'orderby' => 'date',
                            'order' => 'asc',
                            'exclude' => '31');
                        $cats = get_terms('media_category', $args );
                            foreach( $cats as $cat ){
                            echo '<a href="' . $current . '/portfolio/' . $cat->slug . '">' . $cat->name .'</a>';
                            };
                            ?>
                    </div>
                </div>

                <a class="link" href="<?php echo $current;?>/services/"><?php the_field('services_title', 80);?></a>
                <a class="link" href="<?php echo $current;?>/about/"><?php the_field('about_title', 80);?></a>
                <a class="link" href="<?php echo $current;?>/contact/"><?php the_field('contact_title', 80);?></a>
            </div>
            <div class="lang_buttons_desktop">
                <img class="lang_icon" src="<?php bloginfo('template_url'); ?>/assets/images/lang_icon.svg" alt="">

                <?php

                    function my_site_custom_languages_selector_template()
                    {
                        $languages = wpm_get_languages();
                        $current = wpm_get_language();
                        $out = '';
                        foreach ($languages as $code => $language) {

                            $toggle_url = esc_url(wpm_translate_current_url($code));
                            $css_classes = 'lang link';

                            if ($code === $current) {
                                $css_classes .= ' selected-lang';
                            }
                            
                            $out .= '<a href="' . $toggle_url . '" class="' . $css_classes . '" data-lang="' . esc_attr($code) . '">';
                            $out .= $code;
                            $out .= '</a>';
                            if ($language===end($languages)){
                                break;
                            }else{
                                $out .= '|';
                            }

                        }

                        return $out;
                    }

                    echo my_site_custom_languages_selector_template();
                ?>

            </div>
            <div class="lang_buttons_tablet">
                <?php

function my_site_custom_languages_selector_template_tablet()
{
    $languages = wpm_get_languages();
    $current = wpm_get_language();
    $out ='';

    foreach ($languages as $code => $language) {

        $toggle_url = esc_url(wpm_translate_current_url($code));
        $css_classes = 'lang link';

        if ($code === $current) {
            echo '<a class="drop-down-btn-tablet" id="langBtn"> <img class="lang_icon" src="https://pollinamak.art/wp-content/themes/pollinamak/assets/images/lang_icon.svg" alt=""><p>'. esc_attr($code) .'</p></a>';
            echo '<ul class="lang_menu" id="lang_menu">';
        }else{
            $out .= '<li class="lang_item" data-lang="' . esc_attr($code) . '">';
            $out .= '<a href="' . $toggle_url . '" class="' . $css_classes . '" data-lang="' . esc_attr($code) . '">';
            $out .= $code;
            $out .= '</a>';
            $out .= '</li>';
    
        }

    }

    return $out;
}

echo my_site_custom_languages_selector_template_tablet();
};
?>
                </ul>
            </div>

            <div class="burger">
                <span></span>
            </div>

    <div class="nav_mobile">
        <?php the_custom_logo(); ?>
            <div class="nav">
                <div class="dropdown">
                    <a class="link dropbtn" href="<?php echo $current;?>/portfolio"><?php the_field('portfolio_title', 80);?>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12.6667 5.66675L8.00004 10.3334L3.33337 5.66675" stroke="white" stroke-width="1.5"
                                stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                    <div class="dropdown-content">
                        <?php
                        $args = array(
                            'orderby' => 'date',
                            'order' => 'asc',
                            'exclude' => '31');
                        $cats = get_terms('media_category', $args );
                            foreach( $cats as $cat ){
                            echo '<a href="' . $current . '/portfolio/' . $cat->slug . '">' . $cat->name .'</a>';
                            };
                            ?>
                    </div>
                </div>

                <a class="link" href="<?php echo $current;?>/services/"><?php the_field('services_title', 80);?></a>
                <a class="link" href="<?php echo $current;?>/about/"><?php the_field('about_title', 80);?></a>
                <a class="link" href="<?php echo $current;?>/contact/"><?php the_field('contact_title', 80);?></a>
            </div>
            <div class="socials">
                <?php while ( have_posts() ) {
            the_post();
            ?>
                <a href="<?php the_field('facebook_link', 80);?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/facebook.svg" alt=""></a>
                <a href="<?php the_field('instagram_link', 80);?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/instagram.svg" alt=""></a>
                <a href="<?php the_field('linkedin_link', 80);?>"><img src="<?php bloginfo('template_url'); ?>/assets/images/linkedin.svg" alt=""></a>
            </div>
            <?php }?>    

        </div>
        
</header>