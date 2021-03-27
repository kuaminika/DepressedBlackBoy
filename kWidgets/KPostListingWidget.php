<?php 

namespace KWidgets;


class KPostListingWidget extends \WP_Widget
{
    private $constTool ;

    private $seriesName;

     // Set up the widget name and description.
  public function __construct() {
      //
    $widget_options = $options ?? array( 'classname' => 'HMEPodcastSideBar_Widget', 'description' => 'This is hme sidebar Widget',"constTool"=> \getThemeSettings() );
    $this->constTool = $widget_options["constTool"];
    
    parent::__construct( 'KPostListingWidget', 'Kuaminika Post listing Widget', $widget_options );
  }


  public static function blankDisplayArgs()
  {
    return array(
			'id' => '',
			'name' => "",
			'description' => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget card my-4 %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h5 class="card-header">',
      'after_title'   =>  '</h5>',
      'before_body'=>'<div class="card-body">
                        <div class="row">
                           <div class="col-lg-12">',
      'after_body'=>'     </div>
                        </div>
                      </div>'
      
		) ;
  }


  public function getContent($category)
  {
    
    return $category;
    //   do_shortcode("[L]oadBoxesInCategory")
  }

  public function widget( $args, $instance ) 
  {
    $seriesName = ! empty( $instance['seriesName'] ) ? $instance['seriesName'] : ''; 
    $title = apply_filters( 'widget_title', $instance[ 'title' ] );
    $blog_title = get_bloginfo( 'name' );
    $tagline = get_bloginfo( 'description' );  

    $content = $this->getContent( $seriesName);
    echo $args['before_widget'] . $args['before_title'] . $title . $args['after_title']; 
  
    echo  $args['before_body'] . 
               $content  . 
            $args['after_body']; 

   echo $args['after_widget'];
  }

   // Create the admin area widget settings form.
   public function form( $instance ) {
    $title = ! empty( $instance['title'] ) ? $instance['title'] : ''; 
    $seriesName = ! empty( $instance['seriesName'] ) ? $instance['seriesName'] : ''; 
    ?>
    <p>
      <label for="<?php echo $this->get_field_id( 'title' ); ?>">Title:</label>
      <input type="text" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo esc_attr( $title ); ?>" />
      </br>
      <label for="<?php echo $this->get_field_id( 'seriesName' ); ?>">Series (leave blank to show all):</label>
      <input type="text" id="<?php echo $this->get_field_id( 'seriesName' ); ?>" name="<?php echo $this->get_field_name( 'seriesName' ); ?>" placeholder="put slug" value="<?php echo esc_attr( $seriesName ); ?>" />
    </p><?php
  }

  // Apply settings to the widget instance.
  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance[ 'title' ] = strip_tags( $new_instance[ 'title' ] );
    $instance[ 'seriesName' ] = strip_tags( $new_instance[ 'seriesName' ] );
    return $instance;
  }

}
// Register the widget.
add_action( 'widgets_init', function(){

  register_widget( 'KWidgets\KPostListingWidget' );
 //blankDisplayArgs
 $sidebar_args = KPostListingWidget::blankDisplayArgs();
 $sidebar_args["id"] = 'primary';
 $sidebar_args["name"] = __( 'Primary' );
    register_sidebar( $sidebar_args );

  $sidebar_args = KPostListingWidget::blankDisplayArgs();
  $sidebar_args["id"] = 'primary2';
  $sidebar_args["name"] = __( 'Primary 2' );
   register_sidebar( $sidebar_args );
});