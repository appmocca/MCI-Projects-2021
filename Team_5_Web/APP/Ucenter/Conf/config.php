<?php
return array(
	//'Configuration item'=>'Configuration value'
	'TMPL_PARSE_STRING'  =>array(
		'__JS__'     	=> __ROOT__ . '/Public/Styles/js', // Add a new JS class library path replacement rule
		'__CSS__'     	=> __ROOT__ . '/Public/Styles/css', // Add a new CSS class library path replacement rule 
		'__IMG__' 		=> __ROOT__ . '/Public/Images', // Add a new upload path replacement rule
		'__PLUGINS__' 		=> __ROOT__ . '/Public/Plugins', // Add new plug-in replacement rules
	),
	'LAYOUT_ON'			=> false,
	'SHOW_PAGE_TRACE'	=> true,
);