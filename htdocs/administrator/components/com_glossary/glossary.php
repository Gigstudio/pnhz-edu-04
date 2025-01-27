<?php
/**
 * @version     1.0.0
 * @package     com_glossary
 * @copyright   Copyright (C) 2013. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @author      salauat <sala.sdu@gmail.com> - http://pnhz.kz
 */


// no direct access
defined('_JEXEC') or die;

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_glossary')) 
{
	throw new Exception(JText::_('JERROR_ALERTNOAUTHOR'));
}

// Include dependancies
jimport('joomla.application.component.controller');

$controller	= JControllerLegacy::getInstance('Glossary');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
