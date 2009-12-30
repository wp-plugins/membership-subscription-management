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

//loading resources
require_once dirname(__file__).'/includes/framework.php';
if (!function_exists('file_get_html')) require_once ROLES_INC.DS.'simple_html_dom.php';

// Check to ensure this file is within the rest of the framework
defined('_BYRDROLES') or die();

if (isset($_GET['postingcomment'])) {
	
	/**
	 *  POST Function
	 *  I had to add
	 *  if(!empty($_GET)) $_POST = $_GET;
	 *  to the wp-comment-post.php file in order to get this to work.
	 *  
	 */
	function _curlPost( $url =false ) { 
		$url = 'http://www.jonathonbyrd.com/wp-comments-post.php';
		
		$headers[] 	= 'Accept: image/gif, image/x-bitmap, image/jpeg, image/pjpeg, pdf/application'; 
		$headers[] 	= 'Connection: Keep-Alive'; 
		$headers[] 	= 'Content-type: application/x-www-form-urlencoded;charset=UTF-8'; 
		$user_agent 	= 'Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.0.3705; .NET CLR 1.1.4322; Media Center PC 4.0)'; 
		$compression	= 'gzip'; 
		
		$process 			= curl_init(); 
		$query = '';
		foreach ($_GET as $k => $v){
			$query .= '&'.$k.'='.urlencode($v);
		}
		curl_setopt($process, CURLOPT_URL, $url.'?'.$query);
		curl_setopt($process, CURLOPT_HTTPHEADER, $headers); 
		curl_setopt($process, CURLOPT_HEADER, 0); 
		curl_setopt($process, CURLOPT_USERAGENT, $user_agent); 
		curl_setopt($process, CURLOPT_ENCODING , $compression); 
		curl_setopt($process, CURLOPT_TIMEOUT, 30); 
		curl_setopt($process, CURLOPT_RETURNTRANSFER, 1); 
		curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1); 
		curl_setopt($process, CURLOPT_POST, 1);
		curl_setopt($process, CURLOPT_POSTFIELDS, $_GET); 
		
		$return 			= curl_exec($process); 
		curl_close($process); 
		return $return; 
	}
	
	$posted = _curlPost();
	
	$html = file_get_html('http://www.jonathonbyrd.com/wordpress/membership-plugin-support-page');
	foreach ($html->find('cite.fn') as $admin)
		if ($admin->innertext == 'admin') $admin->innertext = 'Jonathon';
	echo $html->find('#commentlist',0)->outertext;
	
	if ($posted){ 
		$html = str_get_html($posted)->find('p',0)->innertext;
		echo '<br/><b>'.$html.'</b>';
	} else echo '<br/><b>'.date('g:i a d-m-Y').' Posted, please wait for Jonathon to answer.</b>';
	
	
} else {
	$html = file_get_html('http://www.jonathonbyrd.com/wordpress/membership-plugin-support-page');
	foreach ($html->find('cite.fn') as $admin)
		if ($admin->innertext == 'admin') $admin->innertext = 'Jonathon';
	?>
	<div id="commentsgohere">
		<?php echo $html->find('#commentlist',0)->outertext; ?>
	</div>
	<br/>
	<table width="600px">
		<tr><td>Name</td><td><input name="author" id="author" size="50" type="text" /></td></tr>
		<tr><td>Email</td><td><input name="email" id="email" size="50" type="text" /></td></tr>
		<tr><td>Url</td><td><input name="url" id="url" size="50" type="text" /></td></tr>
		<tr><td colspan="2"><textarea name="comment" id="comment"></textarea></td></tr>
		<tr><td colspan="2">
			<button id="postcommentbutton" name="postingcomment">Post!</button>
		</td></tr>
	</table>
	<style>
	.comments {width:100%;text-align:center;}
	.commentlist .thread-even {background-color:#eee;}
	.commentlist .thread-odd {background-color:#efefef;}
	.commentlist .comment {display:block;height:auto;padding:7px;border:1px solid #ccc;margin:5px;border-left:5px solid #314c5f;border-bottom:1px solid #2f3235;}
	
	.commentlist .comment-author {vertical-align:middle;font-size:20px;font-weight:bold;color:#2f3235;text-transform:Capitalize;width:300px;position:relative;float:left;}
	.commentlist .comment-meta {width:300px;position:relative;float:left;text-transform:lowercase;}
	.commentlist .comment-meta a {color:#808180;font-size:10px;text-decoration:none;}
	.commentlist .comment p {display:block;clear:both;padding-left:20px;}
	
	</style>
	<script>
	jQuery('#postcommentbutton').click(function(evt){ 
		evt.preventDefault();
		var query = 'email='+ jQuery('#email').val()
				  + '&author='+ jQuery('#author').val()
				  + '&url='+ jQuery('#url').val()
				  + '&comment='+ jQuery('#comment').val()
				  + '&postingcomment=true&comment_post_ID=364&comment_parent=0&_wp_unfiltered_html_comment=8a1392377e';
						
		jQuery.ajax({
			  type: "GET",
			  url: "<?php echo get_bloginfo( 'wpurl' ); ?>/wp-content/plugins/byrd_rolessubscriptions/pluginsupport.php?"+query,
			  dataType: "text",
			   success: function(msg){
			     jQuery('#commentsgohere').html(msg);
			   }
			});
		return false;
	});
	
	</script>
<?php } ?>