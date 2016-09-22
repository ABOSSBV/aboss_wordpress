<?php
$apiKey = get_option('aboss_events-api-key');
$system = get_option('aboss_events-system');
$agencyId = get_option('aboss_events-agency-id');

$projectId = $instance['project_id'];

$events = new \ABOSS\Events($apiKey, $projectId, $agencyId);
$date_format = ( !empty($instance) ? strip_tags($instance['date_format']) : '' );
if (empty($date_format)) {
  $date_format = 'd M Y';
}

?>
<section id="meta-aboss" class="widget aboss-events-widget-wide">
<h2 class="widget-title"><?php echo $instance['title'] ?></h2>



<?php foreach($events->get() as $event) { ?>
<table class="aboss-event-list">
  <tr>
    <td width="60%" class="aboss-event aboss-event-status-<?php echo $event->get('status'); ?>">
      <span class="aboss-event-title">
        <?php if ($instance['display_ticket_links'] && $instance['display_ticket_links'] == 'yes') {?>
          <a href="<?php echo $event->get('ticketLink') ?>"><?php echo $event->get('title'); ?></a>
        <?php } else { ?>
          <?php echo $event->get('title'); ?>
        <?php } ?>
      </span>
    </td>
    <td width="20%">
      <time class="aboss-event-time-start">
          <?php echo $event->get('start'); ?>
      </time>
    </td>
    <td width="20%">
      <time class="aboss-event-time-end">
        <?php echo $event->get('end'); ?>
      </time>
    </td>
  </tr>
</table>
<?php } ?>
</section>
