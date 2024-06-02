<footer>
        <div class="container">
            <?php the_custom_logo();?>
            <div class="socials">
                <?php while ( have_posts() ) {
            the_post();
            ?>
                <a href="<?php the_field('facebook_link', 80);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/facebook.svg" alt=""></a>
                <a href="<?php the_field('instagram_link', 80);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/instagram.svg" alt=""></a>
                <a href="<?php the_field('linkedin_link', 80);?>" target="_blank"><img src="<?php bloginfo('template_url'); ?>/assets/images/linkedin.svg" alt=""></a>
            </div>
            <div class="copyright"><?php the_field('footer_text', 80);?></div>
            <?php }
            ?>
        </div>
        
    </footer>
    <script>
    new WOW().init();
</script>
    <?php wp_footer()?>
    <script>
    new WOW().init();
</script>
</body>
</html>