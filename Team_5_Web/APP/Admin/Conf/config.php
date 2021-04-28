<?php
return array(
	//'Configuration item'=>'Configuration value'
	'TMPL_PARSE_STRING'  =>array(
		'__JS__'     	=> __ROOT__ . '/Public/Styles/js', // Add new JS library path replace rules
		'__CSS__'     	=> __ROOT__ . '/Public/Styles/css', // Add new css librarty path replace rules
		'__IMG__' 		=> __ROOT__ . '/Public/Images', // Aadd new image path replace rules
		'__PLUGINS__' 		=> __ROOT__ . '/Public/Pugins', //Add new plugins replace rules
	),
	'LAYOUT_ON'			=> false,
	'SHOW_PAGE_TRACE'	=> true,
	// 'DEFAULT_MODULE'    => 'Admin',
);