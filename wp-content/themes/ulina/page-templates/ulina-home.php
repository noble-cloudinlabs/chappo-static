<?php
/* 
 * Template Name: Ulina Home
 */

get_header(); ?>
<section class="ulina_home_page">
    <?php
        while(have_posts()):
            the_post();
            the_content();
        endwhile;
    ?>
</section>
<?php get_footer();