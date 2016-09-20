<?php
namespace ABOSS;

require_once plugin_dir_path( __FILE__ ) . 'api/events.php';
require_once plugin_dir_path( __FILE__ ) . 'api/event.php';
require_once plugin_dir_path( __FILE__ ) . 'api/projects.php';

class PluginPublic {
  public function Run() {

  }

  public function enqueue_styles() {
    wp_enqueue_style('aboss-events', plugin_dir_url( __FILE__ ) . '../../css/aboss-events.css', array(), $this->pluginVersion, 'all' );
  }

  public function enqueue_scripts() {
    wp_enqueue_script('aboss-events', plugin_dir_url( __FILE__ ) . '../../js/aboss-events.js' );
  }

}
?>
