<?php

/**
 * news_categories extension for Contao Open Source CMS
 *
 * Copyright (C) 2013 Codefog Ltd
 *
 * @package news_categories
 * @author  Webcontext <http://webcontext.com>
 * @author  Codefog Ltd <info@codefog.pl>
 * @author  Kamil Kuzminski <kamil.kuzminski@codefog.pl>
 * @license LGPL
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['__selector__'][] = 'news_customCategories';
$GLOBALS['TL_DCA']['tl_module']['palettes']['newscategories'] = '{title_legend},name,headline,type;{config_legend},news_archives,news_resetCategories,news_customCategories;{redirect_legend:hide},jumpTo;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['subpalettes']['news_customCategories'] = 'news_categories';


/**
 * Extend tl_module palettes
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['newslist'] = str_replace('news_archives,', 'news_archives,news_filterCategories,news_filterDefault,news_filterPreserve,', $GLOBALS['TL_DCA']['tl_module']['palettes']['newslist']);
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsarchive'] = str_replace('news_archives,', 'news_archives,news_filterCategories,news_filterDefault,news_filterPreserve,', $GLOBALS['TL_DCA']['tl_module']['palettes']['newsarchive']);
$GLOBALS['TL_DCA']['tl_module']['palettes']['newsmenu'] = str_replace('news_archives,', 'news_archives,news_filterCategories,news_filterDefault,news_filterPreserve,', $GLOBALS['TL_DCA']['tl_module']['palettes']['newsmenu']);


/**
 * Add new fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['news_categories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_categories'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_news_category.title',
	'eval'                    => array('mandatory'=>true, 'multiple'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_customCategories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_customCategories'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'eval'                    => array('submitOnChange'=>true, 'tl_class'=>'clr'),
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_filterCategories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filterCategories'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_filterDefault'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filterDefault'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'foreignKey'              => 'tl_news_category.title',
	'eval'                    => array('multiple'=>true),
	'sql'                     => "blob NULL"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_filterPreserve'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_filterPreserve'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['news_resetCategories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['news_resetCategories'],
	'exclude'                 => true,
	'inputType'               => 'checkbox',
	'sql'                     => "char(1) NOT NULL default ''"
);
