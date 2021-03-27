<?php
/*
 * Template Name: Cat1
 * description:
 */
get_header();

?>
<div class="container-fluid my-auto d-flex k-banner bg-outline-primary k-bgImage"  data-url="<?php the_post_thumbnail_url("full") ?>">
      <div class="container d-flex justify-content-md-end">
        <div id="k-aboutCard" class="card col-md-6">
          <div class="card-body">
            <?php
              $category;
              $extraFieldInfos = getExtraPageFieldInfos();
              $groupKey = $extraFieldInfos["groupKey"];
              $field = $extraFieldInfos["hashedExtraFieldsForPages"]["categoryListDisplay"];
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
                    $category = get_field( $groupKey."_".$field["key"],get_the_ID());
                 
                    // // If comments are open or there is at least one comment, load up the comment template.
                    // if ( comments_open() || get_comments_number() ) {
                    // 	comments_template();
                    // }
                endwhile; // End of the loop.
                ?>
            </p>
          </div>
        </div>

      </div>
    </div>

<?php
  
  $category =  $category ? $category:"No category given";
  echo $category;

  if(isset($category))
  {
    do_shortcode("[LoadBoxesInCategory  categoryname=".$category."]");
  }


get_footer();
