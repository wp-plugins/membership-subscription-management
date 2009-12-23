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

if ($this->pp_sandbox) $action ='https://www.sandbox.paypal.com/cgi-bin/webscr'; else $action ='https://www.paypal.com/cgi-bin/webscr';

?>
<ul class="subscriptionspage">
<li>
	<h3><?php echo $this->item_name; ?></h3>
	<div class="left width75"><?php echo $this->item_description; ?></div>
	<div class="left width25">$<?php echo $this->a3; ?></div>
	<div class="clear"></div>
	<div style="position:relative;float:right;">
		<form action="<?php echo $action; ?>" method="post">
		<input type="hidden" name="cmd" value="_xclick-subscriptions">
		
		<?php foreach ($this->getProperties() as $property => $value) { 
			if (is_null($this->$property) || !$this->$property) continue;
			?>
			<input type="hidden" name="<?php echo $property; ?>" value="<?php echo $value; ?>">
		<?php } ?>
		
		<input type="submit" name="submit" border="0" alt="PayPal - The safer, easier way to pay online"> 
		</form> 
	</div>
</li>

</ul>