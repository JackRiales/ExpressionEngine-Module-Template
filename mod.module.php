<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 *	Module
 *	My ExpressionEngine Module
 *
 *	@package 	Module
 *	@author		Jack Riales
 *	@copyright	Copyright (c) 2015, Blue Fish Design Studio
 *	@link		http://www.bluefishds.com/
 *	@version	1.0.0
 *	@build		20150706
 */

# Get the config file
require PATH_THIRD.'module/config/conf.module.php';

class module {
	
	# =================================
	# | CLASS VARIABLES
	# =========================== BEGIN
	public $return_data = '';
	# ============================= END
	
	#####################################################
	
	# =================================
	# | CONSTRUCTOR
	# =================================
	# | Performs the module method. Queries module channels, replaces necessary fields in tag data.
	# | 
	# | @param string $string	tag data to operate on									[default NULL]
	# | @param string $channel	module channel to attach to 							[default NULL]
	# | @param string $idea		field to get, for use if someone only wants one field. 	[default NULL, optional]
	# | @return void
	# =========================== BEGIN
	public function __construct($string = NULL, $channel= NULL, $idea = NULL) {
		$this->return_data = "Module v." . MODULE_VERSION;
	}
	# ============================= END
	
}

/* End of file mod.module.php */
/* Location: /system/expressionengine/third_party/module/mod.module.php */