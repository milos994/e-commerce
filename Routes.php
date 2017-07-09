<?php

return [

    [
        'Pattern' => '|^login/?$|',
        'Controller' => 'Main',
        'Method' => 'login'
    ],
    [
        'Pattern' => '|^logout/?$|',
        'Controller' => 'Main',
        'Method' => 'logout'
    ],
    [
        'Pattern' => '|^registracija/?$|',
        'Controller' => 'Main',
        'Method' => 'register'
    ],
    [
        'Pattern' => '|^/?$|',
        'Controller' => 'Main',
        'Method' => 'index'
    ],
    [
        'Pattern' => '|^proizvodi/?$|',
        'Controller' => 'Product',
        'Method' => 'index'
    ],
    [
        'Pattern' => '|^admin/?$|',
        'Controller' => 'AdminMain',
        'Method' => 'login'
    ],
    [
        'Pattern' => '|^admin/proizvodi/?$|',
        'Controller' => 'AdminProduct',
        'Method' => 'index'
    ],
    [
        'Pattern' => '|^admin/proizvodi/add?$|',
        'Controller' => 'AdminProduct',
        'Method' => 'add'
    ],
    [
        'Pattern' => '|^admin/proizvodi/edit/([0-9]+)/?$|',
        'Controller' => 'AdminProduct',
        'Method' => 'edit'
    ],
    [
        'Pattern' => '|^admin/proizvodi/delete/([0-9]+)/?$|',
        'Controller' => 'AdminProduct',
        'Method' => 'delete'
    ],
    [
        'Pattern' => '|^admin/kategorije/?$|',
        'Controller' => 'AdminCategory',
        'Method' => 'index'
    ],
    [
        'Pattern' => '|^admin/kategorije/add?$|',
        'Controller' => 'AdminCategory',
        'Method' => 'add'
    ],
    [
        'Pattern' => '|^admin/kategorije/edit/([0-9]+)/?$|',
        'Controller' => 'AdminCategory',
        'Method' => 'edit'
    ],
    [
        'Pattern' => '|^admin/kategorije/delete/([0-9]+)/?$|',
        'Controller' => 'AdminCategory',
        'Method' => 'delete'
    ],
    [
        'Pattern' => '|^admin/korisnici?$|',
        'Controller' => 'AdminMain',
        'Method' => 'index'
    ],
    [
        'Pattern' => '|^admin/korisnici/delete/([0-9]+)/?$|',
        'Controller' => 'AdminMain',
        'Method' => 'delete'
    ],
    [
        'Pattern' => '|^proizvodi/([0-9]+)/?$|',
        'Controller' => 'Product',
        'Method' => 'view'
    ],
    [
        'Pattern' => '|^adminlogout/?$|',
        'Controller' => 'AdminMain',
        'Method' => 'logout'
    ]
];
