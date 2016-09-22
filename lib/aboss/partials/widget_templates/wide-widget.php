<?php
$apiKey = get_option('aboss_events-api-key');
$system = get_option('aboss_events-system');
$agencyId = get_option('aboss_events-agency-id');

$projectId = $instance['project_id'];

$events = new \ABOSS\Events($apiKey, $projectId, $agencyId);
?>
<section id="meta-aboss" class="widget aboss-events-widget-wide"><h2 class="widget-title"><?php echo $instance['title'] ?></h2>

  <ul class="aboss-event-list">
    <?php foreach($events->get() as $event) { ?>
      <li class="aboss-event aboss-event-status-<?php echo $event->get('status'); ?>">
        <span class="aboss-event-title">
          <?php if ($instance['display_ticket_links'] && $instance['display_ticket_links'] == 'yes') {?>
            <a href="<?php echo $event->get('ticketLink') ?>"><?php echo $event->get('title'); ?></a>
          <?php } else { ?>
            <?php echo $event->get('title'); ?>
          <?php } ?>
        </span>

        <time class="aboss-event-time-start">
          <?php echo $event->get('start'); ?>
        </time>

        <time class="aboss-event-time-end">
          <?php echo $event->get('end'); ?>
        </time>

      </li>
    <?php } ?>
  </ul>
</section>
