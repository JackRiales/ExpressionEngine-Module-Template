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
 
class module_mcp {
	# =================================
	# | INDEX
	# =================================
	# | Controller method for the 'index' view of the back-end control panel.
	# |
	# | @return expressionengine view
	# =========================== BEGIN
	public function index() {
		# Set title
		ee()->view->cp_page_title = lang('module_module_name');
		
		# Variables passed to the view
		$vars = array(
			# Required for secure form processing
			'xid'		=> XID_SECURE_HASH,
			
			# Success text
			'success' 	=> ''
		);
		
		# If data has been submitted, update the tables.
		if (isset($_POST['submit']))
			$vars['success'] = $this->update_tables($_POST, true);
		
		# Return the index view with the passed in variables
		return ee()->load->view('index', $vars, true);
	}
	# ============================= END
	
	#####################################################
	
	# =================================
	# | TABLE UPDATE
	# =================================
	# | Uses POST from index form and updates 'enabled' fields accordingly.
	# |
	# | @param array 	$post			$_POST (or, an array pretending to be $_POST)
	# | @param boolean 	$unset_post		Unset Post?
	# | @return 		(string) 		Success Text
	# =========================== BEGIN
	private function update_tables($post, $unset_post = FALSE) {
		# Default field values
		ee()->db->update(
			'module',
			array ('field' 	=> 0)
		);
		
		# If the user wants, go ahead and unset post
		if ($unset_post) $_POST = array();
		
		# Draw success text
		return "<h4><span style='color:green'>Update successful.</span></h4>";
	}
	# ============================= END
}

/* End of file mcp.module.php */
/* Location: /system/expressionengine/third_party/module/mcp.module.php */