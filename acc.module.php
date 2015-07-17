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
 
require PATH_THIRD.'module/config/conf.module.php';

class module_acc {
	# =================================
	# | CLASS VARIABLES
	# =========================== BEGIN
	# Constructed
	public $version 	= MODULE_VERSION;
	public $name		= MODULE_NAME;
	public $description = "Removes 'publish another entry' strings.";
	public $id			= MODULE_CLASS_BASE;
	
	# Defaulted
	public $sections	= array();
	public $required_by = array('module');
	# ============================= END
	
	#####################################################
	
	# =================================
	# | SET SECTIONS
	# =================================
	# | Changes the section of something, if you want.
	# |
	# | @return void
	# =========================== BEGIN
	public function set_sections() {
		
	}
	# ============================= END
}

/* End of file acc.module.php */
/* Location: /system/expressionengine/third_party/module/acc.module.php */