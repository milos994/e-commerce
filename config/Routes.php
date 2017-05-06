<?php
return [
	[
		'Pattern'    => '|^proizvodi/?$|',
		'Controller' => 'Product',
		'Method'     => 'index'
	],
	[
		'Pattern'    => '|^proizvod/([0-9]+)/?$|',
		'Controller' => 'Product',
		'Method'     => 'view'
	],
	[
		'Pattern'    => '|^page/([a-z][a-z0-9\\-]{0,63})/?$|',
		'Controller' => 'Page',
		'Method'     => 'show'
	],


	[ // Fallback
		'Pattern'    => '|^.*$|',
		'Controller' => 'Main',
		'Method'     => 'index'
	]
];
