<?php
/**
Template Name: Supply Page
 *
 * @package mesmize-child
 */

get_header(); ?>

<div class="page-content supply-page">
  <div class="<?php mesmerize_page_content_wrapper_class(); ?>">
    <?php
      $content_var = "";

      if ( have_posts() ) : the_post();
        ob_start();
        get_template_part( 'template-parts/content', 'page' );
        $content_var = ob_get_contents();
        ob_end_clean();
      endif;

      $content_arr = preg_split("/<p>\\[(.*?)\\]<\/p>/", $content_var, -1, PREG_SPLIT_DELIM_CAPTURE | PREG_SPLIT_NO_EMPTY);
    ?>
    
    <?php if ( $content_arr ) {
      $opened = false;
      for ($i = 0; $i < count( $content_arr ); $i++) {
        $line = $content_arr[$i];
        if (is_product($line)) {

          if (!$opened) {
            $opened = true; ?>
            <div id="supply-container" class="supply-masonry-container">
          <?php }
          
          $image_arr = explode("|", $line); ?>
          <div class="supply-item">
            <img class="supply-image" src="<?php echo wp_upload_dir()["url"].'/'.$image_arr[0]; ?>" />
            <div class="supply-overlay">
              <div class="supply-price">
                <h1 class="supply-title"><?php echo $image_arr[1]?></h1>
                <p class="supply-meta"><?php echo $image_arr[2]?></p>
              </div>
            </div>
          </div>
        <?php 
        } else if (!is_empty($line)) { 
          if ($opened) { 
            $opened = false; ?>
            </div>
          <?php }
          echo $line;
        }
      } 
    }?>
  </div>
</div>

<?php get_footer(); ?>

<?php 
function is_image($string) {
  return preg_match("/^.*\.(jpg|jpeg|png|gif)$/i", $string);
}

function is_product($string) {
  return preg_match("/(.*?)\|(.*?)\|(.*?)/", $string);
}

function is_empty($string) {
  return !isset($string) || $string === "" || $string === "\n";
}
?>