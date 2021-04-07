<?php
/*
 * Template Name: HomePage
 * description:
 */
get_header();

?>

  
<main class="h-100  flex-shrink-0">
  <div class="container-fluid my-auto d-flex k-big-banner bg-outline-primary k-bgImage" data-url="<?php the_post_thumbnail_url("full") ?>">
      <div class="container  d-flex">
        <div id="k-aboutCard" class="card col-md-6">
          <div class="card-body">
            <?php
              /* Start the Loop */
              while ( have_posts() ) :
                
//echo wp_get_attachment_url(the_ID(), 'medium' );

            ?>
            <h5 class="card-title"><?Php the_title() ?></h5>
            <p class="card-text">
              <?php
                    the_post();
                    the_content();
                endwhile; // End of the loop.
                ?>
            </p>
          </div>
        </div>

      </div>
    </div>

<?php


get_footer();
