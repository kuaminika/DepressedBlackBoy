<?php 

add_shortcode("allEpisodes",function( $atts){

    echo "<div id='allEpisodes' class='d-flex flex-wrap flex-md-row flex-sm-column '>";
        dynamic_sidebar('primary2');

    echo "</div>";

});


add_shortcode("LoadBoxesInCategory",function($parms)
{

  //  echo json_encode($parms)."</br>";
    $categoryName = key_exists("categoryname",$parms)?  $parms["categoryname"]:"";
    $args = ["post_type"=>"post" ,
                "tax_query"=>[
                                ["taxonomy"=>"category",
                                    "field"=>"slug",
                                    "terms"=> $categoryName ]
                             ]
            ];


          //  echo json_encode($args)."</br>";
        $loop = new \WP_Query($args);

      
        ?>
        <div class="container mt-3 d-md-flex flex-wrap justify-content-center"> 
            <div class="row">   
                <?php
                while($loop->have_posts()) :   
                   $loop->the_post(); 
                ?>
                <div class="col-md-6 col-lg-6 my-1 ">
                    <div class="card">
                        <h5 class="card-header"><a href="<?php   the_permalink()?>"><?php the_title(); ?></a></h5>
                        <div class="card-body border border-dark d-md-flex"> 
                            <div class="col-md-8 m-lg-1">
                            <?php the_excerpt(); ?>
                            </div>
                            
                            <div class="col-md-4 col-sm-12 ">

                                <img style="width:100%" src="<?php  the_post_thumbnail_url() ?>" />
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                endwhile;
           // echo json_encode($othersInCategory);
            ?>

            </div>
        </div>

            <?php
});