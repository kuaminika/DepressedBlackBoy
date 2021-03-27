<?php
get_header();


?>
<div class="container my-auto k-banner bg-outline-primary k-bgImage" data-url="">
  
       
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
                    // get_template_part( 'template-parts/content/content-page' );

                    // // If comments are open or there is at least one comment, load up the comment template.
                    // if ( comments_open() || get_comments_number() ) {
                    // 	comments_template();
                    // }
                endwhile; // End of the loop.
                ?>
            </p>

    </div>

<?php



get_footer();
