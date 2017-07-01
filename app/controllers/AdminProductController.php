<?php
include 'sys/AdminController.php';
/**
 * Klasa kontrolera admin panela aplikacije za rad sa lokacijama
 */
class AdminProductController extends AdminController {
    /**
     * Indeks metod admin kontrolera za rad sa proizvodima. Prikazuje spisak svih proizvoda.
     */
    public function index() {
        $this->set('products', ProductModel::getAll());
    }
    
    /**
     * Ovaj metod prikazuje forular za dodavanje ili vrsi dodavanje ako su podaci poslati HTTP POST metodom
     * @return void
     */
    public function add () {
        
        if(!$_POST) return;
        $name = filter_input(INPUT_POST, 'name');
        $short_text = filter_input(INPUT_POST, 'short_text');
        $long_text = filter_input(INPUT_POST, 'long_text');
        $product_id = filter_input(INPUT_POST, 'product_id', FILTER_SANITIZE_NUMBER_INT);
        $amount = filter_input(INPUT_POST, 'amount', FILTER_SANITIZE_NUMBER_INT);
        $prikaz_sata = filter_input(INPUT_POST, 'prikaz_sata');
        
        $res = ProductModel::add($name, $short_text, $long_text, $prikaz_sata, $amount);
        if ($res == 1) {
            Misc::redirect('admin/proizvodi/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u bazu podataka.');
        }
    }
    
    /** 
     * Ovaj metod prikazuje forular za izmenu ili vrsi izmenu ako su podaci poslati HTTP POST metodom
     * @return void
     */
    public function edit ($id) {
        
        $product = ProductModel::getById($id);
        
        if (!$product) {
            Misc::redirect('admin/proizvodi/');
        }
    
        $this->set('product', $product);
        if(!$_POST) return;
        
        $name = filter_input(INPUT_POST, 'name');
        $short_text = filter_input(INPUT_POST, 'short_text');
        $long_text = filter_input(INPUT_POST, 'long_text');
        $cena = filter_input(INPUT_POST, 'cena');
        $prikaz_sata = filter_input(INPUT_POST, 'prikaz_sata');
        
        $res = ProductModel::edit($name, $short_text, $long_text, $prikaz_sata, $cena, $id);
        
        if ($res) {
            Misc::redirect('admin/proizvodi/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom izmene podataka o proizvodu.');
        }
    }
}
