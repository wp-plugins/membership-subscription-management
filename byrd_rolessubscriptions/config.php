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
 */ 

?><style>
div.byrdtabs {width:100%;clear:both;margin:20px 0;position:relative;float:left;}
.byrdtabs ul {width:100%;position:relative;float:left;margin:0 0 0 40px !important;}
.byrdtabs ul li {position:relative;float:left;}
.byrdtabs ul li a {width:130px;cursor:pointer;}
.paypalinfo {border-bottom:1px solid #eee;font-size:10px;padding-bottom:15px;}
div table label {font-weight:bold;}
textarea {width:95%;height:100px;}
textarea.large {height:400px;}
</style>

<div class="byrdtabs"> 
  <ul id="sidemenu">
    <li><a id="subscriptionlink" class="current">Subscription</a></li>
    <li><a id="configurationslink">Configurations</a></li>
    <li><a id="notificationslink">Notifications</a></li>
    <li><a id="installationlink" >Documentation</a></li>
    <li><a id="jonathonbyrdlink" >Support Forum</a></li>
  </ul>
</div>
	
<div id="byrdsubscription">
	<h2>Subscription Configurations</h2>
	<p>My first attempt at anything, I always like to go as simple as possible in order to get the idea out the door.
	This is that attempt. I'm confident that this has bugs and that you'll be needing to contact me to get them fixed.
	That's also why I'm posting this Membership Subscription Plugin with only the ability to manage a single 
	subscription type.</p>
	<p>If you need more from a Membership Subscription Manager, you should consider paying the $10 dollars for the Pro version
	of this software, located at <a href="http://www.jonathonbyrd.com">jonathonbyrd.com</a></p>
	<table>
		<tr>
			<td width="200"><label for="item_name">Subscription Title</label></td>
			<td><input id="item_name" name="item_name" type="text" size="50" value="<?php echo $this->item_name; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			Description of item being sold (maximum 127 characters). If you are collecting aggregate payments, this can include a summary of all items purchased, tracking numbers, or generic terms such as "subscription." If omitted, customer will see a field in which they have the option of entering an Item Name
			</td>
		</tr>
		<tr>
			<td width="200"><label for="item_number">Item Number</label></td>
			<td><input id="item_number" name="item_number" type="text" size="20" value="<?php echo $this->item_number; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			This number is not used by our system, set it to anything that you would like.
			</td>
		</tr>
		<tr>
			<td><label for="item_description">Description</label></td>
			<td><textarea id="item_description" name="item_description"><?php echo $this->item_description; ?></textarea></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			</td>
		</tr>
		<tr>
			<td><label for="a3">Price</label></td>
			<td><input id="a3" name="a3" type="text" size="20" value="<?php echo $this->a3; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			How much are you going to charge?
			</td>
		</tr>
		<tr>
			<td width="200"><label for="submit_button_text">Submit Button</label></td>
			<td><input id="submit_button_text" name="submit_button_text" type="text" size="20" value="<?php echo $this->submit_button_text; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			This number is not used by our system, set it to anything that you would like.
			</td>
		</tr>
		<tr>
			<td><label for="p3">Duration</label></td>
			<td>
			<input id="p3" name="p3" type="text" size="20" value="<?php echo $this->p3; ?>" />
			<select id="t3" name="t3">
				<option <?php if ($this->t3 == 'D')echo 'selected'; ?>>D</option>
				<option <?php if ($this->t3 == 'W')echo 'selected'; ?>>W</option>
				<option <?php if ($this->t3 == 'M')echo 'selected'; ?>>M</option>
				<option <?php if ($this->t3 == 'Y')echo 'selected'; ?>>Y</option>
				
			</select>
			</td>
			</tr><tr><td colspan="2" class="paypalinfo">
			Subscription duration. Specify an integer value in the allowable range for the units of duration that you specify with t3.
			Regular subscription units of duration. Allowable values:
			<BR/>D - for days; allowable range for p3 is 1 to 90
			<BR/>W - for weeks; allowable range for p3 is 1 to 52
			<BR/>M - for months; allowable range for p3 is 1 to 24
			<BR/>Y - for years; allowable range for p3 is 1 to 5
			</td>
		</tr>
		<tr>
			<td><label for="currency_code">Currency Code</label></td>
			<td><select id="currency_code" name="currency_code">
				<option value="AUD" <?php $this->select($this->currency_code, 'AUD'); ?>>Australian Dollar</option>
				<option value="BRL" <?php $this->select($this->currency_code, 'BRL'); ?>>Brazilian Real</option>
				<option value="CAD" <?php $this->select($this->currency_code, 'CAD'); ?>>Canadian Dollar</option>
				<option value="CZK" <?php $this->select($this->currency_code, 'CZK'); ?>>Czech Koruna</option>
				<option value="DKK" <?php $this->select($this->currency_code, 'DKK'); ?>>Danish Krone</option>
				<option value="EUR" <?php $this->select($this->currency_code, 'EUR'); ?>>Euro</option>
				<option value="HKD" <?php $this->select($this->currency_code, 'HKD'); ?>>Hong Kong Dollar</option>
				<option value="HUF" <?php $this->select($this->currency_code, 'HUF'); ?>>Hungarian Forint</option>
				<option value="ILS" <?php $this->select($this->currency_code, 'ILS'); ?>>Israeli New Sheqel</option>
				<option value="JPY" <?php $this->select($this->currency_code, 'JPY'); ?>>Japanese Yen</option>
				<option value="MYR" <?php $this->select($this->currency_code, 'MYR'); ?>>Malaysian Ringgit</option>
				<option value="MXN" <?php $this->select($this->currency_code, 'MXN'); ?>>Mexican Peso</option>
				<option value="NOK" <?php $this->select($this->currency_code, 'NOK'); ?>>Norwegian Krone</option>
				<option value="NZD" <?php $this->select($this->currency_code, 'NZD'); ?>>New Zealand Dollar</option>
				<option value="PHP" <?php $this->select($this->currency_code, 'PHP'); ?>>Philippine Peso</option>
				<option value="PLN" <?php $this->select($this->currency_code, 'PLN'); ?>>Polish Zloty</option>
				<option value="GBP" <?php $this->select($this->currency_code, 'GBP'); ?>>Pound Sterling</option>
				<option value="SGD" <?php $this->select($this->currency_code, 'SGD'); ?>>Singapore Dollar</option>
				<option value="SEK" <?php $this->select($this->currency_code, 'SEK'); ?>>Swedish Krona</option>
				<option value="CHF" <?php $this->select($this->currency_code, 'CHF'); ?>>Swiss Franc</option>
				<option value="TWD" <?php $this->select($this->currency_code, 'TWD'); ?>>Taiwan New Dollar</option>
				<option value="THB" <?php $this->select($this->currency_code, 'THB'); ?>>Thai Baht</option>
				<option value="USD" <?php $this->select($this->currency_code, 'USD'); ?>>U.S. Dollar</option>
				
			</select>
			
			</td>
			</tr><tr><td colspan="2" class="paypalinfo">
			The currency of prices for trial periods and the subscription. The default is USD.
			<BR/>For allowable values, see Currency Codes.
			</td>
		</tr>
		
		<tr>
			<td><label for="a1">Trial period 1 price</label></td>
			<td><input id="a1" name="a1" type="text" size="30" value="<?php echo $this->a1; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">Trial period 1 price. For a free trial period, specify 0.</td>
		</tr>
		<tr>
			<td><label for="p1">Trial period 1 duration</label></td>
			<td><input id="p1" name="p1" type="text" size="20" value="<?php echo $this->p1; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">Trial period 1 duration. Required if you specify a1. Specify an integer value in the allowable range for the units of duration that you specify with t1.</td>
		</tr>
		<tr>
			<td><label for="t1">Trial period 1 units of duration</label></td>
			<td><select id="t1" name="t1">
				<option <?php if ($this->t1 == 'D')echo 'selected'; ?>>D</option>
				<option <?php if ($this->t1 == 'W')echo 'selected'; ?>>W</option>
				<option <?php if ($this->t1 == 'M')echo 'selected'; ?>>M</option>
				<option <?php if ($this->t1 == 'Y')echo 'selected'; ?>>Y</option>
				
			</select></td>
			</tr><tr><td colspan="2" class="paypalinfo">Trial period 1 units of duration. Required if you specify a1. Allowable values:
			<BR/>D - for days; allowable range for p1 is 1 to 90
			<BR/>W - for weeks; allowable range for p1 is 1 to 52
			<BR/>M - for months; allowable range for p1 is 1 to 24
			<BR/>Y - for years; allowable range for p1 is 1 to 5</td>
		</tr>
		
		<tr>
			<td><label for="a2">Trial period 2 price</label></td>
			<td><input id="a2" name="a2" type="text" size="30" value="<?php echo $this->a2; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">Trial period 2 price. Can be specified only if you also specify a1.</td>
		</tr>
		<tr>
			<td><label for="p2">Trial period 2 duration</label></td>
			<td><input id="p2" name="p2" type="text" size="20" value="<?php echo $this->p2; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">Trial period 2 duration. Required if you specify a2. Specify an integer value in the allowable range for the units of duration that you specify with t2.</td>
		</tr>
		<tr>
			<td><label for="t2">Trial period 2 units of duration</label></td>
			<td><select id="t2" name="t2">
				<option <?php if ($this->t2 == 'D')echo 'selected'; ?>>D</option>
				<option <?php if ($this->t2 == 'W')echo 'selected'; ?>>W</option>
				<option <?php if ($this->t2 == 'M')echo 'selected'; ?>>M</option>
				<option <?php if ($this->t2 == 'Y')echo 'selected'; ?>>Y</option>
				
			</select>
			</td>
			</tr><tr><td colspan="2" class="paypalinfo">Trial period 2 units of duration. Allowable values:
			<BR/>D - for days; allowable range for p2 is 1 to 90
			<BR/>W - for weeks; allowable range for p2 is 1 to 52
			<BR/>M - for months; allowable range for p2 is 1 to 24
			<BR/>Y - for years; allowable range for p2 is 1 to 5</td>
		</tr>
		
		<tr>
			<td><label for="src">Recurring payments</label></td>
			<td><input <?php $this->clicked( $this->src ); ?> id="src" name="src" type="checkbox" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			Recurring payments. Subscription payments recur unless subscribers cancel their subscriptions before the end of the current billing cycle or you limit the number of times that payments recur with the value that you specify for srt.
			<BR/>Allowable values:
			<BR/>0 - subscription payments do not recur
			<BR/>true - subscription payments recur
			<BR/>The default is 0.
			</td>
		</tr>
		<tr>
			<td><label for="srt">Recurring times</label></td>
			<td><input id="srt" name="srt" type="text" size="20" value="<?php echo $this->srt; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			Recurring times. Number of times that subscription payments recur. Specify an integer above 1. Valid only if you specify src="1".
			</td>
		</tr>
		<tr>
			<td><label for="sra">Reattempt on failure</label></td>
			<td><input id="sra" name="sra" type="checkbox" <?php $this->clicked( $this->sra ); ?> /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			Reattempt on failure. If a recurring payment fails, PayPal attempts to collect the payment two more times before canceling the subscription.
			<BR/>Allowable values:
			<BR/>0 - do not reattempt failed recurring payments
			<BR/>checked - reattempt failed recurring payments before canceling
			<BR/>The default is checked.
			<BR/>For more information, see Reattempting Failed Recurring Payments With Subscribe Buttons.
			</td>
		</tr>
		
		<tr>
			<td><label for="custom">Custom</label></td>
			<td><input id="custom" name="custom" type="text" size="50" value="<?php echo $this->custom; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			User-defined field which will be passed through the system and returned in your merchant payment notification email. This field will not be shown to your subscribers.
			</td>
		</tr>
		<tr>
			<td><label for="invoice">Invoice</label></td>
			<td><input id="invoice" name="invoice" type="text" size="20" value="<?php echo $this->invoice; ?>" /></td>
		</tr><tr>
			<td colspan="2" class="paypalinfo">
			User-defined field which must be unique with each subscription. The invoice number will be shown to subscribers with the other details of their transactions
			</td>
		</tr>
		<tr>
			<td><label for="modify">Modification behavior</label></td>
			<td><select id="modify" name="modify">
				<option <?php $this->select($this->modify, '0'); ?> value="0">New Subscriptions Only</option>
				<option <?php $this->select($this->modify, '1'); ?> value="1">Modify and New Subscriptions</option>
				<option <?php $this->select($this->modify, '2'); ?> value="2">Modify Subscriptions Only</option>
			</select>
			</td>
			</tr><tr><td colspan="2" class="paypalinfo">
			Modification behavior. Allowable values:
			<BR/>0 - allows subscribers to only create new subscriptions
			<BR/>1 - allows subscribers to modify their current subscriptions or sign up for new ones
			<BR/>2 - allows subscribers to only modify their current subscriptions
			<BR/>The default value is 0.
			<BR/>For more information, see Working With Modify Subscription Buttons.
</td>
		</tr>
		
		<tr>
			<td><label for="member_directory">Member Directory</label></td>
			<td><input id="member_directory" name="member_directory" type="text" size="20" value="<?php echo $this->member_directory; ?>" /></td>
			</tr><tr><td colspan="2" class="paypalinfo">
			After the user logs in you have the option of displaying a list of posts from a category to the user. Enter the Categories ID here.
			</td>
		</tr>
		
	</table>
	
		
</div>	
<div id="byrdnotifications">
	<h2>Email Notifications</h2>
	
	<b>mail_signup.php</b>
	<p>This email is sent when a user signs up for the first time.</p>
	<textarea class="large" name="_mail_signup"><?php echo stripslashes(file_get_contents( ROLES.DS.'mail_signup.php' )); ?></textarea>
	
	<b>mail_renewed.php</b>
	<p>This email is sent when a payment is made on an existing account.</p>
	<textarea class="large" name="_mail_renewed"><?php echo stripslashes(file_get_contents( ROLES.DS.'mail_renewed.php' )); ?></textarea>
	
	<b>mail_expired.php</b>
	<p>This email is sent when a users automated payments failed indefinitely.</p>
	<textarea class="large" name="_mail_expired"><?php echo stripslashes(file_get_contents( ROLES.DS.'mail_expired.php' )); ?></textarea>
	
	<b>mail_canceled.php</b>
	<p>This email is sent when a user chooses to cancel their account manually.</p>
	<textarea class="large" name="_mail_canceled"><?php echo stripslashes(file_get_contents( ROLES.DS.'mail_canceled.php' )); ?></textarea>
	
	
</div>	
<div id="byrdconfigurations">
	
	<h2>Paypal Configurations</h2>
	<p>I have tried to include all of the options possible in this first version of this software. If you need anything specific, let me know.</p>	
	<table>
		<tr>
			<td width="200"><label for="business">Paypal Email</label></td>
			<td><input id="business" name="business" type="text" size="50" value="<?php echo $this->business; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">Your PayPal ID or an email address associated with your PayPal account. Email addresses must be confirmed.</td>
		</tr>
		<tr>
			<td><label for="pp_sandbox">Sandbox Mode</label></td>
			<td><input <?php $this->clicked( $this->pp_sandbox ); ?> id="pp_sandbox" name="pp_sandbox" type="checkbox" class="pp_large" />
		</tr><tr>
			<td colspan="2" class="paypalinfo">
			Check this after setting up a test account <a href="https://developer.paypal.com/">developer.paypal.com</a></td>
			</td>
		</tr>
		
		<tr>
			<td><label for="page_style">Payment page style</label></td>
			<td><select id="page_style" name="page_style">
				<option <?php if ($this->page_style == 'paypal') echo 'selected'; ?>>paypal</option>
				<option <?php if ($this->page_style == 'primary') echo 'selected'; ?>>primary</option>
				<option <?php if ($this->page_style == 'page_style_name') echo 'selected'; ?>>page_style_name</option>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The custom payment page style for checkout pages. Allowable values:
			<br/>paypal - use the PayPal page style
			<br/>primary - use the page style that you marked as primary in your account profile
			<br/>page_style_name - use the custom payment page style from your account profile that has the specified name
			<br/>The default is primary if you added a custom payment page style to your account profile. Otherwise, the default is paypal.
			</td>
		</tr>
		<tr>
			<td><label for="image_url">Header Image Url</label></td>
			<td><input id="image_url" name="image_url" type="text" size="20" value="<?php echo $this->image_url; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The URL of the 150x50-pixel image displayed as your logo in the upper left corner of the PayPal checkout pages.
			<br/>Default - Your business name, if you have a Business account, or your email address, if you have Premier or Personal account.
			</td>
		</tr>
		<tr>
			<td><label for="cpp_header_image">Header Image</label></td>
			<td><input id="cpp_header_image" name="cpp_header_image" type="text" size="20" value="<?php echo $this->cpp_header_image; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The image at the top left of the checkout page. The image's maximum size is 750 pixels wide by 90 pixels high. PayPal recommends that you provide an image that is stored only on a secure (https) server.
			<br/>For more information, see Co-Branding the PayPal Checkout Pages.
			</td>
		</tr>
		<tr>
			<td><label for="cpp_headerback_color">Header BG Color</label></td>
			<td><input id="cpp_headerback_color" name="cpp_headerback_color" type="text" size="20" value="<?php echo $this->cpp_headerback_color; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The background color for the header of the checkout page. Valid value is case-insensitive six-character HTML hexadecimal color code in ASCII.
			</td>
		</tr>
		<tr>
			<td><label for="cpp_headerborder_color">Header Border Color</label></td>
			<td><input id="cpp_headerborder_color" name="cpp_headerborder_color" type="text" size="20" value="<?php echo $this->cpp_headerborder_color; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The border color around the header of the checkout page. The border is a 2-pixel perimeter around the header space, which has a maximum size of 750 pixels wide by 90 pixels high.
			<br/>Valid value is case-insensitive six-character HTML hexadecimal color code in ASCII.
			</td>
		</tr>
		<tr>
			<td><label for="cpp_payflow_color">Background Color First</label></td>
			<td><input id="cpp_payflow_color" name="cpp_payflow_color" type="text" size="20" value="<?php echo $this->cpp_payflow_color; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The background color for the checkout page below the header. Valid value is case-insensitive six-character HTML hexadecimal color code in ASCII.
			<br/><b>NOTE:</b> Background colors that conflict with PayPal's error messages are not allowed; in these cases, the default color is white.
			</td>
		</tr>
		<tr>
			<td><label for="cs">Background Color Second</label></td>
			<td><input id="cs" name="cs" type="checkbox" <?php $this->clicked( $this->cs ); ?> /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The background color of the checkout page. Allowable values:
			<br/>0 - background color is white
			<br/>checked - background color is black
			<br/>The default is 0.
			</td>
		</tr>
		<tr>
			<td><label for="lc">Language</label></td>
			<td><input id="lc" name="lc" type="text" size="20" value="<?php echo $this->lc; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The language of the login or sign-up page that subscribers see when they click the Subscribe button. If unspecified, the language is determined by a PayPal cookie in the subscriber's browser. If there is no PayPal cookie, the default language is U.S. English.
			<br/>For allowable values, see .
			</td>
		</tr>
		<tr>
			<td><label for="no_note">Enable Notes to Seller</label></td>
			<td><input id="no_note" name="no_note" type="checkbox" <?php $this->clicked( $this->no_note ); ?> /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			Do not prompt payers to include a note with their payments. Allowable values:
			<br/>0 - provide a text box and prompt for the note
			<br/>checked - hide the text box and the prompt
			<br/>The default is 0.
			</td>
		</tr>
		<tr>
			<td><label for="cn">Note Field Label</label></td>
			<td><input id="cn" name="cn" type="text" size="50" value="<?php echo $this->cn; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			Label that appears above the note field. This value is not saved and will not appear in any of your notifications. If omitted, the default label above the note field is "Add special instructions to merchant." The cn variable is not valid with Subscribe buttons or if you include no_note="1".
			</td>
		</tr>
		<tr>
			<td><label for="no_shipping">Shipping Values</label></td>
			<td><select id="no_shipping" name="no_shipping">
				<option <?php $this->select($this->no_shipping, '0'); ?> value="0">Prompt but not required</option>
				<option <?php $this->select($this->no_shipping, '1'); ?> value="1">Do not prompt</option>
				<option <?php $this->select($this->no_shipping, '2'); ?> value="2">Prompt and is required</option>
			</select></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			Do not prompt payers for shipping address. Allowable values:
			<br/>0 - prompt for an address, but do not require one
			<br/>1 - do not prompt for an address
			<br/>2 - prompt for an address, and require one
			<br/>The default is 0.
			</td>
		</tr>
		<tr>
			<td><label for="_return">Return Url</label></td>
			<td><input id="_return" name="_return" type="text" size="70" value="<?php echo $this->_return; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			The URL to which the payer's browser is redirected after completing the payment; for example, a URL on your site that displays a "Thank you for your payment" page.
			<br/>Default - The browser is redirected to a PayPal web page.
			</td>
		</tr>
		<tr>
			<td><label for="rm">Return Method</label></td>
			<td><select id="rm" name="rm">
				<option <?php $this->select($this->rm, '0'); ?> value="0">GET</option>
				<option <?php $this->select($this->rm, '1'); ?> value="1">None</option>
				<option <?php $this->select($this->rm, '2'); ?> value="2">POST</option>
			</select>
			</td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			Return method. The FORM METHOD used to send data to the URL specified by the return variable after payment completion. Allowable values:
			<br/>0 - all shopping cart transactions use the GET method
			<br/>1 - the payer's browser is redirected to the return URL by the GET method, and no transaction variables are sent
			<br/>2 - the payer's browser is redirected to the return URL by the POST method, and all transaction variables are also posted
			<br/>The default is 0.
			<br/><b>NOTE:</b> The rm variable takes effect only if the return variable is also set.
			</td>
		</tr>
		<tr>
			<td><label for="cbt">Return to Merchant Text</label></td>
			<td><input id="cbt" name="cbt" type="text" size="50" value="<?php echo $this->cbt; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			Sets the text for the Return to Merchant button on the PayPal Payment Complete page. For Business accounts, the return button displays your business name in place of the word "Merchant" by default. For Donate buttons, the text reads "Return to donations coordinator" by default.
			<br/><b>NOTE:</b> The return variable must also be set.
			</td>
		</tr>
		<tr>
			<td><label for="cancel_return">Cancel Return Url</label></td>
			<td><input id="cancel_return" name="cancel_return" type="text" size="70" value="<?php echo $this->cancel_return; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			A URL to which the payer's browser is redirected if payment is cancelled; for example, a URL on your website that displays a "Payment Canceled" page.
			<br/>Default - The browser is redirected to a PayPal web page.
			</td>
		</tr>
		<tr>
			<td><label for="notify_url">IPN Url</label></td>
			<td><input id="notify_url" name="notify_url" type="text" size="70" value="<?php echo $this->notify_url; ?>" /></td>
		</tr>
		<tr>
			<td colspan="2" class="paypalinfo">
			<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/byrd_rolessubscriptions/ipn.php
			<br/>The URL to which PayPal posts information about the transaction, in the form of Instant Payment Notification messages.
			</td>
		</tr>
		
	</table>
</div>	
<div id="byrdinstallation">
	<h2>Overview</h2>
	<p>Thank you for downloading the Membership Subscription Manager from <a href="http://www.jonathonbyrd.com">JonathonByrd.com</a>. This plugin is not designed to be fully featured.
	The goal with this plugin was to get a useable Membership Subscription Manager up and running with all of the features necessary to a
	healthy membership website. I've only put a couple of days into this plugin but I'm offering it for free to the Wordpress Community.</p>
	
	<p>I will be continuing to develop a lot of features into this plugin over the next week and I'll be selling it as a Pro version on my site.
	I would appreciate you buying me a beer with a small donation if you begin to make money off of this plugin. If you need assistance with
	traffic and conversion rates, visit my website, as all of the tools I'm providing are geared to helping you make a profit.</p>
	
	<h2>Installation</h2>
	<ol>
		<li>Upload the files directly from the zip archive into your wordpress plugins directory</li>
		<li>Activate the Byrd Roles Subscription plugin from your wordpress administration area</li>
		<li>Define your Subscription within the Membership Subscriptions Configurations area.</li>
		<li>From your wordpress admin area, click Settings -> General and then uncheck the "Membership" checkbox</li>
		<li>Paste the subscription code into your .php file</li>
	</ol>
	
	<p><b>This plugin does one thing and one thing only, it is designed to create user accounts 
	for new subscribers and delete user accounts of expired subscribers.</b> This plugin does not manage 
	access rights to anypages or posts.</p>
	
	<p>You will need to install a Membership Plugin designed to restrict users access to posts.
	Look here for a plugin: <a href="http://wordpress.org/extend/plugins/search.php?q=members&sort=top-rated" target="_blank">Wordpress Members Only Plugins</a>.
	I've installed <a href="http://wordpress.org/extend/plugins/member-access/" target="_blank">Member Access</a>, 
	but this is purely a preference.</p>
	
	<p>You shouldn't need to modify any of your paypal account settings in order for this system to work. I've provided
	every option that I could find for you to configure and override your default account settings, right from this configurations
	area. I've also preset many default settings so that this plugin will run right out of the box.</p>
	
	<p><b>TIP:</b> If you have problems getting the email notifications to save, check that the file permissions are set to 755.</p>
	
	<h2>Features Walkthrough</h2>
	<ul>
		<li>
		<h4>Login Widget</h4>
		<p>I've provided a snippet of Code that will allow you to display a small login form on your pages.
		This snippet of code will require that you open your template files and paste the code into your .php pages.
		Or if you have the widget manager installed, you can paste this code into the php field.</p>
		<pre>
		&lt;?php byrd_login(); ?&gt;
		</pre>
		</li>
		
		<li>
		<h4>Subscription Page</h4>
		<p>If designed this to be an insertable block so that you can paste your subscription information anywhere
		around your website. Just use the code below.</p>
		<pre>
		&lt;?php byrd_subscription(); ?&gt;
		</pre>
		</li>
		
		<li>
		<h4>Confirmation Page</h4>
		<p>The confirmation page will wrap itself with your template and show as a receipt to your new Member.
		No adjustments are needed for this page.</p>
		</li>
		
		<li>
		<h4>Cancel Return Page</h4>
		<p>If the user cancels the payment process before completing the transaction, they will be redirected
		to this page.</p>
		</li>
		
		<li>
		<h4>Notification Emails</h4>
		<p>These email notifications are just simple html/php files that I've saved in the plugins directory.
		You have your choice of opening those files directly, or using the tiny text areas on the
		Notifications tab.</p>
		<p>This email system is super simple to use. I've provided you with a list of variables that are received
		from the paypal transaction, you can paste any of these variables into the Notifications Emails and the
		system will automatically replace them with their value.</p>
		</li>
		
		<li>
		<h4>Completely Managed Memberships</h4>
		<p>The system is designed to create new user accounts, using the persons paypal email and real name. The
		system will auto generate a password for the user, so you should provide your members with the ability
		to change their passwords so that they will remember how to login.</p>
		<b>Signup</b>
		<p>A new account is created and an email notification is emailed.</p>
		<b>Renewed</b>
		<p>An email notification of the accepted payment is emailed.</p>
		<b>Expired</b>
		<p>The users account is deleted and an email notification is emailed.</p>
		<b>Canceled</b>
		<p>The users account is deleted and an email notification is emailed.</p>
		</li>
		
	</ul>
	
</div>

<div id="byrdjonathonbyrd">
	<h2>JonathonByrd.com</h2>
	<p>If you end up making it big, don't forget about me :)</p>
	<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
	<input type="hidden" name="cmd" value="_s-xclick">
	<input type="hidden" name="hosted_button_id" value="10690444">
	<input type="image" src="https://www.paypal.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
	<img alt="" border="0" src="https://www.paypal.com/en_US/i/scr/pixel.gif" width="1" height="1">
	</form>
	
	<h2>Online Support</h2>
	<?php 
	/*
	$rss = simplexml_load_file('http://www.jonathonbyrd.com/wp-rss.php'); 
	
	if (is_object($rss->channel->item)){
		foreach ($rss->channel->item as $post){ 
			echo '<h4><a href="'.$post->link.'" target="_blank" >'.$post->title.'</a></h4>';
			echo '<p>'.$post->description.'</p>';
			
		}
	}
	*/
	require_once ROLES.DS.'pluginsupport.php';
	?>
	
	
</div>
<script>
	toggletabs('subscription');
	
	jQuery('#configurationslink').click(function(evt){ toggletabs(this.id.replace(/link/,'')); });
	jQuery('#notificationslink').click(function(evt){ toggletabs(this.id.replace(/link/,'')); });
	jQuery('#installationlink').click(function(evt){ toggletabs(this.id.replace(/link/,'')); });
	jQuery('#jonathonbyrdlink').click(function(evt){ toggletabs(this.id.replace(/link/,'')); });
	jQuery('#subscriptionlink').click(function(evt){ toggletabs(this.id.replace(/link/,'')); });
	
	function toggletabs(id){
		jQuery('#byrdnotifications').css('display', 'none');
		jQuery('#notificationslink').removeClass('current');
	
		jQuery('#byrdsubscription').css('display', 'none');
		jQuery('#subscriptionlink').removeClass('current');
	
		jQuery('#byrdconfigurations').css('display', 'none');
		jQuery('#configurationslink').removeClass('current');
	
		jQuery('#byrdinstallation').css('display', 'none');
		jQuery('#installationlink').removeClass('current');
	
		jQuery('#byrdjonathonbyrd').css('display', 'none');
		jQuery('#jonathonbyrdlink').removeClass('current');
		
		jQuery('#byrd'+ id).css('display', 'block');
		jQuery('#'+ id + 'link').addClass('current');
		
	}
</script>