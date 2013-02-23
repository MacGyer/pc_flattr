<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package Pc_flattr
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */


/**
 * Register the namespaces
 */
ClassLoader::addNamespaces(array
(
	'Flattr',
));


/**
 * Register the classes
 */
ClassLoader::addClasses(array
(
	// Classes
	'Flattr\pcFlattrButton'          => 'system/modules/pc_flattr/classes/pcFlattrButton.php',

	// Modules
	'Flattr\ModuleEventReaderFlattr' => 'system/modules/pc_flattr/modules/ModuleEventReaderFlattr.php',
));


/**
 * Register the templates
 */
TemplateLoader::addFiles(array
(
	'event_pc_flattr_full'   => 'system/modules/pc_flattr/templates',
	'event_pc_flattr_list'   => 'system/modules/pc_flattr/templates',
	'event_pc_flattr_teaser' => 'system/modules/pc_flattr/templates',
	'mod_article'            => 'system/modules/pc_flattr/templates',
	'mod_event_pc_flattr'    => 'system/modules/pc_flattr/templates',
	'news_pc_flattr_full'    => 'system/modules/pc_flattr/templates',
	'news_pc_flattr_latest'  => 'system/modules/pc_flattr/templates',
	'news_pc_flattr_short'   => 'system/modules/pc_flattr/templates',
));
