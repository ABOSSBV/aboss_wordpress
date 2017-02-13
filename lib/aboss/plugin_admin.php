<?php
namespace ABOSS;
require_once plugin_dir_path( __FILE__ ) . 'events_widget.php';

class PluginAdmin {
  protected $pluginName;
  protected $pluginVersion;

  public function __construct($pluginName, $pluginVersion) {
    $this->$pluginName = $pluginName;
    $this->$pluginVersion = $pluginVersion;
  }

  public function add_admin_menu() {
    add_menu_page(
      __( 'ABOSS Events', 'aboss-events' ),
      'ABOSS Events',
      'manage_options',
      'aboss_events/aboss-events-admin.php',
      '\ABOSS\PluginAdmin::admin_page',
      plugins_url( 'aboss_events/images/icon.png' ),
      6
    );
  }
  public function register_widgets() {
    register_widget('ABOSS\EventsWidget');
  }

  public function admin_page($args) {
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'aboss/partials/admin-display.php';
  }

  public function settings_api_init() {
    add_settings_section(
    	'aboss-events-basics',
    	'',
    	array($this, 'eg_setting_section_callback_function'),
    	'aboss-events'
    );

    register_setting('aboss-events', 'aboss_events-api-key');
    register_setting('aboss-events', 'aboss_events-system');
    register_setting('aboss-events', 'aboss_events-agency-id');
  }

  public function eg_setting_section_callback_function() {
    require_once plugin_dir_path( dirname( __FILE__ ) ) . 'aboss/partials/admin-settings.php';
  }

  public function enqueue_styles() {
    wp_enqueue_style('aboss-events', plugin_dir_url( __FILE__ ) . '../../css/aboss-events-admin.css', array(), $this->pluginVersion, 'all' );
  }

  public function enqueue_scripts() {
    wp_enqueue_script('aboss-events', plugin_dir_url( __FILE__ ) . '../../js/aboss-events-admin.js' );

  }
}
