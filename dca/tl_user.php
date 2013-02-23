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

/**
 * Table tl_user
 */

// Palettes
$GLOBALS['TL_DCA']['tl_user']['palettes']['login']            = $GLOBALS['TL_DCA']['tl_user']['palettes']['login'].';{pc_flattr_legend},pc_flattr_username,pc_flattr_button,pc_flattr_popout';
$GLOBALS['TL_DCA']['tl_user']['palettes']['admin']            = $GLOBALS['TL_DCA']['tl_user']['palettes']['admin'].';{pc_flattr_legend},pc_flattr_username,pc_flattr_button,pc_flattr_popout';
$GLOBALS['TL_DCA']['tl_user']['palettes']['default']            = $GLOBALS['TL_DCA']['tl_user']['palettes']['default'].';{pc_flattr_legend},pc_flattr_username,pc_flattr_button,pc_flattr_popout';
$GLOBALS['TL_DCA']['tl_user']['palettes']['group']            = $GLOBALS['TL_DCA']['tl_user']['palettes']['group'].';{pc_flattr_legend},pc_flattr_username,pc_flattr_button,pc_flattr_popout';
$GLOBALS['TL_DCA']['tl_user']['palettes']['extend']            = $GLOBALS['TL_DCA']['tl_user']['palettes']['extend'].';{pc_flattr_legend},pc_flattr_username,pc_flattr_button,pc_flattr_popout';
$GLOBALS['TL_DCA']['tl_user']['palettes']['custom']            = $GLOBALS['TL_DCA']['tl_user']['palettes']['custom'].';{pc_flattr_legend},pc_flattr_username,pc_flattr_button,pc_flattr_popout';

// Fields
$GLOBALS['TL_DCA']['tl_user']['fields']['pc_flattr_username'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_user']['pc_flattr_username'],
    'sql'           => "varchar(255) NOT NULL default ''",
    'inputType'     => 'text',
    'exclude'       => true,
    'eval'          => array('mandatory' => false, 'maxlength' => 255)
);
$GLOBALS['TL_DCA']['tl_user']['fields']['pc_flattr_button'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_user']['pc_flattr_button'],
    'inputType'     => 'checkbox',
    'exclude'       => true,
    'sorting'       => true,
    'flag'          => 11,
    'search'        => false,
    'eval'          => array('tl_class' => 'w50'),
    'sql'           => "tinyint(1) unsigned NOT NULL default '0'"
);

$GLOBALS['TL_DCA']['tl_user']['fields']['pc_flattr_popout'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_user']['pc_flattr_popout'],
    'inputType'     => 'checkbox',
    'exclude'       => true,
    'sorting'       => true,
    'flag'          => 11,
    'search'        => false,
    'eval'          => array('tl_class' => 'w50'),
    'sql'           => "tinyint(1) unsigned NOT NULL default '0'"
);


?>
