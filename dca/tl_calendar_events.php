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
 * Table tl_calendar_events
 */

// Palettes
$GLOBALS['TL_DCA']['tl_calendar_events']['palettes']['__selector__'][]          = 'pc_flattr_active';
$GLOBALS['TL_DCA']['tl_calendar_events']['palettes']['default']                 = str_replace('{expert_legend:hide}', '{pc_flattr_legend},pc_flattr_active;{expert_legend:hide}', $GLOBALS['TL_DCA']['tl_calendar_events']['palettes']['default']);

// Sub Palettes
$GLOBALS['TL_DCA']['tl_calendar_events']['subpalettes']['pc_flattr_active']   = 'pc_flattr_category,pc_flattr_tags,pc_flattr_hidden';

// Fields
$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['pc_flattr_active'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_calendar_events']['pc_flattr_active'],
    'exclude'       => true,
    'inputType'     => 'checkbox',
    'eval'          => array('submitOnChange' => true),
    'sql'           => "char(1) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['pc_flattr_category'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_calendar_events']['pc_flattr_category'],
    'inputType'     => 'select',
    'exclude'       => true,
    'sorting'       => true,
    'filter'        => true,
    'flag'          => 11,
    'search'        => true,
    'options'       => &$GLOBALS['TL_LANG']['tl_calendar_events']['pc_flattr_category_options'],
    'eval'          => array('mandatory' => true, 'tl_class' => 'w50', 'includeBlankOption' => true),
    'sql'           => "varchar(20) NOT NULL default ''"
);
$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['pc_flattr_tags'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_calendar_events']['pc_flattr_tags'],
    'inputType'     => 'text',
    'exclude'       => true,
    'search'        => true,
    'eval'          => array('mandatory' => false, 'tl_class' => 'w50', 'allowHtml' => false, 'doNotSaveEmpty' => true, 'maxlength' => 255),
    'sql'           => "varchar(255) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_calendar_events']['fields']['pc_flattr_hidden'] = array
(
    'label'         => &$GLOBALS['TL_LANG']['tl_calendar_events']['pc_flattr_hidden'],
    'exclude'       => true,
    'filter'        => true,
    'inputType'     => 'checkbox',
    'eval'          => array('tl_class' => 'w50'),
    'sql'           => "char(1) NOT NULL default ''"
);

?>
