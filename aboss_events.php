<?php
/**
 * ABOSS Events
 *
 *
 * @link              http://a-boss.net
 * @since             1.0.0
 * @package           ABOSS Events
 *
 * @wordpress-plugin
 * Plugin Name:       ABOSS Events
 * Plugin URI:        http://integrations.a-boss.net/wordpress
 * Description:       Display your ABOSS Events in Wordpress. Requires cURL to work.
 * Version:           1.0.0
 * Author:            ABOSS B.V.
 * Author URI:        http://a-boss.net/
 * License:           MIT
 * License URI:       https://opensource.org/licenses/MIT
 * Text Domain:       aboss-events
 */
 require_once plugin_dir_path( __FILE__ ) . 'lib/aboss/activator.php';
require_once plugin_dir_path( __FILE__ ) . 'lib/aboss/plugin.php';

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function activate_aboss_events() {
  ABOSS\Activator::activate();
}

function deactivate_aboss_events() {
  ABOSS\Activator::deactivate();
}

register_activation_hook( __FILE__, 'activate_aboss_events' );
register_deactivation_hook( __FILE__, 'deactivate_aboss_events' );


function run_aboss_events() {
  $plugin = new ABOSS\EventsPlugin();
  $plugin->run();
}

run_aboss_events();

?>
