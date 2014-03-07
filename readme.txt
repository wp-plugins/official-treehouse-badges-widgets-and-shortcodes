=== Official Treehouse Badges Widget and Shortcode ===
Contributors: zgordon, treehousezac
Tags: widget, shortcode, badges, Treehouse, profile, API, learning, education
Requires at least: 3.0.1
Tested up to: 3.8
Stable tag: 1.4
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Provides both widgets and shortcodes to help you display your Treehouse profile badges on your website.  The official Treehouse badges badges and plugin.


== Description ==

Treehouse is an amazing online technology company that teaches graphic design, web design and development, mobile development and business.  As you watch videos, take quizes, and complete code challenges, you earn badges showing the work you have completed.  Everyone's profile page at Treehouse [http://teamtreehouse.com/profilename] shows off the badges you have earned.  These badges are great to add to your personal web site to show off what you have learned, and more and more employers in the industry are starting to recognize the work and knowledge that Treehouse badges represent.

This plugin allows you to show off the badges from your Treehouse profile and display them on your WordPress site.  You can use a widget to display your badges in a header, sidebar or footer or use a shortcode to display badges in the main content are for a post or page.  The plugin offers two customization options:

1. Number of Badges - Choose how many of your recent badges you would like to display
2. Tooltip - An optional tooltip with the name of the badge and the related course

Along with these features, the plugin also includes an affiliate widget so you can encourage people to sign up at Treehouse and get a discount off your monthly membership.

This is the official badges plugin for Treehouse and was created along with a video series on How to Build a WordPress Plugin.  

== Installation ==

There are a few options for installing and setting up this plugin.

= Upload Manually =

1. Download and unzip the plugin
2. Upload the 'wptreehouse-badges' folder into the '/wp-content/plugins/' directory
3. Go to the Plugins admin page and activate the plugin

= Install Via Admin Area =

1. In the admin area go to Plugins > Add New and search for "Official Treehouse Badges Plugin"
2. Click install and then click activate

= To Setup The Plugin =

1. Find your Treehouse username (see instructions under FAQ).
2. In the WordPress admin area go to Settings > Treehouse Badges and then enter in your username

= How to Use the Badges Widget =

1. Setup the Plugin (refer to above)
2. Go to Appearance > Widgets and drag the 'Treehouse Badges Widget' to your sidebar.  
3. Enter in a Title to appear above the badges.  For example "My Treehouse Badges"
4. Choose how many badges you would like to display
5. Check the box if you would like to have a tooltip display with information about the badge

= How to Use the Shortcode =

1. Navigate to the post or page you would like to add the badges to
2. Enter in the shortcode [wptreehouse_badges]
3. Customize the number of badges displayed by adding a the parameter 'num_badges' with the number of badges you want to display. [wptreehouse_badges num_badges='4'].  By default, 8 badges are displayed.
4. Customize whether a tooltip will appear along with the badges by using the parameter 'tooltip' with a value of 'on' or 'off' [wptreehouse_badges tooltip='off'].  By default the tooltip has an 'on' setting.
4. If you want to display a random selection of badges then use the parameter 'random' with a value of 'on' or 'off' [wptreehouse_badges random='on'].  By default the tooltip has an 'off' setting.
5. You can use any of the parameters together like so [wptreehouse_badges num_badges='4' tooltip='off']

= How to Use the Affiliate Widget =

1. Setup the Plugin (refer to above)
2. Go to Appearance > Widgets and drag the 'Treehouse Affiliate Widget' to your sidebar.  
3. Enter in a Title to appear above the badges.  For example "Join Treehouse"

== Frequently Asked Questions ==

= How do I find my Treehouse username? =

1. Login to your Treehouse account. 
2. Hover over the link in the top right of the navigation with a settings (gear) icon and your profile picture.  From the dropdown menu select 'View Your Profile.'  
3. The username is appended to the teamtreehouse.com url.  So your username should appear like teamtreehouse.com/username.  

= It's taking a really long time when I submit my username in the admin area =

Congratulations!  That means you have a lot of badges to pull in from Treehouse.  Just give it a few seconds and it should load properly.

= How to I customize the CSS for the badges? =

Here is the basic markup for how the badges are displayed.


<code><pre>
	&lt;ul class=&quot;wptreehouse-badges frontend&quot;&gt;
		&lt;li class=&quot;wptreehouse-badge&quot;&gt;
			&lt;img src=&quot;#&quot;&gt;		
			&lt;!-- Optional Tooltip  --&gt;
			&lt;div class=&quot;wptreehouse-badge-info&quot;&gt;
				&lt;p class=&quot;wptreehouse-badge-name&quot;&gt;&lt;a href=&quot;#&quot;&gt;badge Name&lt;/a&gt;&lt;/p&gt;							
				&lt;p class=&quot;wptreehouse-badge-project&quot;&gt;&lt;a href=&quot;#&quot;&gt;Course Title&lt;/a&gt;&lt;/p&gt;								
				&lt;a href=&quot;#&quot; class=&quot;wptreehouse-logo&quot;&gt;&lt;img src=&quot;badge.png&quot;/&gt;&lt;/a&gt;
				&lt;span class=&quot;wptreehouse-tooltip bottom&quot;&gt;&lt;/span&gt;							
			&lt;/div&gt;
			&lt;!-- End Tooltip  --&gt;
		&lt;/li&gt;
	&lt;/ul&gt;
</pre></code>

You can style the badges just like you would any other HTML elements.  Note though that the tooltip is absolutely positioned based on the size of the image.  If you change the size of the badge image you will need to adjust the positioning of the tooltip as well.

= How Often Does the Profile Information Get Updated? =

Whenever someone visits a page, the plugin checks to see if the profile information was updated in the last 24 hours.  If it has been longer than 24 hours, then the plugin will update the profile information.  The next time someone visits the site or clicks on a page, the latests badges show.

= Can I Choose What Specific Badges I Want to Display? =

Unfortunately, not yet.  For future releases, we are considering more customized ways to choose what badges you want to display, instead of just showing the most recent badges.  However, we recently released the ability to display random images.




== Screenshots ==

1. Once you have installed the plugin, navigate to Settings > Treehouse Badges in the admin area
2. Type in your Treehouse username (see FAQ for how to find your username)
3. Preview your latest badges and your profile information
4. To add a widget to your site go to Appearance > Widgets.  Look for the 'Official Treehouse Badges Plugin' widget and drag to the appropraite widget area.  Enter in a title to appear above the badges, enter in the number of badges you would like to appear, check or uncheck the tooltip option to have a tooltip display with more information about each badge
5. To add badges using a shortcode use [wptreehouse_badges].  You can also use the following optional parameters [wptreehouse_badges num_badges="4" tooltip="off" random="on"].  By default it displays 8 badges with the tooltip set to 'on' and random is set to 'off.'
6. A preview of the badges displaying as a widget
7. A preview of the badges displaying as a shortcode
8. A preview of the tooltip 

== Changelog ==

= 1.4 = 

* Fixed admin CSS compatibility issue

= 1.3 = 

* Added ability to display badges in random order
* Added Treehouse Affiliate Widget
* Fixed spelling mistake on error message

= 1.2 = 

* Fixed logo link issue

= 1.1 = 

* Fixed CSS link issue

= 1.0 =

* Optimized screenshots

= 0.9 =

* Initial launch of the plugin
* Display most recent badges of a user
* Option to choose how many recent badges to display
* Option to have a tooltip display showing information about each badge

== Upgrade Notice ==

= 1.3 = 

* Fixed CSS compatibility issue with other admin settings pages

= 1.3 = 

* Added ability to display random badges, added affiliate widget


= 1.1 = 

* Fixed CSS issue, important update

= 1.0 = 

* Updated the way the plugin is displayed on WordPress.org

= 0.9 =

* This is the first version of the plugin.  No updates available yet.