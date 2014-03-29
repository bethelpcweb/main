<?php
/**
 * Plugin Name: BPC SQLServer Access
 * Description: Methods and handles made available for interacting with the separate SQL server instance holding bpc data
 * Version: 0.01
 * Author: Gregory Bergschneider	
 */
 $bpc_plugin_dir = dirname(__FILE__);
 $bpc_plugin_url = str_replace('/access.php','',plugins_url("access.php",__FILE__));
?>
<head>
	<script src="<?php echo "$bpc_plugin_url/ServerRequests.js"?>"></script>
</head>
<?php

 include_once "$bpc_plugin_dir/connection.php";
 include_once "$bpc_plugin_dir/members.php";
 include_once "$bpc_plugin_dir/event.php";
?>