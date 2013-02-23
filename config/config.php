<?php

/**
 * Contao Open Source CMS
 * 
 * Copyright (C) 2005-2013 Leo Feyer
 * 
 * @package pc_flattr
 * @link    https://contao.org
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

if (!defined('TL_ROOT')) die('You can not access this file directly!');

/*
 * Frontend Modules
 */
$GLOBALS['FE_MOD']['events']['pc_flattr_eventreader'] = 'ModuleEventReaderFlattr';

/*
 * Hooks
 */
$GLOBALS['TL_JAVASCRIPT'][] = 'system/modules/pc_flattr/assets/js/flattr.js';
$GLOBALS['TL_HOOKS']['parseArticles'][] = array('pcFlattrButton', 'injectFlattrButtonIntoNews');
$GLOBALS['TL_HOOKS']['getArticle'][] = array('pcFlattrButton', 'injectFlattrButtonIntoArticle');
$GLOBALS['TL_HOOKS']['getAllEvents'][] = array('pcFlattrButton', 'injectFlattrButtonIntoEvent'); 

?>
