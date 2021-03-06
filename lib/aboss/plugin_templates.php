<?php
namespace ABOSS;

require_once plugin_dir_path( __FILE__ ) . 'api/events.php';
require_once plugin_dir_path( __FILE__ ) . 'api/event.php';
require_once plugin_dir_path( __FILE__ ) . 'api/projects.php';

class PluginTemplates {
  /**
   * displays the widget based on attributes
   * @param  [type] $attrs [description]
   * @return [type]        [description]
   */
  public function displayEventWidget($attrs) {
    $widget = new EventsWidget();
    
    ob_start();
    $widget->widget([], $attrs);
    return ob_get_clean();
  }
}
?>
