<?php
/*
Plugin Name: Wordpress Split Tester
Plugin URI: http://www.fullspeedseo.com/wordpress-split-tester
Description: 
Version: 1.0
Author: Joshua Ziering
Author URI: http://www.FullSpeedSEO.com
Disclaimer: Use at your own risk. No warranty expressed or implied is provided.
*/

/*	Copyright 2008-2010  Satollo  (email : info@satollo.net)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation; either version 2 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/
$split = 0;
$split_test_options = get_option('split_test');

add_action('admin_menu', 'split_test_admin_menu');
function split_test_admin_menu()
{
    add_options_page('Wordpress Split Tester', 'Wordpress Split Tester', 'manage_options', 'phoenix-split-tester/options.php');
}

add_action('wp_head', 'split_test_wp_head');
function split_test_wp_head()
{
    global $split_test_options;
    
    if (is_home()) echo $split_test_options['head_home'];
    
    echo $split_test_options['head'];
}

add_action('the_content', 'split_test_the_content');
function split_test_the_content($content)
{
	$splittest = get_post_custom();
	//print_r($splittest);
	if($splittest['splittestpost'][0]) //Do we split test this post?
	{
		//We do. 
		if(rand(0,1) == 0) //Do we display original or mod?
		{
			global $split; //Display Original
			$split = 0;
			return($content);
		}
		else 
		{
			global $split;
			$split=1;   //Display Mod
			$newpost=get_post($splittest['splittestpost'][0]);
			return($content = $newpost->post_content); 
			
		}
		
	}else
		return($content);

}

add_action('wp_footer', 'split_test_wp_footer');
function split_test_wp_footer()
{
    global $split_test_options;   
    global $split;
    //echo $split;
    if($split == 1)
    {
    	echo "<!--Displaying multiple tracking on this split tested page-->";
    	echo '<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=’" + gaJsHost + "google-analytics.com/ga.js’ type=’text/javascript’%3E%3C/script%3E"));
</script>
<script type="text/javascript">
var firstTracker = _gat._getTracker("'.$split_test_options['baseline_account'].'");
firstTracker._initData();
firstTracker._trackPageview();
var secondTracker = _gat._getTracker("'.$split_test_options['test_account_a'].'");
secondTracker._setDomainName("none");
secondTracker._setAllowLinker(true);
secondTracker._initData();
secondTracker._trackPageview();
</script>

';

    }
    else
    {
    echo "<!--Displaying single tracking on this Split tested page-->";
    echo '<script type="text/javascript">
var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
document.write(unescape("%3Cscript src=\'" + gaJsHost + "google-analytics.com/ga.js\' type=\'text/javascript\'%3E%3C/script%3E"));
</script>
<script type="text/javascript">
try {
var pageTracker = _gat._getTracker("'.$split_test_options['baseline_account'].'");
pageTracker._trackPageview();
} catch(err) {}</script>';
    
    
    }    
    //echo $split_test_options['footer'];
}


?>
