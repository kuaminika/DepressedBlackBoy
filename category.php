<?php 

get_header(); 
?>


<div class="container-fluid my-auto d-flex k-banner bg-outline-primary k-bgImage" data-url="https://picsum.photos/seed/picsum/1100/400">
    <div class="container d-flex justify-content-md-end">
        <div id="k-aboutCard" class="card col-md-6">
          <div class="card-body">
           
            <?php 
            // Check if there are any posts to display
            if ( have_posts() ) : ?>
            <h5 class="card-title"><?php single_cat_title( '' ); ?></h5>
            <div class="card-text">
            <?php
                // Display optional category description
                if ( category_description() ) : ?>
                    <div class="archive-meta"><?php echo category_description(); ?></div>
                <?php endif; ?>
            <?php endif; ?>                
            </div>
          </div>
        </div>
      </div>
 </div>
 <div class="container mt-3 d-md-flex flex-wrap justify-content-center"> 
 <div class="row">   
      <?php
 

      // The Loop
      while ( have_posts() ) : the_post(); ?>
      <div class="col-md-6 col-lg-6 my-1 ">
      
              <div class="container border border-dark d-md-flex"> 
                  <div class="col-md-8 m-lg-1">
                    <h2><a href="<?php   the_permalink()?>"><?php the_title(); ?></a></h2>
                    <div class="mb-1 text-muted"><?php the_date() ?></div>
                    <div class="card-text">
                  
                    <?php //the_content();
                    the_excerpt();

                    ?> 
                    </div>
                  </div>
                  <div class="col-md-4 col-sm-12 ">
                      <?php the_post_thumbnail(); ?>

                      <img style="width:100%" src="<?php  the_post_thumbnail_url() ?>" />
                    </div>
                </div> 
      </div>
      <?php endwhile; ?>
      
  </div>
</div>
<!-- <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary">World</strong>
          <h3 class="mb-0">Featured post</h3>
          <div class="mb-1 text-muted">Nov 12</div>
          <p class="card-text mb-auto">This is a wider card with supporting text below as a natural lead-in to additional content.</p>
          <a href="#" class="stretched-link">Continue reading</a>
        </div>
        <div class="col-auto d-none d-lg-block">
          <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"></rect><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

        </div>
      </div> -->
<?php

get_footer();
?> 
