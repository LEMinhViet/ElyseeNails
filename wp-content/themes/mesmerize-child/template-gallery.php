<?php
/**
Template Name: Gallery Page
 *
 * @package mesmize-child
 */

get_header(); ?>

<div class="page-content">
  <div class="<?php mesmerize_page_content_wrapper_class(); ?>">
    <?php 
      while ( have_posts() ) : the_post();
        get_template_part( 'template-parts/content', 'page' );
      endwhile;
    ?>

    <div id="gallery-masonry-container">
    <?php
      $images = get_attached_media( 'image', $post->ID );
      if ( $images ) {
        foreach($images as $image) {?>
          <img class="gallery-image" src="<?php echo wp_get_attachment_image_src($image->ID, 'full')[0]; ?>" />
        <?php }
      }
    ?>
    </div>
  </div>
</div>

<?php get_footer(); ?>
