<?php

/**
 * Groups DataMapper Model
 *
 *
 * @license		MIT License
 * @category	Models
 * @author		Phil DeJarnett
 * @link		http://www.overzealous.com
 */
class Groups extends DataMapper {

	// Uncomment and edit these two if the class has a model name that
	//   doesn't convert properly using the inflector_helper.
	// var $model = 'Groups';
	 var $table = 'usergroup';

	// You can override the database connections with this option
	// var $db_params = 'db_config_name';

	var $has_many = array('files' => array(			
            'class' => 'files',	
            'other_field' => 'groups',		
            'join_self_as' => 'usergroup',		
            'join_other_as' => 'files',	
            'join_table' => 'files_usergroup'),
            'usersmodel' => array(			
            'class' => 'usersmodel',	
            'other_field' => 'groups',		
            'join_self_as' => 'usergroup',		
            'join_other_as' => 'user',	
            'join_table' => 'users_usergroup')	
    );

	// --------------------------------------------------------------------
	// Validation
	//   Add validation requirements, such as 'required', for your fields.
	// --------------------------------------------------------------------

	var $validation = array(
		'GroupName' => array(
			// example is required, and cannot be more than 120 characters long.
			'rules' => array('required', 'max_length' => 60, 'unique'),
			'label' => 'Group Name'
		)
	);

	// --------------------------------------------------------------------
	// Default Ordering
	//   Uncomment this to always sort by 'name', then by
	//   id descending (unless overridden)
	// --------------------------------------------------------------------

	 var $default_order_by = array('id' => 'asc');

	// --------------------------------------------------------------------

	/**
	 * Constructor: calls parent constructor
	 */
    function __construct($id = NULL)
	{
		parent::__construct($id);
    }

	// --------------------------------------------------------------------
	// Post Model Initialisation
	//   Add your own custom initialisation code to the Model
	// The parameter indicates if the current config was loaded from cache or not
	// --------------------------------------------------------------------
	//function post_model_init($from_cache = FALSE)
//	{
//	}

	// --------------------------------------------------------------------
	// Custom Methods
	//   Add your own custom methods here to enhance the model.
	// --------------------------------------------------------------------

	/* Example Custom Method
	function get_open_Groupss()
	{
		return $this->where('status <>', 'closed')->get();
	}
	*/

	// --------------------------------------------------------------------
	// Custom Validation Rules
	//   Add custom validation rules for this model here.
	// --------------------------------------------------------------------

	/* Example Rule
	function _convert_written_numbers($field, $parameter)
	{
	 	$nums = array('one' => 1, 'two' => 2, 'three' => 3);
	 	if(in_array($this->{$field}, $nums))
		{
			$this->{$field} = $nums[$this->{$field}];
	 	}
	}
	*/
}

/* End of file Groups.php */
/* Location: ./application/models/Groups.php */
