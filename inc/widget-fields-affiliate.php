<p>
  <label>Title</label> 
  <input class="widefat" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" />
</p>
<p><a href="http://referrals.trhou.se/<?php echo $options['wptreehouse_username']; ?>" target="_blank"><img class="wptreehouse-affiliate" src="https://static.teamtreehouse.com/assets/content/referral-badge-grn.png"/></a></p>
<p><em>Enter in an option message to appear along with the affiliate image link.  Markup not allowed.</em></p>
<p>
  <label>Custom Message</label> 
</p>
<p><textarea class="widefat" style="height: 8em" name="<?php echo $this->get_field_name('custom_message'); ?>"><?php echo $custom_message; ?></textarea></p>
