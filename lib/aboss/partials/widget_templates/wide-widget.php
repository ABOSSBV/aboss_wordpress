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
$time_format = ( !empty($instance) ? strip_tags($instance['time_format']) : '' );
if (empty($time_format)) {
  $time_format = 'H:i';
}

?>
<section id="meta-aboss" class="widget aboss-events-widget-wide">
<h2 class="widget-title"><?php echo $instance['title'] ?></h2>

<?php foreach($events->get() as $event) { ?>
  <?php $start = new DateTime($event->get('start')); ?>
  <?php $end = new DateTime($event->get('end')); ?>
  <table class="aboss-event-list">
    <tr>
      <td width="25%">
        <time class="aboss-event-date-start">
            <?php echo $start->format($date_format); ?>
        </time>
      </td>
      <td width="51%" class="aboss-event aboss-event-status-<?php echo $event->get('status'); ?>">
        <span class="aboss-event-title">
          <?php if ($instance['display_ticket_links'] && $instance['display_ticket_links'] == 'yes' && $event->get('ticketLink')) {?>
            <a href="<?php echo $event->get('ticketLink') ?>"><?php echo $event->get('title'); ?></a>
          <?php } else { ?>
            <?php echo $event->get('title'); ?>
          <?php } ?>
        </span>
      </td>
      <td width="12%">
        <time class="aboss-event-time-start">
            <?php if (!$event->get('tba')) { ?>
              <?php echo $start->format($time_format); ?>
            <?php } ?>
        </time>
      </td>
      <td width="12%">
        <time class="aboss-event-time-end">
          <?php if (!$event->get('tba')) { ?>
            <?php echo $end->format($time_format); ?>
          <?php } ?>
        </time>
      </td>
    </tr>
  </table>
<?php } ?>
</section>

<style>
 .aboss-event-list {
   width: 100%;
 }
</style>