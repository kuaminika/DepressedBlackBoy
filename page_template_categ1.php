<?php
/*
 * Template Name: Cat1
 * description:
 */
get_header();

?>

  
<main class="h-100  flex-shrink-0">
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
                

            ?>
            <h5 class="card-title"><?Php the_title() ?></h5>
            <p class="card-text">
              <?php
                    the_post();
                    the_content();
                   
                    $category = get_field( $groupKey."_".$field["key"],get_the_ID());
                 
                   
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
