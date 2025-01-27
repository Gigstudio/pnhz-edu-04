<?php
/*
glossary  плагин.
Версия pro 2013.09.25
Salauat
Copyright (C) 2013 agregator
Лицензия GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
Официальный сайт http://agregator.kz
*/
 
 
//защита от прямого доступа
defined('_JEXEC') or die;
 
/*
Класс плагина к чему он пренадлежит в данном случае к группе расширений.
Так же он может принадлежать и к другим группам, к примеру редакторам, или контенту. Тогда нужно указывать
не Extension а Editor и так далее. Так же можно создать и свою отдельную группу.
 */
class plgContentGlossary extends JPlugin {
//Конструктор класса
  public function __construct(& $subject, $config)
  {
    parent::__construct($subject, $config);
    $this->loadLanguage();
  }
 
/*
А это непосредственно работа самого плагина! Мы описываем функцию которую впоследствии вызовем в нужном нам месте.  
*/
 
//Вывод в начале статьи, функции как читали в статье могут быть своими так и
//родными событиями onContentAfterDelete, onContentAfterDisplay, onContentAfterSave и.т.д
//В данном случае мы выводим в начале статьи наш плагин.
  public function onContentBeforeDisplay($context, &$row, &$params, $page=0) {
//Выводим перменную которая получит урл и title нашей страницы.  
	$document = JFactory::getDocument();

//Запрет вывода плагина в блоге категорий, это нужно для того что бы плагин не дублировался
	if(JRequest::getVar('view') != ('category')) {
	//Декодируем ссылку
    $variable = JFactory::getURI();
		$uri = &$variable;
		urlencode($uri);
		
		//return $document->title;
	}
  }
}

?>