<?php
return [
    	[
            'Pattern'    => '|^login/?|',
            'Controller' => 'Main',
            'Method'     => 'login'
	],
        [
            'Pattern'    => '|^logout/?|',
            'Controller' => 'Main',
            'Method'     => 'logout'
	],
        [
            'Pattern'    => '|^admin/proizvodi/?$|',
            'Controller' => 'AdminProduct',
            'Method'     => 'index'
	],
        [
            'Pattern'    => '|^admin/proizvodi/add?$|',
            'Controller' => 'AdminProduct',
            'Method'     => 'add'
	],
        [
            'Pattern'    => '|^admin/proizvodi/edit/([0-9]+)/?$|',
            'Controller' => 'AdminProduct',
            'Method'     => 'edit'
	],
        [
            'Pattern'    => '|^admin/proizvodi/delete/([0-9]+)/?$|',
            'Controller' => 'AdminProduct',
            'Method'     => 'delete'
	],
	[
            'Pattern'    => '|^proizvodi/?|',
            'Controller' => 'Product',
            'Method'     => 'index'
	],
        [
            'Pattern'    => '|^admin/kategorije/add?$|',
            'Controller' => 'AdminCategory',
            'Method'     => 'add'
	],
        [
            'Pattern'    => '|^admin/kategorije/edit/([0-9]+)/?$|',
            'Controller' => 'AdminCategory',
            'Method'     => 'edit'
	],
	[
            'Pattern'    => '|^admin/kategorije/?|',
            'Controller' => 'AdminCategory',
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
        
        [
            'Pattern'    => '|^category/([a-z0-9\-]+)/?$|',
            'Controller' => 'Main',
            'Method'     => 'listByCategory'
	],

	[ // Fallback
            'Pattern'    => '|^.*$|',
            'Controller' => 'Main',
            'Method'     => 'index'
	]
];
