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
      $content_var = "";

      if ( have_posts() ) : the_post();
        ob_start();
        get_template_part( 'template-parts/content', 'page' );
        $content_var = ob_get_contents();
        ob_end_clean();
      endif;
    ?>
    
    <?php
      $images = get_attached_media( 'image', $post->ID );

      $boutique_images = array();
      $product_images = array();
      $sample_images = array();

      foreach ($images as $image) {
        if (strpos(strtolower($image->post_title), 'boutique') !== false) {
          array_push($boutique_images, $image);
        }
        else if (strpos(strtolower($image->post_title), 'product') !== false) {
          array_push($product_images, $image);
        }
        else {
          array_push($sample_images, $image);
        }
      } 
      
      // Print each corresponded part of content_var with the gallery
      $boutique_content = "";
      $product_content = "";
      $sample_content = "";
      $end_content = "";

      $contents = explode("[boutique-gallery]", $content_var);
      $boutique_content = $contents[0];

      if ($contents[1]) {
        $contents = explode("[product-gallery]", $contents[1]);
        $product_content = $contents[0];

        if ($contents[1]) {
          $contents = explode("[sample-gallery]", $contents[1]);
          $sample_content = $contents[0];

          if ($contents[1]) {
            $end_content = $contents[1];
          }
        }
      }

      echo $boutique_content;
    ?>

    <div id="boutique-container" class="gallery-masonry-container">
      <?php if ( $boutique_images ) {
        foreach($boutique_images as $image) {?>
          <img class="gallery-image" src="<?php echo wp_get_attachment_image_src($image->ID, 'full')[0]; ?>" />
        <?php }
      } ?>
    </div>

    <?php echo $product_content; ?>

    <div id="product-container" class="gallery-masonry-container">
      <?php if ( $product_images ) {
        foreach($product_images as $image) {?>
          <img class="gallery-image" src="<?php echo wp_get_attachment_image_src($image->ID, 'full')[0]; ?>" />
        <?php }
      } ?>
    </div>

    <?php echo $sample_content; ?>

    <div id="sample-container" class="gallery-masonry-container">
      <?php if ( $sample_images ) {
        foreach($sample_images as $image) {?>
          <img class="gallery-image" src="<?php echo wp_get_attachment_image_src($image->ID, 'full')[0]; ?>" />
        <?php }
      } ?>
    </div>
  
    <?php echo $end_content; ?>
  </div>
</div>

<?php get_footer(); ?>