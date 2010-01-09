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

if (!is_user_logged_in()){ ?>
	<h2>Member Login</h2>
	<form name="loginform" action="<?php echo wp_login_url('http://www.jonathonbyrd.com/'); ?>" method="post">
		<label for="log">Username<br /><input type="text" name="log" id="log" value="" /></label><br />
		<label for="pwd">Password<br /><input type="password" name="pwd" id="pwd" /></label>
		<input type="submit" value="submit" name="submit" />
	</form>
	
<?php } elseif ($this->member_directory) { ?>
	<h2>Member Directory</h2>
	<?php $listcat = $this->member_directory; 
	if (!isset($listcat)) $listcat = 16;
	$posts = list_titles( $listcat, 15 );
	?>
	<div>
		<table class="listposts">
			<tr>
				<td>
					<ul>
					<?php if (is_array($posts)) foreach($posts as $i => $post){ ?>
						<li>
						<a href="<?php echo $post['href']; ?>"><?php echo $post['title']; ?></a>
						</li>
					<?php } ?>
					</ul>
				</td>
			</tr>
		</table>
	</div>
	
<?php } ?>