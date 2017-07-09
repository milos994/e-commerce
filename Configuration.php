<?php

abstract class Configuration {

	const DB_HOST = 'localhost';
	const DB_BASE = 'e-commerce';
	const DB_USER = 'root';
	const DB_PASS = '';

	const BASE_PATH = '/e-commerce/';
	const BASE_URL = 'http://localhost' . Configuration::BASE_PATH;
        
        const USER_SALT = 'dfgodfhgu54hy98yugobrglrthg98uyt9rhgu56uruyrufgjyt65uujfgjf56';
        
        const IMAGE_DATA_PATH = 'data/images/';
        
        const ITEMS_PER_PAGE = 5;
        

}

