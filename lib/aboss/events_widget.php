<?php
namespace ABOSS;
class EventsWidget extends \WP_Widget {
  public function __construct() {
    parent::__construct(
        'aboss-events-widget', // Base ID
        'ABOSS Events', // Name
        array(
          'description' => __( 'Add ABOSS Widget', 'aboss-events' )
        ) // Args
    );
  }

  public function form($instance) {
    require plugin_dir_path(dirname(__FILE__)) . 'aboss/partials/admin-widget-settings.php';
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['project_id'] = intval($new_instance['project_id']);
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['amount_of_shows'] = intval($new_instance['amount_of_shows']);
    $instance['display_ticket_links'] = strip_tags($new_instance['display_ticket_links']);

    return $instance;
  }

  public function widget( $args, $instance ) {
    require plugin_dir_path( dirname( __FILE__ ) ) . 'aboss/partials/public-widget.php';
  }
}
 ?>
