<?php

return array(
	'defaultController' => 'Home',

	// Just put null value if you has enable .htaccess file
	'indexFile' => '',

	'module' => array(
		'path' => GEAR,
		'domainMapping' => array(),
	),

	'vendor' => array(
		'path' => GEAR.'Vendors/'
	),

	'alias' => array(
		'controller' => array(
			'class' => 'Home',
			'method' => 'post_permalink'
		),
		'method' => 'alias',
	),
);
