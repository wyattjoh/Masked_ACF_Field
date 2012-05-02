<?php
/*
	Author: Wyatt Johnson
	Website: http://www.wyattjohnson.ca/
	Github: https://github.com/Wyattjoh/Masked_ACF_Field/
*/


class Masked_field extends acf_Field
{
	
	/*--------------------------------------------------------------------------------------
	*
	*	Constructor
	*
	*	@author Elliot Condon
	*	@since 1.0.0
	*	@updated 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function __construct($parent)
	{
    	parent::__construct($parent);
    	
    	$this->name = 'maskedfield';
		$this->title = __("Masked Field",'acf');
		
   	}
	
   	/*--------------------------------------------------------------------------------------
	*
	*	admin_print_scripts / admin_print_styles
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_print_scripts()
	{
		
		wp_register_script('jquery-masking', get_bloginfo('stylesheet_directory').'/acf-fields/assets/masked_input.js',array('jquery'));
		
		wp_enqueue_script(array(
			'jquery',
			'jquery-ui-core',
			'jquery-ui-tabs',
			'jquery-masking',
		));
	}
	

	/*--------------------------------------------------------------------------------------
	*
	*	create_field
	*
	*	@author Elliot Condon
	*	@since 2.0.5
	*	@updated 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_field($field)
	{
		$field_id = uniqid();
		if(isset($field['formatting'])) {
			?>
			<script type="text/javascript">
				jQuery(function($){
				   $(".maskedfield<?=$field_id?>").mask("<?=$field['formatting']?>");
				});
			</script>
			<?php
		}
		echo '<input type="text" value="' . $field['value'] . '" id="' . $field['name'] . '" class="' . $field['class'] . $field_id . '" name="' . $field['name'] . '" />';
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	create_options
	*
	*	@author Elliot Condon
	*	@since 2.0.6
	*	@updated 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_options($key, $field)
	{
		// defaults
		$field['formatting'] = isset($field['formatting']) ? $field['formatting'] : '';
		
		?>
		<tr class="field_option field_option_<?php echo $this->name; ?>">
			<td class="label">
				<label><?php _e("Formatting",'acf'); ?></label>
				<p class="description"><?php _e("Define how to mask input",'acf'); ?></p>
				<p class="description"><?php _e('eg:<br/>99/99/9999<br/>(999) 999-9999<br/>99-9999999<br/>999-99-9999'); ?></p>
			</td>
			<td>
				<?php 
				$this->parent->create_field(array(
					'type'	=>	'text',
					'name'	=>	'fields['.$key.'][formatting]',
					'value'	=>	$field['formatting']
				));
				?>
			</td>
		</tr>
		<?php
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value($post_id, $field)
	{
		$value = parent::get_value($post_id, $field);
		
		return $value;
	}
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value_for_api
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value_for_api($post_id, $field)
	{
		$value = parent::get_value($post_id, $field);
	
		return $value;
	}
	
}

?>