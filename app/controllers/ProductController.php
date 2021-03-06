<?php
/**
 * Klasa Product kotrolera.
 */
class ProductController extends Controller {
    
    /**
    * Indeks metod Product kontrolera za rad sa proizvodima koji prikazuje spisak
    * svih proizvoda korisnicima.
    */
    public function index() {
        $this->set('kategorije', AdminCategoryModel::getAll());
        $products = ProductModel::getAll();
        $this->set('products', $products);
    }
    
}