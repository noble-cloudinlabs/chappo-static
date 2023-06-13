<?php
    global $post;
    $author_id = $post->post_author;
    $post_id = $post->ID;

    $blog_single_banner_title       = get_theme_mod('blog_single_banner_title', '');
    $blog_single_banner_alignment   = get_theme_mod('blog_single_banner_alignment', 'center');
    $blog_single_banner_title       = ($blog_single_banner_title != '' ? $blog_single_banner_title : get_the_title());
    
    $bgi_css = '';
    if(defined('FW')):
        $blog_si_is_settings        = fw_get_db_post_option(get_the_ID(), 'blog_si_is_settings', 2);
        $blog_si_banner_bg          = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_bg', array());
        $blog_si_banner_bg_color    = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_bg_color', '');
        $blog_si_banner_title       = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_title', '');
        $blog_si_banner_alignment   = fw_get_db_post_option(get_the_ID(), 'blog_si_banner_alignment', 'center');
        
        if($blog_si_is_settings == 1):
            $blog_single_banner_title  = ($blog_si_banner_title != '' ? $blog_si_banner_title : $blog_single_banner_title);
            
            $blog_single_banner_alignment = ($blog_si_banner_alignment != '' ? $blog_si_banner_alignment : $blog_single_banner_alignment);
            
            if(isset($blog_si_banner_bg['url']) && $blog_si_banner_bg['url'] != ''):
                $bgi_css = 'background-image: url('.$blog_si_banner_bg['url'].'); background-repeat: no-repeat; background-position: center center; background-size: cover;';
            endif;
            if(isset($blog_si_banner_bg_color) && $blog_si_banner_bg_color != ''):
                $bgi_css = 'background-color: '.$blog_si_banner_bg_color.';';
            endif;
        endif;
    endif;

    ?>
    <!-- Begin:: Banner Section -->
    <section class="pageBannerSection singleBlogPageBanner sb_banner" style="<?php echo esc_attr($bgi_css) ?>">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="pageBannerContent  text-<?php echo esc_attr($blog_single_banner_alignment); ?>">
                        <h2 class="banner-title"><?php echo ulina_kses($blog_single_banner_title); ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End:: Banner Section -->