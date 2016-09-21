<div class="form__row">
  <label for="aboss_events-api-key">
    API Key
  </label>
  <input type="text" name="aboss_events-api-key" value="<?php echo get_option('aboss_events-api-key'); ?>"/>
</div>
<div class="form__row">
  <label for="">
    System
  </label>
  <select name="aboss_events-system">
    <option value="agency" <?php if (get_option('aboss_events-system') == 'agency') {echo "selected";} ?>>Agency</option>
    <option value="artist" <?php if (get_option('aboss_events-system') == 'artist') {echo "selected";} ?>>Artist</option>
  </select>
</div>
<div class="form__row">
  <label for="">
    Agency ID
  </label>
  <input type="text" name="aboss_events-agency-id" value="<?php echo get_option('aboss_events-agency-id'); ?>"/>
</div>
