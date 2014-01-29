<p>
  <label>Title</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>

<p>
	Total Badges
	<?php echo count($wptreehouse_profile->{'badges'}); ?> 
</p>
<p>
  <label>How many of your most recent badges would you you like to display?</label> 
  <input size="4" name="<?php echo $this->get_field_name('num_badges'); ?>" type="text" value="<?php echo $num_badges; ?>" />
</p>
<p>
  <label>Display tooltips?</label> 
  <input type="checkbox" name="<?php echo $this->get_field_name('display_tooltip'); ?>" value="1" <?php checked( $display_tooltip, 1 ); ?> />
</p>
<p>
  <label>Display random order?</label> 
  <input type="checkbox" name="<?php echo $this->get_field_name('display_random'); ?>" value="1" <?php checked( $display_random, 1 ); ?> />
</p>