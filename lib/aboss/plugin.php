<?php
namespace ABOSS;

class EventsPlugin {
  protected $loader;
  protected $pluginName;
  protected $pluginVersion;

  public function __construct() {
    $this->pluginName = 'ABOSS Events';
    $this->pluginVersion = '1.0.0';

    $this->loadDependencies();
    $this->defineAdminHooks();
    $this->definePublicHooks();
    $this->defineTemplates();
  }

  private function loadDependencies() {
    require_once plugin_dir_path( __FILE__ ) . 'plugin_admin.php';
    require_once plugin_dir_path( __FILE__ ) . 'plugin_public.php';
    require_once plugin_dir_path( __FILE__ ) . 'plugin_templates.php';

    require_once plugin_dir_path( __FILE__ ) . 'loader.php';
    require_once plugin_dir_path( __FILE__ ) . 'api/projects.php';
    require_once plugin_dir_path( __FILE__ ) . 'api/project.php';
    require_once plugin_dir_path( __FILE__ ) . 'api/events.php';
    require_once plugin_dir_path( __FILE__ ) . 'api/event.php';
    require_once plugin_dir_path( __FILE__ ) . 'api/account.php';

    $this->loader = new Loader();
  }

  private function defineAdminHooks() {
    $pluginAdmin = new PluginAdmin($this->getPluginName(), $this->getPluginVersion());
    $this->loader->add_action('admin_menu', $pluginAdmin, 'add_admin_menu');
    $this->loader->add_action('widgets_init', $pluginAdmin, 'register_widgets');
    $this->loader->add_action('admin_init', $pluginAdmin, 'settings_api_init' );
    $this->loader->add_action('admin_enqueue_scripts', $pluginAdmin, 'enqueue_styles');
		$this->loader->add_action('admin_enqueue_scripts', $pluginAdmin, 'enqueue_scripts');
  }

  private function definePublicHooks() {
    $pluginPublic = new PluginPublic($this->getPluginName(), $this->getPluginVersion());

    $this->loader->add_action('wp_enqueue_scripts', $pluginPublic, 'enqueue_styles');
		$this->loader->add_action('wp_enqueue_scripts', $pluginPublic, 'enqueue_scripts');
  }

  private function defineTemplates() {
    $pluginTemplates = new PluginTemplates($this->getPluginName(), $this->getPluginVersion());
    add_shortcode('aboss-events', array($pluginTemplates, 'displayEventWidget'));
  }

  public function run() {
    $this->loader->run();
  }

  private function getPluginName() {
    return $this->pluginName;
  }

  private function getPluginVersion() {
    return $this->pluginVersion;
  }
}
