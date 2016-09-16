<?php
$apiKey = get_option('aboss_events-api-key');
$system = get_option('aboss_events-system');
$agencyId = get_option('aboss_events-agency-id');
$projects = new ABOSS\Projects($apiKey, $system, $agencyId);
$account = new ABOSS\Account($apiKey);

?>
<div class="wrap">
  <h2>ABOSS Events</h2>

  <?php screen_icon(); ?>

  <form method="post" action="options.php">
  <?php settings_fields('aboss-events'); ?>
  <?php do_settings_sections('aboss-events'); ?>
  <?php submit_button('Save Changes'); ?>
  </form>
  <h2>Connected account</h2>
  <ul>
    <li><?php echo $account->get('nameFirst'); ?> <?php echo $account->get('nameLast'); ?></li>
    <li><a href="mailto:<?php echo $account->get('email'); ?>"><?php echo $account->get('email'); ?></a></li>
  </ul>
  <h2>Projects connected to this account</h2>
  <ul>
  <?php foreach($projects->get() as $project) {
    ?>
    <li><?php echo $project->get('title'); ?></li>
    <?
  }?>
</div>
