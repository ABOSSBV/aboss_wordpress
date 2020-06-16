<?php
$apiKey = get_option('aboss_events-api-key');
$agencyId = get_option('aboss_events-agency-id');

$projectId = $instance['project_id'];

$events = new \ABOSS\Events($apiKey, $projectId, $agencyId);
$date_format = ( !empty($instance) ? strip_tags($instance['date_format']) : '' );
if (!$date_format || empty($date_format)) {
  $date_format = 'd M Y';
}

?>
<section id="meta-aboss" class="widget aboss-events-widget-calendar">

  <table class="aboss-events-widget-calendar-table">
    <?php foreach($events->get() as $event) { ?>
      <?php $start = new DateTime($event->get('start')); ?>
      <?php
        if ($month != $start->format('F')) {
          echo "<td colspan='3' class='aboss-events-widget-calendar-table-month-header'><strong>" . $start->format('F') ."</strong></td>";
        }
      ?>
      <?php $month = $start->format('F'); ?>

      <tr class="aboss-events-widget-calendar aboss-events-widget-calendar-status-<?php echo $event->get('status'); ?>">
        <td class="aboss-events-widget-calendar-date">
          <time class="aboss-events-widget-calendar-time-start">
            <?php echo $start->format($date_format); ?>
          </time>
        </td>
        <td class="aboss-events-widget-calendar-title">
          <?php echo $event->get('title'); ?>
        </td>
        <td>

          <?php if ($instance['display_ticket_links'] && $instance['display_ticket_links'] == 'yes' && $event->get('ticketLink')) {?>
            <a href="<?php echo $event->get('ticketLink') ?>">
              <button class="aboss-events-widget-calendar-tickets-button">Tickets</button>
            </a>
          <?php } ?>
        </td>
      </tr>
    <?php } ?>
  </table>
</section>

<style>
.aboss-events-widget-calendar-table-month-header {
  padding-top: 15px;
}

.aboss-events-widget-calendar-table {
  width: 100%;
}

.aboss-events-widget-calendar-date {
  width: 100px;
}

.aboss-events-widget-calendar-tickets-button {
  padding: 5px 15px;
  border: 0;
}
</style>