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

namespace Flattr;

/**
 * Provides all custom methods triggered by Hooks from contao core modules.
 *
 * @author pluspunkt coding
 * @link http://www.pluspunkt-coding.de
 * @license http://creativecommons.org/licenses/by-sa/3.0/de/
 * @version 1.0
 * 
 */
class pcFlattrButton
{
    /**
     *
     * Integrates the Flattr relevant data into the templates used by contao news modules.
     * Triggered by Hook parseAricles()
     * 
     * @param object $objTemplate
     * @param object $objArticle
     * @param object $objModule
     * @author pluspunkt coding
     * @version 1.0
     * 
     */
    public function injectFlattrButtonIntoNews($objTemplate, $objArticle, \Contao\ModuleNews $objModule)
    {
        // fetch Flattr Data from tl_user corresponding to author        
        $arrUser = $this->getUserById($objArticle['author']);
        $objTemplate->pc_flattr = $arrUser;
        
        // generate rel-String for XHTML Templates
        $objTemplate->pc_flattr_rel = $this->buildRelString($arrUser, $objArticle['pc_flattr_category'], $objArticle['pc_flattr_tags'], $objArticle['pc_flattr_hidden']);
    }
    
    /**
     *
     * Integrates the Flattr relevant data into the article data used by contao article modules.
     * Triggered by Hook getArticle()
     * 
     * @param object $objArticle
     * @author pluspunkt coding
     * @version 1.0
     * 
     */
    public function injectFlattrButtonIntoArticle($objArticle)
    {
        // fetch Flattr Data from tl_user corresponding to author        
        $arrUser = $this->getUserById($objArticle->author);
        $objArticle->pc_flattr = $arrUser;
        
        // generate rel-String for XHTML Templates
        $objArticle->pc_flattr_rel = $this->buildRelString($arrUser, $objArticle->pc_flattr_category, $objArticle->pc_flattr_tags, $objArticle->pc_flattr_hidden);
    }
    
    /**
     *
     * Integrates the Flattr relevant data into the event data used by contao calendar modules.
     * Triggered by Hook getAllEvents()
     *  
     * @param array $arrEvents
     * @param array $arrCalendars
     * @param int $intStart
     * @param int $intEnd
     * @param object $objModule
     * @return array
     * @author pluspunkt coding
     * @version 1.0
     * 
     */
    public function injectFlattrButtonIntoEvent($arrEvents, $arrCalendars, $intStart, $intEnd, \Contao\Module $objModule) 
    { 
        foreach($arrEvents as $k => &$e)
        {
            foreach($e as &$events)
            {
                foreach($events as &$arrEvent)
                {
                    // fetch Flattr Data from tl_user corresponding to author
                    $arrUser = $this->getUserById($arrEvent['author']);
                    $arrEvent['pc_flattr'] = $arrUser;
                    
                    // generate rel-String for XHTML Templates
                    $arrEvent['pc_flattr_rel'] = $this->buildRelString($arrUser, $arrEvent['pc_flattr_category'], $arrEvent['pc_flattr_tags'], $arrEvent['pc_flattr_hidden']);
                }
            }
        }
        
        return $arrEvents; 
    } 
    
    /**
     * Builds the value for the rel attribute used by Flattr to identify the content when page is delivered as XHTML.
     * 
     * @param array $arrUser
     * @param string $strCategory
     * @param string $strTags
     * @param int $intHidden
     * @return string
     * @author pluspunkt coding
     * @version 1.0
     * 
     */
    private function buildRelString($arrUser = array(), $strCategory = null, $strTags = null, $intHidden = null)
    {
        $str = 'flattr;';
        $str .= 'uid:'.$arrUser['pc_flattr_username'].';';
        if(isset($strCategory))
        {
            $str .= 'category:'.$strCategory.';';
        }
        if(!empty($strTags))
        {
            $str .= 'tags:'.$strTags.';';
        }
        $str .= 'popout:'.$arrUser['pc_flattr_popout'].';';
        if($arrUser['pc_flattr_button'])
        {
            $str .= 'button:compact;';
        }
        if($intHidden == 1)
        {
            $str .= 'hidden:1;';
        }
        
        return $str;
    }
    
    /**
     * Retrieve Flattr specific data from backend user table.
     * 
     * @param int $intId
     * @return array 
     * @author pluspunkt coding
     * @version 1.0
     * 
     */
    private function getUserById($intId = null)
    {
        $arrUser = array();
        
        $objUser = \Contao\Database::getInstance()
                    ->prepare(
                        'SELECT pc_flattr_username, pc_flattr_button, pc_flattr_popout
                        FROM tl_user
                        WHERE id = ?'							
                    )
                    ->execute($intId);
        $arrUser = $objUser->fetchAssoc();
        
        return $arrUser;
    }
}

?>
