<?php
/**
 * @package     Joomla.Plugin
 * @subpackage  Editors-xtd.article
 *
 * @copyright   Copyright (C) 2005 - 2013 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Editor Glossary buton
 *
 * @package     PNHZ Plugin
 * @subpackage  Editors-xtd.addgloss
 * @since       1.5
 */
class plgButtonAddgloss extends JPlugin
{
	/**
	 * Constructor
	 *
	 * @access      protected
	 * @param       object  $subject The object to observe
	 * @param       array   $config  An array that holds the plugin configuration
	 * @since       1.5
	 */
	public function __construct(& $subject, $config)
	{
		parent::__construct($subject, $config);
		$this->loadLanguage();
	}

	/**
	 * Display the button
	 *
	 * @return array A four element array of (article_id, article_title, category_id, object)
	 */
	public function onDisplay($name)
	{
		/*
		 * Javascript to insert the link
		 * View element calls jSelectArticle when an article is clicked
		 * jSelectArticle creates the link tag, sends it to the editor,
		 * and closes the select frame.
		 */
		$js = "
		function jSelectGloss(id, title, desc)
		{
			var tag = '<a class=\"hasTooltip\" href=\"index.php?Itemid=222&wid='+id+'&limit=300#collapse'+id+'\" target=\"_blank\" data-toggle=\"tooltip\" data-placement=\"right\" title=\"' + desc + '\">[?]</a>';
			jInsertEditorText(tag, '".$name."');
			SqueezeBox.close();
		}";

		$doc = JFactory::getDocument();
		$doc->addScriptDeclaration($js);

		JHtml::_('behavior.modal');

		/*
		 * Use the built-in element view to select the article.
		 * Currently uses blank class.
		 */
		$link = 'index.php?option=com_glossary&amp;layout=modal&amp;tmpl=component&amp;'.JSession::getFormToken().'=1&amp;limit=500';

		$button = new JObject;
		$button->modal = true;
		$button->link = $link;
		$button->text = 'Add glossary';
		$button->name = 'file-add';
		$button->options = "{handler: 'iframe', size: {x: 600, y: 500}}";

		return $button;
	}
}
