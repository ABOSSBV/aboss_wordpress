<?php
$apiKey = get_option('aboss_events-api-key');
$system = get_option('aboss_events-system');
$agencyId = get_option('aboss_events-agency-id');

$projectId = ( !empty($instance) ? strip_tags($instance['project_id']) : '' );
$title = ( !empty($instance) ? strip_tags($instance['title']) : '' );
$amount_of_shows = ( !empty($instance) ? strip_tags($instance['amount_of_shows']) : '' );
$display_ticket_links = ( !empty($instance) ? strip_tags($instance['display_ticket_links']) : '' );
$template_file = ( !empty($instance) ? strip_tags($instance['template']) : '' );
$date_format = ( !empty($instance) ? strip_tags($instance['date_format']) : '' );
if (empty($date_format)) {
  $date_format = 'd M Y';
}

$projectList = new \ABOSS\Projects($apiKey, $system, $agencyId);

?>
  <p>
    <label for="<?php echo $this->get_field_id('title'); ?>">Title</label>
    <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>" />
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('project_id'); ?>">Project for widget</label>
    <select class="widefat" id="<?php echo $this->get_field_id('project_id'); ?>" name="<?php echo $this->get_field_name('project_id'); ?>">
      <?php foreach ($projectList->get() as $project) { ?>
        <option value="<?php echo $project->get('id'); ?>" <?php if ($projectId == intval($project->get('id'))) { echo " selected";} ?>><?php echo $project->get('title'); ?></option>
      <?php } ?>
    </select>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('template'); ?>">Template</label>
    <select class="widefat" id="<?php echo $this->get_field_id('template'); ?>" name="<?php echo $this->get_field_name('template'); ?>">
      <?php foreach ($templates as $template) { ?>
        <option value="<?php echo $template['file'] ?>" <?php if ($template_file == $template['file']) { echo " selected";} ?>><?php echo $template['title'] ?></option>
      <?php } ?>
    </select>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('date_format'); ?>">Date format (as in <a href="http://php.net/manual/en/function.date.php">PHP date function</a>)</label>
    <input class="widefat" id="<?php echo $this->get_field_id('date_format'); ?>" name="<?php echo $this->get_field_name('date_format'); ?>" type="text" value="<?php echo esc_attr($date_format); ?>" />
  </p>

  <p>
    <label for="<?php echo $this->get_field_id('display_ticket_links'); ?>">
      <input type="checkbox" id="<?php echo $this->get_field_id('display_ticket_links'); ?>" name="<?php echo $this->get_field_name('display_ticket_links'); ?>" type="text" value="yes" <?php if ($display_ticket_links == 'yes') {echo " checked"; } ?>/>

      Display Ticket Links

    </label>
  </p>
  <p>
    <label for="<?php echo $this->get_field_id('amount_of_shows'); ?>">Amount of shows to display</label>
    <input class="widefat" id="<?php echo $this->get_field_id('amount_of_shows'); ?>" name="<?php echo $this->get_field_name('amount_of_shows'); ?>" type="text" value="<?php echo esc_attr($amount_of_shows); ?>" />
  </p>
