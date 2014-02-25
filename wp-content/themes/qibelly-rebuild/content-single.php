<?php
/**
 * @package qibelly-rebuild
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header">
    <img src="http://placehold.it/1280x720" class="entry-image">
    <h2 class="entry-title"><?php the_title(); ?></h2>
    <h3 class="entry-meta"><?php qibelly_rebuild_posted_on(); ?></h3>
  </header>
  <div class="entry-content">
    <?php the_content(); ?>
    
    <?php
        wp_link_pages( array(
            'before' => '<div class="page-links">' . __( 'Pages:', 'qibelly-rebuild' ),
            'after'  => '</div>',
        ) );
    ?>            
  </div>
  <footer class="entry-social">
    <ul class="widget-social">
      <li><a href="" class="facebook">Facebook</a></li>
      <li><a href="" class="twitter">Twitter</a></li>
    </ul>          
  </footer>  
  <footer class="entry-meta" style="display: none;">
      <?php
          /* translators: used between list items, there is a space after the comma */
          $category_list = get_the_category_list( __( ', ', 'qibelly-rebuild' ) );

          /* translators: used between list items, there is a space after the comma */
          $tag_list = get_the_tag_list( '', __( ', ', 'qibelly-rebuild' ) );

          if ( ! qibelly_rebuild_categorized_blog() ) {
              // This blog only has 1 category so we just need to worry about tags in the meta text
              if ( '' != $tag_list ) {
                  $meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'qibelly-rebuild' );
              } else {
                  $meta_text = __( 'Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'qibelly-rebuild' );
              }

          } else {
              // But this blog has loads of categories so we should probably display them here
              if ( '' != $tag_list ) {
                  $meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'qibelly-rebuild' );
              } else {
                  $meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" rel="bookmark">permalink</a>.', 'qibelly-rebuild' );
              }

          } // end check for categories on this blog

          printf(
              $meta_text,
              $category_list,
              $tag_list,
              get_permalink()
          );
      ?>

      <?php edit_post_link( __( 'Edit', 'qibelly-rebuild' ), '<span class="edit-link">', '</span>' ); ?>
  </footer><!-- .entry-meta -->
</article><!-- #post-## -->
