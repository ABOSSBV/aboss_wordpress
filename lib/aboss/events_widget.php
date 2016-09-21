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
    $templates = [];

    $handle = opendir(plugin_dir_path( dirname( __FILE__ ) ) . 'aboss/partials/widget_templates');
    while (false !== ($entry = readdir($handle))) {
      if ($entry != "." && $entry != "..") {
        $array_list = explode('-', $entry);
        $new_title = join(' ', $array_list);
        $new_title = substr($new_title, 0, -4);
        $templates[] = [
          'title' => ucwords($new_title),
          'file' => $entry,
        ];
      }
    }

    require plugin_dir_path(dirname(__FILE__)) . 'aboss/partials/admin-widget-settings.php';
  }

  public function update( $new_instance, $old_instance ) {
    $instance = $old_instance;
    $instance['project_id'] = intval($new_instance['project_id']);
    $instance['title'] = strip_tags($new_instance['title']);
    $instance['amount_of_shows'] = intval($new_instance['amount_of_shows']);
    $instance['display_ticket_links'] = strip_tags($new_instance['display_ticket_links']);
    $instance['date_formatting'] = strip_tags($new_instance['date_formatting']);
    $instance['template'] = strip_tags($new_instance['template']);
    return $instance;
  }

  public function widget( $args, $instance ) {
    if (!$instance['template']) {
      $template = 'small-widget';
    } else {
      $template = $instance['template'];
    }

    if (substr($template, -4) !== '.php') {
      $template = $template . '.php';
    }

    require plugin_dir_path( dirname( __FILE__ ) ) . 'aboss/partials/widget_templates/' . $template;
  }
}
 ?>
