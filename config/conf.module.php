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
 
if (! defined('MOD_DEF_HEADER')) {
	define(	'MOD_DEF_HEADER', 	'SET'	);
	define(	'MOD_NAME', 		'Module');
	define(	'MOD_VERSION', 		'1.0'	);
	define(	'MOD_DOCS', 		''		);
	define(	'MOD_CLASS_BASE', 	'module');
	define( 'MOD_USES_EXT',		'n'		);
	define( 'MOD_USES_CP',		'y'		);
	define( 'MOD_PUBLISH_FIELD','n'		);
	define(	'MOD_DEBUG', 		'n'		);
	define( 'EXT_METHOD',		''		);
	define( 'EXT_HOOK',			''		);
}

# If the 'ee()' function from EE 2.6 is nonexistant, define it!
# Including here because everywhere has the config file.
if ( ! function_exists('ee'))
{
    function ee()
    {
        static $EE;
        if ( ! $EE) $EE = get_instance();
        return $EE;
    }
} 
 
/* End of file conf.module.php */
/* Location: /system/expressionengine/third_party/module/config/conf.module.php */