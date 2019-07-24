<?php
/**
 * Add custom shortcodes
 *
 * Currently added for:
 * - Program: [portfolio_program attr]
 * - Organizers: [portfolio_organizers]
 * - Sponsors: [portfolio_sponsors]
 * - Vodje: [portfolio_vodje]
 *
 * @package prteater
 */

/*
 * Custom shortcode for program
 * [portfolio_program]
 * Filter by taxonomy (part-of-program)
 */

function portfolio_program_shortcode_function($atts)
{
    extract(shortcode_atts(array(
        'part-of-program' => '',
    ), $atts));

    $termname = $atts['part-of-program'];
    $portfolio_id = rand(10, 1000);

    global $post;
    $args = array(
        'post_type' => 'program',
        'posts_per_page' => '-1',
        'tax_query' => array(
            array(
                'taxonomy' => 'part-of-program', //or tag or custom taxonomy
                'field' => 'slug',
                'terms' => $termname,
            ),
        ),
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        $output = '<div class="wpb_portfolio_area program">';
        $output .= '<div class="wpb_portfolio wpb_fp_row wpb_fp_grid" id="wpb_portfolio_' . $portfolio_id . '">';

        while ($loop->have_posts()): $loop->the_post();
            global $post;
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url($thumb, 'full');
            $thumbnail_mata = get_post_meta($thumb, '_wp_attachment_image_alt', true);
            $wpb_fp_portfolio_ex_link = get_post_meta($post->ID, 'wpb_fp_portfolio_ex_link', true);
            $portfolio_title = get_the_title();
            $portfolio_title = (strlen($portfolio_title) > 18) ? substr($portfolio_title, 0, 16) . '...' : $portfolio_title;

            $output .= '<div class="wpb_fp_col-md-3 wpb_fp_col-sm-6 wpb_fp_col-xs-12 wpb_portfolio_post">';
            $output .= '<a class="wpb_fp_preview open-popup-link" href="#wpb_fp_quick_view_' . get_the_id() . '"';
            $output .= '<figure>';
            $output .= '<img src="' . $img_url . '" alt="img12"/>';
            $output .= '<div class="wpb_portfolio_post_title">';
            $output .= '<div>';
            $output .= '<h2>' . $portfolio_title . '</h2>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</figure>';
            $output .= '</a>';
            $output .= '</div>';

            // Quick view
            $output .= '<div id="wpb_fp_quick_view_' . get_the_id() . '" class="white-popup mfp-hide mfp-with-anim wpb_fp_quick_view">';
            $output .= '<div class="wpb_fp_row">';
            $output .= '<div class="wpb_fp_quick_view_img wpb_fp_col-md-6 wpb_fp_col-sm-12">';
            $output .= '<img src="' . $img_url . '" alt="' . $thumbnail_mata . '">';
            $output .= '</div>';
            $output .= '<div class="wpb_fp_quick_view_content wpb_fp_col-md-6 wpb_fp_col-sm-12">';
            $output .= '<h2>' . get_the_title() . '</h2>';
            $output .= wpautop(apply_filters('the_content', get_the_content()));
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            // quick view end

        endwhile;

        $output .= '</div><!-- wpb_portfolio -->';
        $output .= '</div><!-- wpb_portfolio_area -->';

    } else {
        $output = __('Ni objavljenega programa.', 'wpb_fp');
    }
    wp_reset_postdata();

    // wp_reset_query();

    return $output;
}

add_shortcode('portfolio_program', 'portfolio_program_shortcode_function');

/*
 * Custom shortcode for organizers
 * [portfolio_organizers]
 * orderby ACF field 'vrstni_red'
 */

function portfolio_organizers_shortcode_function($atts)
{
    $portfolio_id = rand(10, 1000);

    $args = array(
        'post_type' => 'organizers',
        'posts_per_page' => '-1',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'vrstni_red',
            ),
        ),
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        $output = '<div class="wpb_portfolio_area organizers">';
        $output .= '<div class="wpb_portfolio wpb_fp_row wpb_fp_grid" id="wpb_portfolio_' . $portfolio_id . '">';

        while ($loop->have_posts()): $loop->the_post();
            global $post;
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url($thumb, 'full');
            $thumbnail_mata = get_post_meta($thumb, '_wp_attachment_image_alt', true);
            $wpb_fp_portfolio_ex_link = get_post_meta($post->ID, 'wpb_fp_portfolio_ex_link', true);
            $portfolio_title = get_the_title();
            $portfolio_title = (strlen($portfolio_title) > 18) ? substr($portfolio_title, 0, 16) . '...' : $portfolio_title;
            $categories = strip_tags(get_the_term_list($post->ID, 'position'));

            $output .= '<div class="wpb_fp_col-md-3 wpb_fp_col-sm-6 wpb_fp_col-xs-12 wpb_portfolio_post">';
            $output .= '<div class="wpb_fp_preview">';
            $output .= '<figure>';
            $output .= '<img src="' . $img_url . '" alt="' . $thumbnail_mata .'"/>';
            $output .= '<div class="wpb_portfolio_post_title">';
            $output .= '<div>';
            $output .= '<h2>' . $portfolio_title . '</h2>';
            $output .= '<div class="position">';
            $output .= '<hr>';
            $output .= '<span>' . $categories . '</span>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</div>';
            $output .= '</figure>';
            $output .= '</div>';
            $output .= '</div>';

        endwhile;

        $output .= '</div><!-- wpb_portfolio -->';
        $output .= '</div><!-- wpb_portfolio_area -->';

    } else {
        $output = __('Ni objavljenih organizatorjev.', 'wpb_fp');
    }

    wp_reset_postdata();

    // wp_reset_query();

    return $output;
}

add_shortcode('portfolio_organizers', 'portfolio_organizers_shortcode_function');

/*
 * Custom shortcode for sponsors
 * [portfolio_sponsors]
 *
 */

function portfolio_sponsors_shortcode_function($atts)
{
    $portfolio_id = rand(10, 1000);

    $args = array(
        'post_type' => 'sponsors',
        'posts_per_page' => '-1',
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        $output = '<div class="wpb_portfolio_area sponsors">';
        $output .= '<div class="wpb_portfolio wpb_fp_row wpb_fp_grid" id="wpb_portfolio_' . $portfolio_id . '">';

        while ($loop->have_posts()): $loop->the_post();
            global $post;
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url($thumb, 'full');
            $thumbnail_mata = get_post_meta($thumb, '_wp_attachment_image_alt', true);
            $url = get_field('spletna_stran');

            $output .= '<div class="wpb_portfolio_post">';
            $output .= '<div class="wpb_fp_preview">';
            $output .= '<figure>';
            $output .= '<a href="' . $url . '" target="_blank">';
            $output .= '<img src="' . $img_url . '" alt="' . $thumbnail_mata . '"/>';
            $output .= '</a>';
            $output .= '</figure>';
            $output .= '</div>';
            $output .= '</div>';

        endwhile;

        $output .= '</div><!-- wpb_portfolio -->';
        $output .= '</div><!-- wpb_portfolio_area -->';

    } else {
        $output = __('Ni obljavljenih sponzerjev.', 'wpb_fp');
    }

    wp_reset_postdata();

    // wp_reset_query();

    return $output;
}

add_shortcode('portfolio_sponsors', 'portfolio_sponsors_shortcode_function');

/*
 * Custom shortcode for vodje
 * [portfolio_vodje]
 * Filter by taxonomy (part-of-program)
 */

function portfolio_vodje_shortcode_function($atts)
{
    extract(shortcode_atts(array(
        'part-of-program' => '',
    ), $atts));

    $termname = $atts['part-of-program'];
    $portfolio_id = rand(10, 1000);

    global $post;
    $args = array(
        'post_type' => 'program',
        'posts_per_page' => '-1',
        'orderby' => 'meta_value_num',
        'order' => 'ASC',
        'meta_query' => array(
            array(
                'key' => 'vrstni_red',
            ),
        ),
        'tax_query' => array(
            array(
                'taxonomy' => 'part-of-program', //or tag or custom taxonomy
                'field' => 'slug',
                'terms' => $termname,
            ),
        ),
    );

    $loop = new WP_Query($args);
    if ($loop->have_posts()) {
        $output = '<div class="wpb_portfolio_area vodje">';
        $output .= '<div class="wpb_portfolio wpb_fp_row wpb_fp_grid" id="wpb_portfolio_' . $portfolio_id . '">';

        while ($loop->have_posts()): $loop->the_post();
            global $post;
            $thumb = get_post_thumbnail_id();
            $img_url = wp_get_attachment_url($thumb, 'full');
            $thumbnail_mata = get_post_meta($thumb, '_wp_attachment_image_alt', true);
            $wpb_fp_portfolio_ex_link = get_post_meta($post->ID, 'wpb_fp_portfolio_ex_link', true);
            $portfolio_title = get_the_title();
            $portfolio_title = (strlen($portfolio_title) > 18) ? substr($portfolio_title, 0, 16) . '...' : $portfolio_title;
            $post_link = get_the_permalink();
            $add_text = get_field('dodatni_tekst');

            $output .= '<div class="wpb_fp_col-md-3 wpb_fp_col-sm-6 wpb_fp_col-xs-12 wpb_portfolio_post">';
              $output .= '<a class="wpb_fp_preview" href="' . $post_link . '">';
                $output .= '<figure>';
                  $output .= '<img src="' . $img_url . '" alt="' . $thumbnail_mata . '"/>';
                $output .= '<div class="wpb_portfolio_post_title">';
                  $output .= '<div>';
                    $output .= '<h2>' . $portfolio_title . '</h2>';
                    $output .= '<p>' . $add_text . '</p>';
                  $output .= '</div>';
                $output .= '</div>';
                $output .= '</figure>';
              $output .= '</a>';
            $output .= '</div>';

        endwhile;

        $output .= '</div><!-- wpb_portfolio -->';
        $output .= '</div><!-- wpb_portfolio_area -->';

    } else {
        $output = __('Ni obljavljenih vodji.', 'wpb_fp');
    }
    wp_reset_postdata();

    // wp_reset_query();

    return $output;
}

add_shortcode('portfolio_vodje', 'portfolio_vodje_shortcode_function');
