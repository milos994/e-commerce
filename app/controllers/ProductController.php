<?php

class ProductController extends AdminController {
    
    
    public function index() {
        $this->set('kategorije', AdminCategoryModel::getAll());
    }

    public function view($id) {
        $proizvod = ProductModel::getById($id);
        $this->set('products', $proizvod);
    }
    public function add() {
        $proizvod = ProductModel::getById($id);
        $this->set('products', $proizvod);
    }
    public function delete($id) {
        $proizvod = ProductModel::getById($id);
        $this->set('products', $proizvod);
    }
    public function edit($id) {
        $proizvod = ProductModel::getById($id);
        $this->set('products', $proizvod);
    }
    

}