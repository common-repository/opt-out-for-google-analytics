=== Opt-Out for Google Analytics (DSGVO / GDPR) ===
Contributors: schweizersolutions
Tags: google analytics, opt-out, dsgvo, gdpr, analytics
Requires at least: 3.5
Tested up to: 6.5
Requires PHP: 7.0
Stable tag: 2.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html
Donate link: https://www.schweizersolutions.com/?utm_source=wordpressorg&utm_medium=plugin&utm_campaign=donate

Allows the user to opt-out of Google Analytics tracking. DSGVO / GDPR.

== Description ==

The Basic Data Protection Regulation (DSGVO, EU-DSGVO, GDPR) stipulates that a site visitor must have the option to object to the collection by Google Analytics.

Until now, this was only possible via browser addon, or complicated JavaScript code embedding on the own website. With this plugin, this is child's play and the user also has the option to undo the objection.

**Features**

* **Support for Google Analytics 4 (GA4)**
* Full integration of the new WordPress DSGVO / GDPR features
* Weekly check whether the settings are still data protection compliant!
* Compatible with Google Tag Manager.
* **NO other plugin needed** to use the Google Analytics code on the website. This can be integrated directly by this plugin.
* Site visitors can deactivate the Google Analytics tracking for themselves and also activate it again afterward.
* Link text for the activation and deactivation link can be changed individually.
* A popup can be set up, which appears after clicking the link.
* The UA-Code or GA4-Code can be entered manually or read out automatically by a Google Analytics tracking plugin (see compatible plugins).
* HTML5 Local Storage Fallback: If a user deletes his cookies, the opt-out cookie can be restored if the local storage was not additionally deleted by the browser.
* WordPress Multisite compatible.
* Fully compatible with Gutenberg Editor.
* Compatible with: [Advanced Custom Fields](https://de.wordpress.org/plugins/advanced-custom-fields/), [WPML](https://wpml.org/?utm_source=wordpressorg&utm_medium=opt-out-for-google-analytics), [Polylang](https://de.wordpress.org/plugins/polylang/) and [Loco Translate](https://de.wordpress.org/plugins/loco-translate/)
* Also works on the smartphone, provided that the browser supports cookies.
* Visual customizations through custom CSS codes that are loaded only together with the shortcode (optimized loading time).
* Translation for DE and EN available.
* Full support for PHP 8.1

**Regularly check whether the settings are still data protection compliant!**

Ever edited the privacy policy page and accidentally deleted the opt-out shortcode? Recently deleted the plugin for Google Analytics tracking, then reinstalled it and forgot to re-enable IP anonymization?

To ensure the highest security, the plugin regularly checks the settings. Should a setting no longer fit, then an error message appears in the WP Admin (Backend / Dashboad) or you will receive an email.
You can freely choose the frequency of the check. The following intervals are available: daily, weekly or monthly.

The following settings are checked:

* Opt-Out function enabled
* Opt-Out shortcode present on the page
* Page with the shortcode publicly available (published and no password protection)
* Valid UA-Code found (only the formatting is checked)
* IP anonymization enabled (Works only in conjunction with a compatible plugin or the tracking code is stored in the plugin)

**Integrated compatibility with the following plugins**

It is not a requirement to use the listed plugins! The Google Analytics Opt-Out Plugin is also compatible with other plugins and can be used even if the Google Analytics code itself was inserted.
With integrated compatibility, we make work easier because the current UA-Code is automatically read out and kept up to date. This means that it does not have to be corrected manually.

* [MonsterInsights Pro](https://www.monsterinsights.com/?utm_source=wordpressorg&utm_medium=opt-out-for-google-analytics)
* [MonsterInsights – Google Analytics Dashboard for WordPress (Website Stats Made Easy)](https://wordpress.org/plugins/google-analytics-for-wordpress/)
* [ExactMetrics – Google Analytics Dashboard for WordPress (Website Stats Plugin)](https://wordpress.org/plugins/google-analytics-dashboard-for-wp/)
* [Analytify – Google Analytics Dashboard Plugin For WordPress](https://wordpress.org/plugins/wp-analytify/)
* [GA Google Analytics](https://wordpress.org/plugins/ga-google-analytics/)
* [Site Kit by Google – Analytics, Search Console, AdSense, Speed](https://wordpress.org/plugins/google-site-kit/)

**AUTOMATICALLY current privacy policy**

Keeping track of all the GDPR legislative changes is not easy. Especially not next to the core business. That's why we offer you a data protection generator with our partner [easyRechtssicher](https://schweizer.solutions/datenschutzgenerator).
The privacy policy is created ONCE and automatically kept up to date in WordPress itself. No more filling out forms again and copying and pasting privacy statements onto the page, it's completely automated.
More info here: [https://schweizer.solutions/datenschutzgenerator](https://schweizer.solutions/datenschutzgenerator)

**Do you like our plugin?**
It motivates us a lot to keep working on our free plugins if you leave us a [positive review](https://wordpress.org/support/plugin/opt-out-for-google-analytics/reviews/#new-post).

**Coded with love by** [Schweizer Solutions GmbH](https://www.schweizersolutions.com/?utm_source=wordpressorg&utm_medium=plugin&utm_campaign=readme)

*This plugin is not from Google and is not supported by Google in any way. Google Analytics is a trademark of Google LLC.*

== Installation ==

**Installation via Wordpress**

1. Go to the Dashboard: `Plugins > Install`
2. Search for: `Opt-Out for Google Analytics`
3. click there on the gray button 'Install
4. Activate the plugin

**Manual installation**

1. Download the zip file here and unpack the folder
2. Upload the directory `opt-out-for-google-analytics` into the `/wp-content/plugins/` directory of your WordPress installation
3. Activate the plugin

**Configuration**

1. Go to the Dashboard: 'Settings > GA Opt-Out
2. Activate the plugin, if not activated
3. Select the UA-Code or enter it into the field
4. Save changes, done!

**Note on UA-Code & GA4-Code:**

If you have entered the Google Analytics tracking code manually, e.g. with a WordPress theme, then you must enter the tracking code in the input field.
If you have activated one of the compatible Google Analytics plugins, then this item is also selectable. This will automatically read the current tracking code from this plugin, and you do not have to enter it in the input field.

== Frequently Asked Questions ==

= Why should I use this plugin? =

The Data Protection Regulation (DSGVO, EU-DSGVO, GDPR) stipulates that a website visitor must have the option to object to the collection of data by Google Analytics.
Until now, this was only possible via browser addon, or complicated JavaScript code integrations on the own website.
With this plugin, this is very easy and the user also has the option to undo the objection.

= Is it the same opt-out code as from e-recht24.de? =

Yes, because we also comply with Google's specifications. More information about the guidelines:  https://developers.google.com/analytics/devguides/collection/analyticsjs/user-opt-out

= I have manually inserted the Google Analytics tracking code via the theme / a plugin. Can I still use this plugin? =

This plugin can also be used if the tracking code was inserted manually at the theme or with the help of a plugin.

= Does the privacy policy need to be adapted? AUTOMATICALLY update? =

Yes, it is recommended to offer the opt-out for Google Analytics in the privacy policy.

Keeping track of all the GDPR legislative changes is not easy. Especially not next to your core business. That's why we offer you a data protection generator with our partner [easyRechtssicher](https://schweizer.solutions/datenschutzgenerator).
The privacy policy is created ONCE and automatically kept up to date in WordPress itself. No more filling out forms again and copying and pasting privacy statements onto the site, it runs completely automated.
More info here: [https://schweizer.solutions/datenschutzgenerator](https://schweizer.solutions/datenschutzgenerator)

= How long does the unsubscribe remain valid? =

If the site visitor clicks on the opt-out link to disable Google Analytics for him, then a cookie is set. With this cookie, the system knows that this site visitor should not be tracked on the website.

This cookie is only valid in the browser with which the site visitor was on the website and clicked on the opt-out link. If the visitor uses a different browser, he would have to click on the link again.

If the site visitor clears his browser data (cookies, download history, etc.), the cookie is also deleted and the site visitor would have to click on the opt-out link again.

= How do I deactivate the plugin? =

You can deactivate the status of the plugin under "Settings > GA Opt-Out", there you only have to uncheck "Activate opt-out function".

You can deactivate the whole plugin under "Plugins > Installed Plugins" by clicking on "Deactivate" for the "Opt-Out for Google Analytics" Plugin.

After deactivating the plugin, you can remove it completely by clicking on "Delete".

= Where can I use the shortcode? =

You can use the shortcode `[gaoo_optout]` in posts, pages and widgets (text widget).

= Can I as a developer intervene in the plugin? =

Yes, you can. For this purpose we have included appropriate filters and action hooks.

`// Before the shortcode is resolved
add_action( 'gaoo_before_shortcode', 'my_before_shortcode', 10, 2);

function my_before_shortcode( $tracking_code, $current_status ) {
	// $tracking_code - The current used tracking code "UA-XXXXX-Y" OR "G-XXXXXXXXXX"
	// $current_status - The current status of the page visitor: activate or deactivate
}

// After the shortcode is resolved
add_action( 'gaoo_after_shortcode', 'my_after_shortcode', 10, 2);

function my_after_shortcode( $tracking_code, $current_status ) {
	// $tracking_code - The current used tracking code "UA-XXXXX-Y" OR "G-XXXXXXXXXX"
	// $current_status - The current status of the page visitor: activate or deactivate
}

// Before the JS code, to disable GA, is issued
add_action( 'gaoo_before_head_script', 'my_before_script', 10, 1);

function my_before_script( $tracking_code ) {
	// $tracking_code - The current used tracking code "UA-XXXXX-Y" OR "G-XXXXXXXXXX"
}

// After the JS code, to disable GA, is issued
add_action( 'gaoo_after_head_script', 'my_after_script', 10, 1);

function my_after_script( $tracking_code ) {
	// $tracking_code - The current used tracking code "UA-XXXXX-Y" OR "G-XXXXXXXXXX"
}

// The UA-Code used
add_filter( 'gaoo_get_ua_code', 'my_ga_tracking_code', 10, 2 );

function my_ga_tracking_code( $tracking_code, $ga_plugin ) {
	// $tracking_code - The current used tracking code "UA-XXXXX-Y" OR "G-XXXXXXXXXX"
	// $ga_plugin - Selected source for the tracking code
}

// Whether the page should be reloaded after the click
add_filter( 'gaoo_force_reload', 'my_force_reload', 10, 1);

function my_force_reload( $force ) {
	// $force - "true" = force reload; "false" = do not reload
}
`

= My theme does not resolve shortcodes. How can I use the function via PHP? =

It happens that some self-developed themes do not resolve shortcodes and the plugin does not work.
To execute the shortcode anyway, you have to use this code in the theme, at the desired position:

`echo do_shortcode('[ga_optout]');`

= It is displayed that the settings are not correct, although I have changed them! =

If the settings have been changed, e.g. in a compatible Google Analytics tracking plugin, then this change will only be noticed during the autom. check (weekly).

It is possible to perform the check beforehand. To do this, the "Save changes" button would have to be clicked under "Settings > GA Opt-Out".

This will read the new settings and save them for a week until the next automatic check.

= How can I react to the clicks, e.g. with another plugin? =

The JavaScript event `gaoptout` is fired on the `window` object, which can be reacted to.

If the page visitor clicks on the link to perform an opt-out, then a `false` is passed as the value. If the visitor performs an opt-in, then a `true` is passed.

Example code:
`jQuery(window).on('gaoptout', function (e) { console.log(e.detail); });`

= How do I change the appearance of the link? =

You have the possibility to change the appearance of the link via CSS in the settings of the plugin. For this purpose, the following CSS classes are available:

**The link itself:**
`#gaoo-link { ... }`

**The link if the page visitor has disagreed with the tracking:**
`.gaoo-link-activate { ... }`

**The link if the page visitor has NOT disagreed with the tracking:**
`.gaoo-link-deactivate { ... }`

= How can I send the status messages to multiple email addresses? =

You can enter several recipient addresses, separated by a comma, into the input field for the e-mail, which should receive the status message.
Example: `webmaster@example.org,admin@example.org,dev@example.org`

= I do not receive emails about the status check? =

The status check runs in the set interval and only sends e-mails if at least one status is set to red.
If you still do not receive any e-mails, it can have the following causes:

- The e-mail has landed in your spam folder. Please check this before and save the sender address in your contact book, this will prevent the emails from ending up in spam.
- You have deactivated the cronjob of WordPress in the wp-config.php. Please make sure that the server-side cronjob works correctly.
- You are using a caching plugin on the installation. If there is no server-side cronjob set up, WordPress will check if there are tasks pending on every page load. If the page is called from the cache, then this is no longer done and no cronjob can be triggered.
- You have too few page visitors who call your website in too large time intervals. Thus the cronjob of WordPress is not triggered.

Our recommendation is therefore:

- Set up a server-side cronjob
- Save the sender address in your contact book

= Use Google Tag Manager =

The opt-out cookie is set according to Google's specifications. Thus, the GTM (Google Tag Manager) should not need to be adjusted.
However, if the Google Analytics code is not loaded at all, the GTM must check whether the cookie is set or whether the value in the "HTML5 Local Storage" is set accordingly.
On this basis, it can be decided in the GTM whether the code should be loaded or not.

If no entry or cookie is present, then no opt-out has taken place. This is also the case if the value "false" is returned.
The opt-out has only taken place if the value "true" is returned.

Specific cookie, with the corresponding tracking code: ga-disable-UA-XXXXX-YY or ga-disable-G-XXXXXXXXX
Generic Cookie: ga-opt-out

Specific entry in the HTML5 Local Storage:  ga-disable-UA-XXXXX-YY or ga-disable-G-XXXXXXXXX
Generic entry in the HTML5 Local Storage: ga-opt-out

= Liability / Disclaimer =

The use of this plugin is at your own risk. The website operator must be able to ensure the functionality of the plugin itself.
To do this, it must be checked, among other things, whether after clicking on the link, a cookie in this format was set: ga-disable-UA-XXXXXXXX-YY
Supporting, for the Google Tag Manager, another cookie with the name "ga-opt-out" is set.

== Screenshots ==

1. Settings overview of the plugin (Dashboard: Settings > GA Opt-Out).
2. Shortcode inserted in the text editor
3. Activation / deactivation link with popup, on the page
4. Example of a status email
5. Block in Gutenberg editor
6. Dashboard widget

== Changelog ==

= 2.3 =
* Fixed: Analytify - Detection of whether IP anonymization is activated
* Updated: CSStidy library to v2.1.0
* Updated: Support for WordPress 6.5
* Updated: readme.txt

= 2.2 =
* Fix: Paste tracking code in manual mode will now read GA4 id from JavaScript code and automatically insert it into input field, if it is empty.
* Tweaks: Optimized code and UX.
* Updated: Support for WordPress 6.2
* Updated: Support for PHP 8.1

= 2.1 =
* Updated: readme.txt
* Updated: Support for WordPress 6.0.2
* Updated: CSStidy library to v2.0.0
* Updated: Integration of all supported GA tracking plugins

= 2.0 =
* Added: Support for Google Analytics 4 (GA4)
* Added: MonsterInsights GA4 support
* Added: ExactMetrics GA4 support
* Added: Analytify GA4 support
* Added: GA Google Analytics GA4 support
* Updated: Support for WordPress 5.9
* Tweaks: Several code tweaks & cleanup

= 1.9 =
* Updated: Support for WordPress 5.8
* Updated: Compatibility of all supported Google Analaytics tracking plugins.
* Fixed: System directory separator was not used in constants.
* Changed: Increase version in dependencies check on plugin activation.

= 1.8 =
* Added: Dashboard widget with the current status of the website. Can be disabled in the plugin settings.
* Added: Remove languages files of this plugin after uninstall, if the option "Keep data after uninstallation" is not enabled.
* Changed: Code for the translation and removed the language files from plugin. Use the native translate.wordpress.org service for the translations.
* Updated: Names of the supported Google Analytics tracking plugins.

= 1.7 =
* Added: Option in settings to keep data after uninstallation.
* Added: Close button to promo popup for better usability.
* Fixed: After deleting the plugin, the data was not deleted.

= 1.6 =
* Updated: Support for PHP 8
* Updated: Support for WordPress 5.7
* Updated: Compatibility to all supported analytics plugins
* Improved: Gutenberg Block support for the Opt-Out Block
* Improved: Some links, design and a better mobile usability with the plugin settings page.
* Improved: PHP code and security
* Updated: CSSTidy from 1.7.0 to 1.7.3
* Changed: If the promotion box is hidden for ever, it will take effect for the whole installation and not per user.
* Fixed: In some cases the plugin text was not displayed in the right language from the user
* Fixed: Unexpected changes in some cases in the .htaccess file (thanks to @danielrufde)

= 1.5 =
* Added: Support for Site Kit by Google
* Added: Output the current UA-Code in status check
* Added: Send status mail to WordPress admin mail (auto-sync)
* Updated: Compatibility to new version of "Google Analytics Dashboard for WP by ExactMetrics (formerly GADWP)", with backward support for older versions
* Updated: Compatibility to new version of "Google Analytics Dashboard Plugin for WordPress by Analytify", with backward support for older versions
* Fixed: German translations

= 1.4 =
* Added: Support for Gutenberg
* Added: Support for ACF Plugin, to check if the shortcode exist in the fields
* Added: Send e-mail if the status check has detected an error.
* Added: The intervall for the status check can now be changed.
* Added: Add  Google Analytics to the whole website if the option "UA-Code" is set to manual.
* Added: Custom JavaScript event on window object to allow other plugins to react if a user clicks on the link.
* Added: User can add custom css in the settings, which is only loaded if the shortcode is used.
* Fixed: Used wrong version variable to compare if WordPress has the new GDPR features.
* Fixed: Only redirect after activation if plugin is activated single and not in bulk
* Fixed: apply_filters for the link text did not affect on initinal page load.
* Updated: Changed the link to the new data processing agreement for Google Analytics page.
* Improved: Edit link from the "Privacy Policy Page" select has now the link to the current selected page, to open
* Improved: Some usability features & security fixes
* Improved: Move json data generation into a static function, so developers can enqueue scripts on every site they want.

= 1.3 =
* Added: Support for WordPress 4.9.6 GDPR - Icons for the shortcode on the privacy page & sync. the page id for the shortcode.
* Added: Check if the page with the shortcode is accessibile
* Added: MonsterInsights Pro support
* Added: WPML & Polylang compatibility
* Added: HTML5 local storage fallback. Cookies deleted, but the local storage not, restore cookie.
* Added: Possibility to disable the notice on dashboard, the settings aren't right.
* Added: Possibility to force page reload, after link click.
* Added: "Google Tag Manager" as an option.
* Improved Google Tag Manager support: Set generic cookie named "ga-opt-out" if user clicked opt-out. Allows yout to copy and paste the code in GTM, no need to change the UA-Code.
* Fix: PHP error generated on older PHP (<5.3) versions
* Several code and usability optimazation

= 1.2 =
* Fixed: Activation immediately after installation generated a warning message
* Changed: The message, if the settings aren't data protection compliant, is now only visible to the admins and super admins
* Added: Backward compatibility for older "Google Analytics Dashboard for WP (GADWP)" versions
* Added: Some status checks are now linked to the specific page. You are now one click away to enable the ip anonymization!

= 1.1 =
* Removed "Google Analytics by Yoast" integration
* Fixed "Google Analytics Dashboard for WP (GADWP)" integration
* Added "GA Google Analytics" integration
* Added "Google Analytics for WordPress by MonsterInsights" integration
* Added validation check for the UA code
* Added monitoring feature: Check weekly if the settings are data protection compliant. If not, a message appears in WP admin.
* Several code, security and usability optimazation

= 1.0 =
* 15. Februar 2016
* Initial Release