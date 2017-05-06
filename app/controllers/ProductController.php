<?php

class ProductController extends Controller {

	public function index() {
		$proizvodi = ProductModel::getAll();
		$this->set('products', $proizvodi);
	}

	public function view($id) {
		$proizvod = ProductModel::getById($id);
		$this->set('product', $proizvod);
	}

}