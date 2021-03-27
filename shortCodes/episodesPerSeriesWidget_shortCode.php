<?php 

/*
this short code does a widget that only gets the names of podcasts with the same term 
*/
add_shortcode("episodesPerSeriesWidget",function( $paramArray){

    
    $seriesName_slug = $paramArray["seriesname_slug"];
    $seriesName = $paramArray["seriesname"];
    $constTool = HMEPodCastPost\getHMEPodCastPostConsts();
    $terms =  [get_term_by( "slug", $seriesName_slug,  $constTool->sectionTaxonomyName)];

    $terms = $terms[0]?  $terms:get_terms( array( 'post_types' => $seriesName_slug, 'taxonomy' => $constTool->sectionTaxonomyName) );
   
    $result = '
    
    <div class="widget card my-4 HMEPodcastSideBar_Widget">
         <h5 class="card-header">'.$seriesName .' podcasts</h5>
         <div class="card-body">
            <ul class="list-unstyled mb-0">';
            foreach ($terms as $key=> $seriesObj)
            {
                $episodes = HMEPodCastPost\getHMEPodCastsEpisodeBySeries( $seriesObj);
            
                foreach($episodes as $episode)
                {
                $result.="<li><a href='".$constTool->siteUrl."/index.php/".$seriesName_slug."/".$episode->slug."'>".$episode->title."</a></li>";
                }    
            }
            $result.='
            </ul>
        </div>
        <div class="card-footer">
           <a href="'.$constTool->allEpisodesUrl.'"> <h5 class="btn btn-primary"> All podcasts</h5></a>
        </div>
    </div>
    ';
    
    echo $result;

    
});



