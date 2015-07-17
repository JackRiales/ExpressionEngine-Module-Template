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

class module_ext {
	# =================================
	# | CLASS VARIABLES
	# =========================== BEGIN
	# Constructed
	public $version;
	public $name;
	public $description;
	public $docs_url;
	
	# Defaulted
	public $settings_exist	= 'n';
	public $settings		= array();
	public $required_by		= array('module');
	
	# Private
	private $channels;
	# ============================= END
	
	#####################################################
	
	# =================================
	# | CONSTRUCTOR
	# =================================
	# | Constructs values from config file
	# |
	# | @return void
	# =========================== BEGIN
	public function __construct($settings = '') {
		$this->version = MODULE_VERSION;
		$this->name = MODULE_NAME;
		$this->docs_url = MODULE_DOCS;
		
		ee()->lang->loadfile('module');
		$this->description = lang('module_module_description');
		
		$this->settings = $settings;
	}
	# ============================= END
	
	#####################################################
	
	######
	### Hook Method Here
	######
	
	#####################################################
	
	
	# =================================
	# | ACTIVATE
	# =================================
	# | Activates extension and places it into the exp_extensions table.
	# | Remotely controlled by module.
	# |
	# | @return boolean TRUE
	# =========================== BEGIN
	public function activate_extension() {
		return TRUE;
	}
	# ============================= END
	
	#####################################################
	
	# =================================
	# | UPDATE
	# =================================
	# | Version checks and performs any necessary updates.
	# |
	# | @return mixed	void if updating / FALSE if no update required
	# =========================== BEGIN
	public function update_extension($current = '') {		
		if ($current == '' || $current == $this->version) {
			return FALSE;
		}
		
		ee()->db->where('class', __CLASS__);
		ee()->this->db->update('extensions', array('version' => $this->version));
	}
	# ============================= END
	
	#####################################################
	
	# =================================
	# | DISABLE
	# =================================
	# | Removes the extension from the database.
	# |
	# | @return void
	# =========================== BEGIN
	public function disable_extension() {		
		ee()->db->where('class', __CLASS__);
		ee()->db->delete('extensions');
	}
	# ============================= END
}

/* End of file ext.module.php */
/* Location: /system/expressionengine/third_party/module/ext.module.php */