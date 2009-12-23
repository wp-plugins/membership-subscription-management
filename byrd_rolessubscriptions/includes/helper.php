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

/**
 * diplays a list of posts
 * 
 * @param $cat
 * @return array
 */
function list_titles1( $cat = '', $ppp = '10' ){
	global $more; 
	$more = 0;
	$i=0;
	$posts = false;
	
	wp_reset_query(); 
	query_posts('posts_per_page='.$ppp.'&cat='.$cat);
							  
	if ( have_posts() ) : while ( have_posts() ) : the_post(); $i++;
	
		$posts[$i]['title'] = the_title('','',false);
		$posts[$i]['href'] = get_permalink();
								
	endwhile; endif; 
	
	wp_reset_query(); 
	
	return $posts;
}

