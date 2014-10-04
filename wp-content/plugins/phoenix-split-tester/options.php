<?php
if (function_exists('load_plugin_textdomain')) {
    load_plugin_textdomain('split-tester', 'wp-content/plugins/split-tester');
}
function split_test_request($name, $default=null) 
{
	if (!isset($_REQUEST[$name])) return $default;
	return stripslashes_deep($_REQUEST[$name]);
}
	
function split_test_field_checkbox($name, $label='', $tips='', $attrs='')
{
  global $options;
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><input type="checkbox" ' . $attrs . ' name="options[' . $name . ']" value="1" ' . 
    ($options[$name]!= null?'checked':'') . '/>';
  echo ' ' . $tips;
  echo '</td>';
}

function split_test_field_textarea($name, $label='', $tips='', $attrs='')
{
  global $options;
  
  if (strpos($attrs, 'cols') === false) $attrs .= 'cols="20"';
  if (strpos($attrs, 'rows') === false) $attrs .= 'rows="1"';
  
  echo '<th scope="row">';
  echo '<label for="options[' . $name . ']">' . $label . '</label></th>';
  echo '<td><textarea wrap="off" ' . $attrs . ' name="options[' . $name . ']">' . 
    htmlspecialchars($options[$name]) . '</textarea>';
  echo '<br /> ' . $tips;
  echo '</td>';
}	

if (isset($_POST['save']))
{
    if (!wp_verify_nonce($_POST['_wpnonce'], 'save')) die('Securety violated');
    $options = split_test_request('options');
    update_option('split_test', $options);
}
else 
{
    $options = get_option('split_test');
}
?>	

<div class="wrap">

<form method="post">
<?php wp_nonce_field('save') ?>
<h2>AB Split Testing For Wordpress</h2>

        <p>If you have questions or comments makes sure you check out the 
        <a href="http://www.satollo.net/plugins/header-footer">official plugin page</a>
        or write me to at JoshuaZiering@Gmail.com</p>
        
        <p>For more fun SEO/CRO ideas and methods, check out my site <a href="http://www.FullSpeedSEO.com">Full Speed SEO</a></p>

      
     
<table class="form-table">
<tr valign="top"><?php split_test_field_textarea('baseline_account', __('baseline_account', 'split-tester'), __('baseline hint', 'split-tester'), 'rows="1"'); ?></tr>
<tr valign="top"><?php split_test_field_textarea('test_account_a', __('test_account_a', 'split-tester'), __('test hint', 'split-tester'), 'rows="1"'); ?></tr>
<!--<tr valign="top"><?php split_test_field_textarea('test_account_b', __('test_account_b', 'split-tester'), __('test hint', 'split-tester'), 'rows="1"'); ?></tr> -->
</table>

<p class="submit"><input type="submit" name="save" value="<?php _e('save', 'split_test'); ?>"></p>

</form>
</div>
