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
<section id="meta-aboss" class="widget aboss-events-widget-small ">

  <h2 class="widget-title"><?php echo $instance['title'] ?></h2>

  <ul class="aboss-event-list">
    <?php foreach($events->get() as $event) { ?>
      <?php $start = new DateTime($event->get('start')); ?>
      <li class="aboss-event aboss-event-status-<?php echo $event->get('status'); ?>">
        <span class="aboss-event-title">
          <?php if ($instance['display_ticket_links'] && $instance['display_ticket_links'] == 'yes') {?>
            <a href="<?php echo $event->get('ticketLink') ?>"><?php echo $event->get('title'); ?></a>
          <?php } else { ?>
            <?php echo $event->get('title'); ?>
          <?php } ?>
        </span>

        <span>
          <time class="aboss-event-time-start">
            <?php echo $start->format($date_format); ?>
          </time>
        </span>
      </li>
    <?php } ?>
  </ul>
</section>
