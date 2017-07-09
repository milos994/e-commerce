<?php

class ProductController extends AdminController {
    
    public function index() {
        $this->set('kategorije', AdminCategoryModel::getAll());
        $products = ProductModel::getAll();
        $this->set('products', $products);
    }
    
}