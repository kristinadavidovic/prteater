<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package prteater
 */

?>

<article id="post-<?php the_ID();?>" <?php post_class();?>>
<div class="entry-content">
  <div class="wpb_fp_quick_view_img wpb_fp_col-md-6 wpb_fp_col-sm-12">
    <?php prteater_post_thumbnail(); ?>
  </div>
  <div class="wpb_fp_quick_view_content wpb_fp_col-md-6 wpb_fp_col-sm-12">
    <?php the_title('<h1 class="entry-title">', '</h1>');?>
    <h5><?php echo get_field('dodatni_tekst'); ?></h5>
    <?php the_content(); ?>
  </div>
</div><!-- .entry-content -->

  <?php
    wp_link_pages(array(
        'before' => '<div class="page-links">' . esc_html__('Pages:', 'prteater'),
        'after' => '</div>',
    ));
  ?>

</article><!-- #post-<?php the_ID();?> -->
