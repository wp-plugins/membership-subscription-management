=== Plugin Name ===
Contributors: Jonathon Byrd
Donate link: http://www.jonathonbyrd.com/
Tags: membership, members, subscription, paypal, subscriptions, users, roles
Requires at least: 2.0
Tested up to: 3.0
Stable tag: 1.1.0

Plugin Manages user subscriptions by creating and deleting user accounts while managing their payments.

== Description ==

We've Beta testd this plugin for the first two weeks of January 2010. We've figured out a lot of the bugs and are now releasing this next stable revision.

This plugin is designed to allow users to select a Subscription, then be directed to paypal to setup a subscription plan. Once they signup, there account will be automatically created as a subscriber and they will receive a welcome email with all of the information.

Every renewal they will receive a thank you email notification.

If their subscription expires their account will be deleted and they will receive "oops it expired" email notification. Lastly, if they choose to terminate their subscription, their account will be deleted and they will receive a "account canceled" email notification.

I've made everything that I could think of customizable, allowing you to setup multiple trial periods and the whole nine yards. This plugin is a plug and play system requiring NO modifications to your paypal account. I am using IPN overriding and return url overriding so that you will not need to change your current paypal settings. However, updating them for this script will not hurt you.

I have integrated a full support forum into the configurations page, along with detailed installation instructions and instructions for every option within the configuration page.

If you so decide that you want to modify the code in any way, I have also commented the code to make it easy for you. Native support does not include saving IPN data to the database, however, I've built the complete database integration into the script, and all you need to do is create the tables and uncomment the db store function.

THIS SCRIPT ONLY ALLOWS FOR ONE SUBSCRIPTION TYPE. This is my first attempt, I built this over the weekend. I will be adding many features and functions as time passes, so please be patient. Please rate the script itself and not the lack of features.

YOU WILL NEED ANOTHER PLUGIN, you will need to install a plugin that restricts user access to posts and categories. This plugin only manages the users.

== Installation ==

**Installation**
This plugin does one thing and one thing only, it is designed to create user accounts for new subscribers and delete user accounts of expired subscribers. This plugin does not manage  access rights to anypages or posts.
	
You will need to install a Membership Plugin designed to restrict users access to posts. Look here for a plugin: Wordpress Members Only Plugins. I've installed Member Access, but this is purely a preference.
	
You shouldn't need to modify any of your paypal account settings in order for this system to work. I've provided every option that I could find for you to configure and override your default account settings, right from this configurations area. I've also preset many default settings so that this plugin will run right out of the box.
	
1. Upload `byrd_rolessubscriptions` folder to the `/wp-content/plugins/` directory
1. Activate the plugin through the 'Plugins' menu in WordPress
1. Set the configurations for your Subscription in the wp admin
1. Insert `&lt;!-- byrd_subscription() --&gt;` into any Page.
1. Insert `&lt;!-- byrd_login() --&gt;` into any Page.

**TIP:** This plugin cannot be installed via the wordpress automatic installer because wordpress is placing the plugin inside of another folder which is causing the plugin to not display. If you don't have the ability to ftp into your site and get this installed properly, just send me an email and I'll install it for you.
**TIP:** If you have problems getting the email notifications to save, check that the file permissions are set to 755.</p>

**Overview**
Thank you for downloading the Membership Subscription Manager from JonathonByrd.com. This plugin is not designed to be fully featured. The goal with this plugin was to get a useable Membership Subscription Manager up and running with all of the features necessary to a healthy membership website. I've only put a couple of days into this plugin but I'm offering it for free to the Wordpress Community.
	
I will be continuing to develop a lot of features into this plugin over the next week and I'll be selling it as a Pro version on my site. I would appreciate you buying me a beer with a small donation if you begin to make money off of this plugin. If you need assistance with traffic and conversion rates, visit my website, as all of the tools I'm providing are geared to helping you make a profit.
	

**Features Walkthrough**

1. **Subscription Widget
There are two ways to paste your subscription information into your pages or posts. The first is the PHP method. I suggest that you only use this if you are comfortable with PHP coding.

&lt;?php byrd_subscription(); ?&gt;

The second method is to paste this HTML comment directly into the html editor in the wordpress admin area. Simply edit your page or post, then change the editor to HTML and paste this code.

&lt;!-- byrd_subscription() --&gt;
		
1. **Login Widget**
The same rules apply to the two following snippets. The first is for php developers, the second is for the wordpress editable pages.

&lt;?php byrd_login(); ?&gt;
&lt;!-- byrd_login() --&gt;
		
1. **Confirmation Page**
The confirmation page will wrap itself with your template and show as a receipt to your new Member. No adjustments are needed for this page.
		
1. **Cancel Return Page**
If the user cancels the payment process before completing the transaction, they will be redirected to this page.
		
1. **Notification Emails**
These email notifications are just simple html/php files that I've saved in the plugins directory. You have your choice of opening those files directly, or using the tiny text areas on the Notifications tab.
		
This email system is super simple to use. I've provided you with a list of variables that are received from the paypal transaction, you can paste any of these variables into the Notifications Emails and the system will automatically replace them with their value.
		
1. **Completely Managed Memberships**
The system is designed to create new user accounts, using the persons paypal email and real name. The system will auto generate a password for the user, so you should provide your members with the ability to change their passwords so that they will remember how to login.
		* Signup
		A new account is created and an email notification is emailed.
		* Renewed
		An email notification of the accepted payment is emailed.
		* Expired
		The users account is deleted and an email notification is emailed.
		* Canceled
		The users account is deleted and an email notification is emailed.

== Frequently Asked Questions ==

= When I hit "update options" in the admin area the options are not saving. =

You're using Internet Explorer Eight. I have no idea why IE8 is causing this plugin to not save the data, so try using Chrome, Firefox or Safari.

= Can I manage more then one subscription? =

No, I'll be working on a paid version that will allow you to manage as many subscriptions as you would like.

= Can I restrict access to posts, pages or categories? =

No, you will need to download a different plugin that is designed to restrict access to areas of your site.
I'll be working on a paid version that will allow you to restrict access to all the pages, posts and categories that you want depending on the subscription levels the user pays for.

= How can I see who has purchased a subscription? =

A user account with No Roles will be created upon the users signup, you will be able to open the wp users page and see all of your subscribing members.
You will also receive an email from paypal and a copy of the email sent to the user upon signup.

= Can I edit the four different email notifications? =

Yes, I provide a very complex configurations page that allows you to manage almost every corner of this plugin.

= Do I need to change my paypal settings? =

You shouldn't have to. I've provided overrides that will tell paypal what to do when a user subscribes to your service.

= Do you provide ongoing support? =

Not only am I available through email or on my website, but I've also integrated a support forum into the configurations page so that you can ask questions directly from your wp-admin area.

= Can I buy you a beer? =

Absolutely, this is my first plugin for wordpress and I've tried to provide you with a much needed solution that all of the other companies are charging for.





== Screenshots ==

1. I've screenshotted all of the pages and how they display on my website. I hope this helps.
2. Page
3. Page
4. Page
5. Page
6. Page
7. Page
8. Page

== Changelog ==

= 1.0 =
* Let there be Light!

= 1.0.1 =
User input has suggested the following changes

1. Changed the getSubscriptions code to byrd_subscription(); instead of the complicated code that was first posted. Although the first code is still valid.
1. Changed the original code for calling the login for to byrd_login(); the old code is still valid.
1. Added support to change the submit buttons text.
1. Added ini_set memory limit to ensure that enough memory is set aside for the support page to run properly.
1. Added subscription level support so that you may change the default role that a user subscribes to.

= 1.1.0 =
There's been a lot of user input and a lot of suggestions, I've changed the following features.

1. Added support for html tag &lt;!-- byrd_subscription() --&gt; to make integration with your posts easier
1. Added support for html tag &lt;!-- byrd_login() --&gt; to make integration with your posts easier
1. If you're installation resides in a root directory the program will still be able to locate your wp-config files.
1. The IPN has been adjusted to double check that a user account has been created.
1. The Support Forum has been upgraded and works.
1. Provided support for the Windows IIS platform.
1. The return page URL has been fixed so that users will properly return to your website.
1. Link in Wp Menu has been changed to Role Subscriptions and now resides under the USERS tab.


