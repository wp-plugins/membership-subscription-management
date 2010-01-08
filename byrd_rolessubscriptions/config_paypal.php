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


// Check to ensure this file is within the rest of the framework
defined('_EXEC') or die();

?>
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
			<td><label for="return">Return Url</label></td>
			<td><input id="return" name="return" type="text" size="70" value="<?php echo $this->return; ?>" /></td>
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
		