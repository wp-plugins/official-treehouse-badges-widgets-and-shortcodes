<?php 		

	echo $before_widget;
	echo $before_title . $title . $after_title;	

?>

<p><a href="http://referrals.trhou.se/<?php echo $options['wptreehouse_username']; ?>" target="_blank"><img class="wptreehouse-affiliate" src="https://static.teamtreehouse.com/assets/content/referral-badge-grn.png"/></a></p>
<p><?php echo $custom_message; ?></p>							


<?php
	echo $after_widget; 

?>