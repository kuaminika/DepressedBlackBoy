<?php
                               
get_header();

$post_info = [];
while ( have_posts() ) :
    the_post();
    $id = get_the_ID();
    $post_info["id"] = $id;
    $post_info["title"] =  get_the_title();
    $post_info["content"] = get_the_content();
    $post_info["date"]=get_the_date();
    $post_info["slug"] = get_field( 'post_name', $id );
    $post_info["imageUrl"] = get_the_post_thumbnail_url($id ,"full");
    $post_type = "post";
    $taxonomyName = "category";
    $terms = get_the_terms($id,$taxonomyName);
    $taxonomyObj = $terms[0];
  //  echo json_encode($terms)."</br>";
  //  echo json_encode($taxonomyObj)."</br>";
   

    $args = ["post_type"=>$post_type ,
            "tax_query"=>[
               ["taxonomy"=>$taxonomyObj->taxonomy,
                   "field"=>"slug",
                   "terms"=>$taxonomyObj->slug]
           ]
       ];
    $loop = new \WP_Query($args);
    $seriesName = $taxonomyObj->name;

     $othersInCategory =[];
        
     
    while($loop->have_posts()) : $loop->the_post();
        $id = get_the_ID();
        //   $othersInCategory [] 
        $othersInCategory[$id] = ["title"  =>get_the_title(),"id"=>$id];
      
   
    endwhile;

endwhile;
?>


<div class="container">
    <div class="row">
        <!-- Post Content Column -->
        <div class="col-lg-8">
            
            <!-- Title -->
            <h3 class="mt-4"><?php echo  $post_info["title"];?></h3>  <hr>

            <?php if($post_info["imageUrl"]): ?>
               <!-- <div class="container-fluid my-auto d-flex k-banner bg-outline-primary k-bgImage" data-url="<?php echo $post_info["imageUrl"];?>">
                </div> -->
                <div style="background-image: url(<?php echo $post_info["imageUrl"];?>);background-size: auto 100%;background-repeat:no-repeat">
                    <img src="<?php echo $post_info["imageUrl"];?>" style="visibility: hidden;width:856px" />
                    </div>
            <?php endif; ?>

            <!-- Date/Time -->
            <p class="text-right"><?php echo  $post_info["date"]; ?></p>
            <hr> 
            <?php echo $post_info["content"]  ?>  
        </div>
        <div class="col-lg-4">
            <div class="widget card my-4 HMEPodcastSideBar_Widget">
                <h5 class="card-header"><?php echo $seriesName ?></h5>
                <div class="card-body">
                    <ul class="list-unstyled mb-0">
                    <?php  foreach ($othersInCategory as $key=> $value) :?>                
                        <li><a href='".$constTool->siteUrl."/index.php/".$seriesName_slug."/".$episode->slug."'> <?php echo $value["title"] ?></a></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
                <div class="card-footer">
                <a href="'.$constTool->allEpisodesUrl.'"> <h5 class="btn btn-primary"> All podcasts</h5></a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();