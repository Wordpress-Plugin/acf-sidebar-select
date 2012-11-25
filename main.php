<?php
/*
 *	Advanced Custom Fields - Google Maps Address Lookup
 */
 
 
class widgets extends acf_Field
{

	var $localizationDomain = 'widgets';

	/*--------------------------------------------------------------------------------------
	*
	*	Constructor
	*	- This function is called when the field class is initalized on each page.
	*	- Here you can add filters / actions and setup any other functionality for your field
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function __construct($parent)
	{
		// do not delete!
    	parent::__construct($parent);

		$locale = get_locale();	
		load_textdomain($this->localizationDomain, sprintf("/%s/lang/%s-%s.mo",dirname( plugin_basename( __FILE__ ) ),$this->localizationDomain, $locale));
   	
    	// set name / title
    	$this->name = 'widgets'; // variable name (no spaces / special characters / etc)
		  $this->title = __("Select a sidebar",$this->localizationDomain); // field label (Displayed in edit screens)
   	}

	
	/*--------------------------------------------------------------------------------------
	*
	* Builds the field options
	* 
	* @see acf_Field::create_options()
	* @param string $key
	* @param array $field
	*
	*-------------------------------------------------------------------------------------*/
	
	function create_options($key, $field)
  {

  }
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	pre_save_field
	*	- this function is called when saving your acf object. Here you can manipulate the
	*	field object and it's options before it gets saved to the database.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function pre_save_field($field)
	{
		// do stuff with field (mostly format options data)
		
		return parent::pre_save_field($field);
	}

  /**
   * try and get a nested array value
   */
  function try_get_value($field, $key) 
  {
    return isset($field[$key]) ? $field[$key] : false;

  }
	
	
	/*--------------------------------------------------------------------------------------
	*
	* Creates the time picker field for inside post metaboxes
	* 
	* @see acf_Field::create_field()
	* 
	*-------------------------------------------------------------------------------------*/
	
	function create_field($field)
	{
    global $wp_registered_sidebars;
    ?>
    <select name="<?php echo $field['name'] ?>">
      <option value="0">Use default sidebar</option>
    <?php 
      foreach ($wp_registered_sidebars as $sidebar) {
        printf('
          <option value="%s" %s>%s</option>
        '
        , $sidebar['id']
        , selected($field['value'], $sidebar['id'])
        , $sidebar['name']
        );
      }
    ?>
    </select>
    <?php

 	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	* admin_print_scripts / admin_print_styles
	* These functions are called in the admin_print_scripts / admin_print_styles where 
	* your field is created. Use this function to register css and javascript to assist 
	* your create_field() function.
	*
	* @see acf_Field::admin_print_scripts()
	* 
	*-------------------------------------------------------------------------------------*/
	
	function admin_print_scripts()
	{
	
		
	}
	
	/*--------------------------------------------------------------------------------------
	*
	*	update_value
	*	- this function is called when saving a post object that your field is assigned to.
	*	the function will pass through the 3 parameters for you to use.
	*
	*	@params
	*	- $post_id (int) - usefull if you need to save extra data or manipulate the current
	*	post object
	*	- $field (array) - usefull if you need to manipulate the $value based on a field option
	*	- $value (mixed) - the new value of your field.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function update_value($post_id, $field, $value)
	{
		// do stuff with value

		parent::update_value($post_id, $field, $value);
	}
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value
	*	- called from the edit page to get the value of your field. This function is useful
	*	if your field needs to collect extra data for your create_field() function.
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 2.2.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value($post_id, $field)
	{
		// get value
		$value = parent::get_value($post_id, $field);
		
		// format value
		
		// return value
		return $value;		
	}
	
	
	/*--------------------------------------------------------------------------------------
	*
	*	get_value_for_api
	*	- called from your template file when using the API functions (get_field, etc). 
	*	This function is useful if your field needs to format the returned value
	*
	*	@params
	*	- $post_id (int) - the post ID which your value is attached to
	*	- $field (array) - the field object.
	*
	*	@author Elliot Condon
	*	@since 3.0.0
	* 
	*-------------------------------------------------------------------------------------*/
	
	function get_value_for_api($post_id, $field)
	{
		// get value
		$value = $this->get_value($post_id, $field);
		
		// format value
		
		// return value
		return $value;

	}
	
}
