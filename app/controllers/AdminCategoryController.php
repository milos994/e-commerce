<?php
include 'sys/AdminController.php';
/**
 * Klasa kontrolera admin panela aplikacije za rad sa kategorijama satova
 */
class AdminCategoryController extends AdminController {
    /**
     * Indeks metod admin kontrolera za rad sa kategorijama. Prikazuje spisak svih kategorija.
     */
    public function index() {
        $this->set('kategorije', ProductCategoryModel::getAll());
    }
    
    /**
     * Ovaj metod prikazuje forular za dodavanje ili vrsi dodavanje ako su podaci poslati HTTP POST metodom
     * @return void
     */
    public function add () {
        
        if(!$_POST) return;
        $name = filter_input(INPUT_POST, 'name');
                
        $res = ProductCategoryModel::add($name);
        
        if (is_int($res)) {
            Misc::redirect('admin/kategorije/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom dodavanja kategorije u bazu podataka.');
        }
    }
    
    /** 
     * Ovaj metod prikazuje forular za izmenu ili vrsi izmenu ako su podaci poslati HTTP POST metodom
     * @return void
     */
    public function edit ($id) {
        
        $category = ProductCategoryModel::getById($id);
        
        if (!$category) {
            Misc::redirect('admin/kategorije/');
        }
        $this->set('category', $category);
    
        if(!$_POST) return;
        
        $id = $category->product_category_id;
        $name = filter_input(INPUT_POST, 'name');
                
        $res = ProductCategoryModel::edit($id, $name);
       
        if ($res) {
            Misc::redirect('admin/kategorije/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom izmene podataka o kategoriji.');
        }
    }
}


