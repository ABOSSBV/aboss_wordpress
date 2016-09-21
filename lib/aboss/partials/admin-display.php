<?php
$apiKey = get_option('aboss_events-api-key');
$system = get_option('aboss_events-system');
$agencyId = get_option('aboss_events-agency-id');
$projects = new ABOSS\Projects($apiKey, $system, $agencyId);
$account = new ABOSS\Account($apiKey);

?>
<div class="plugin__title"><h1>ABOSS Events</h1></div>

<div class="plugin__container">
  <div class="plugin__form">
    <h2>Configuration</h2>
    <?php screen_icon(); ?>
    <form method="post" action="options.php">
    <?php settings_fields('aboss-events'); ?>
    <?php do_settings_sections('aboss-events'); ?>
    <?php submit_button('Save Changes'); ?>
    </form>
  </div>

  <div class="plugin__account">
    <h2>Connected account</h2>
    <ul>
      <li><?php echo $account->get('nameFirst'); ?> <?php echo $account->get('nameLast'); ?></li>
      <li><a href="mailto:<?php echo $account->get('email'); ?>"><?php echo $account->get('email'); ?></a></li>
    </ul>
  </div>

  <div class="plugin__projects">
    <h2>Projects</h2>
    <ul>
    <?php foreach($projects->get() as $project) {
      ?>
      <li><?php echo $project->get('title'); ?></li>
      <?
    }?>
    </ul>
  </div>

</div>
