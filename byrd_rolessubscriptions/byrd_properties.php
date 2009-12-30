<?php
/**
 * @subpackage	: Wordpress
 * @author		: Jonathon Byrd
 * @copyright	: All Rights Reserved, Byrd Inc. 2009
 * @link		: http://www.jonathonbyrd.com
 * 
 * Jonathon Byrd is a freelance developer for hire. Jonathon has owned many companies and
 * understands the importance of website credibility. Contact Jonathon Today.
 * 
 *


Think of this area as the storage area. When you create an input element on the config page, it will 
theoretically be saved here. Then these properties will be called and prepared for the other pages

*/
class ByrdRolesConfigurations {
	
	//notifications
	public $_mail_signup = 
'<h3>Thank you for your Subscription to Jonathonbyrd.com</h3>
<p>We\'ve created this account for you:</p>
<p>
Username : _user_name_<BR/>
Password : _password_<BR/>
Email : _payer_email_<BR/>
</p>

<p>You may change all these credentials once you log into the system, except the email address.
The email is used to tie your account to your paypal subscription.</p>

<p>Here\'s the link to login to the Members Only area, just scroll to the bottom of any page and use the login form.
Once you\'ve completed this step, the login will be hidden and your Members Directory will be showing. <a href="http://www.jonathonbyrd.com/">http://www.jonathonbyrd.com/</a></p>';

	public $_mail_renewed = 
'<h3>Subscription Renewal Notice</h3>
<p>Account Renewed:</p>
<p>
Email : _payer_email_<BR/>
</p>

<p>I will do my best to continue to make this service better, if you want to take a minute and reply to this
email with questions, comments or even suggestions, please do. I will definitely read it and get back to you.</p>

<p><a href="http://www.jonathonbyrd.com/">http://www.jonathonbyrd.com/</a></p>';
	
	public $_mail_expired = 
'<h3>Oh No! You let your account expire.</h3>
<p>The following account has been restricted:</p>
<p>
Email : _payer_email_<BR/>
</p>

<p>We will never remove your data from our database, however, when you let your account expire we\'ll no longer
be keeping your reports up to date. If this was an accident, hurry and reinstate your account so that we can begin recording 
data for you again.</p>

<p>If you have any questions or concerns, please reply to this email or visit <a href="http://www.jonathonbyrd.com/">http://www.jonathonbyrd.com/</a></p>';

	public $_mail_canceled = 
'<h3>Sorry to see you go!</h3>
<p>This account has been canceled:</p>
<p>
Email : _payer_email_<BR/>
</p>

<p>Please reply to this email message and let us know why you decided to cancel your subscription.
If I can work to make this service any better, I will!</p>

<p>Visit us anytime, <a href="http://www.jonathonbyrd.com/">http://www.jonathonbyrd.com/</a></p>';
	
	public $member_directory = null;
	
	//paypal
	public $business = null;
	public $pp_sandbox = false;
	public $pdttoken = null;
	
	//paypage
	public $submit_button_text = 'Buy Now';
	public $page_style = null;
	public $image_url = null;
	public $cpp_header_image = null;
	public $cpp_headerback_color = null;
	public $cpp_headerborder_color = null;
	public $cpp_payflow_color = null;
	public $cs = null;
	public $lc = null;
	public $cn = null;
	public $no_shipping = null;
	public $_return = null;			//PDT confirmation page
	public $rm = 2;
	public $cbt = 'View Subscription Confirmation';	//return to merchant text
	public $cancel_return = null;	//No Dont Go!!
	public $no_note = null;			//Do not prompt payers to include a note with their payments. Allowable values for Subscribe buttons:
	public $notify_url = null;		//ipn script
	
	//subscription info
	public $item_name = null;
	public $item_description = null;
	public $item_number = 'Sub-one';
	public $currency_code = 'USD';
	public $a1 = null; 		//Trial period 1 price. For a free trial period, specify 0.
	public $p1 = null; 		//Trial period 1 duration. Required if you specify a1. Specify an integer value in the allowable range for the units of duration that you specify with t1.
	public $t1 = null;		//Trial period 1 units of duration. Required if you specify a1. Allowable values:
	public $a2 = null;		//Trial period 2 price. Can be specified only if you also specify a1.
	public $p2 = null;		//Trial period 2 duration. Required if you specify a2. Specify an integer value in the allowable range for the units of duration that you specify with t2.
	public $t2 = null;		//Trial period 2 units of duration. Allowable values:
	public $a3 = null;		//Regular subscription price.
	public $p3 = '1';		//Subscription duration. Specify an integer value in the allowable range for the units of duration that you specify with t3.
	public $t3 = 'M';		//Regular subscription units of duration. Allowable values:
	public $src = null;		//Recurring payments. Subscription payments recur unless subscribers cancel their subscriptions before the end of the current billing cycle or you limit the number of times that payments recur with the value that you specify for srt.
	public $srt = null;		//Recurring times. Number of times that subscription payments recur. Specify an integer above 1. Valid only if you specify src="1".
	public $sra = true;		//Reattempt on failure. If a recurring payment fails, PayPal attempts to collect the payment two more times before canceling the subscription.
	public $custom = null;	//User-defined field which will be passed through the system and returned in your merchant payment notification email. This field will not be shown to your subscribers.
	public $invoice = null;	//User-defined field which must be unique with each subscription. The invoice number will be shown to subscribers with the other details of their transactions
	public $modify = null;	//Modification behavior. Allowable values:
	public $usr_manage = null;	//Set to 1 to have PayPal generate usernames and initial passwords for subscribers.
	
	
}
?>