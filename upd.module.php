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
 
class module_upd {
	# =================================
	# | CLASS VARIABLES
	# =========================== BEGIN
	public $version;
	public $name;
	public $mod_name;
	public $mcp_name;
	public $ext_name;
	# ============================= END
	
	#####################################################
	
	# =================================
	# | CONSTRUCTOR
	# =================================
	# | Loads configurations and sets class variables.
	# | @require (path) ./config/module_settings.php
	# |
	# | @return void
	# =========================== BEGIN
	public function __construct() {
		$this->version 	= MODULE_VERSION;
		$this->name 	= MODULE_NAME;
		$this->mod_name = str_replace('_upd', '', __CLASS__);
        $this->ext_name	= $this->mod_name . '_ext';
        $this->mcp_name	= $this->mod_name . '_mcp';
	}
	# ============================= END
	
	#####################################################
	
	# =================================
	# | INSTALL
	# =================================
	# | Installs the module to the EE system and database.
	# |
	# | @return boolean TRUE
	# =========================== BEGIN	
	public function install() {
		# Generate module data
		$module_data = array(
			'module_name'		=> $this->name,
			'module_version'	=> $this->version,
			'has_cp_backend'	=> MOD_USES_CP,
			'has_publish_fields'=> MOD_PUBLISH_FIELD
		);
		
		# Insert module data to the database
		ee()->db->insert('modules', $module_data);
		
		# Forge the module table
		ee()->load->dbforge();
		
		# Set Fields
		# field INTEGER(10) NOT NULL
		$fields = array(
			'field'	=> array(
				'type'		=> 'int',
				'constraint'=> '10',
				'unsigned'	=> TRUE,
			),
		);
		
		# Forge the fields
		ee()->dbforge->add_field($fields);
		
		# Set the primary key
		ee()->dbforge->add_key('channel_id', TRUE);
		
		# Create the table
		ee()->dbforge->create_table('module');
		
		# Seed the table
		ee()->db->insert(
			'module',
			array (
				'field' => 0
			)
		);
		
		# Install and Activate the Extension
		if(MOD_USES_EXT != 'n') {
			$data = array(
				'class'     => $this->ext_name,
				'method'    => EXT_METHOD,
				'hook'      => EXT_HOOK,
				'settings'  => '',
				'priority'	=> 10,
				'version'   => $this->version,
				'enabled'   => 'y'
			);
			ee()->db->insert('extensions', $data);
		}
		
		return TRUE;
	}
	# ============================= END
	
	#####################################################
	
	# =================================
	# | UNINSTALL
	# =================================
	# | Removes the module from the system.
	# |
	# | @return boolean TRUE
	# =========================== BEGIN
	public function uninstall() {
		ee()->load->dbforge();
		
		ee()->db->select('module_id');
		$query = ee()->db->get_where('modules', array('module_name' => $this->name));

		ee()->db->where('module_id', $query->row('module_id'));
		ee()->db->delete('module_member_groups');

		ee()->db->where('module_name', $this->name);
		ee()->db->delete('modules');
		
		if (MOD_USES_EXT != 'n')
			ee()->db->delete('extensions', array('class' => $this->ext_name));

		ee()->db->where('class', $this->name);
		ee()->db->delete('actions');
		
		ee()->dbforge->drop_table('module');
		
		return TRUE;
	}
	# ============================= END
	
	#####################################################
	
	# =================================
	# | UPDATE
	# =================================
	# | Performs version check and updates if necessary
	# |
	# | @return boolean
	# =========================== BEGIN
	public function update($current = '') {
		if ($current == $this->version) {
			// Module up to date.
			return FALSE;
		}

		// Module version different. Update required.
		return TRUE;
	}
	# ============================= END
}

/* End of file upd.module.php */
/* Location: /system/expressionengine/third_party/module/upd.module.php */