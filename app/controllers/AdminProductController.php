
<?php
/**
 * Klasa Admin kontrolera za rad sa proizvodima.
 */
class AdminProductController extends AdminController {
    
    /**
    * Indeks metod AdminProduct kontrolera za rad sa proizvodima koji prikazuje spisak
    * svih proizvoda.
    */
    public function index() {
        $proizvodi = AdminProductModel::getAll();
        $this->set('products', $proizvodi);
    }
    
    /**
     * Metod AdminProduct kotrolera koji prikazuje formular za dodavanje ili vrsi 
     * dodavanje proizvoda ako su podaci poslati HTTP POST metodom.
     * @return void
     */
    public function add() {
        $kategorije = AdminCategoryModel::getAll();
        $this->set('kategorije', $kategorije);
        if ($_POST) {
            $name = filter_input(INPUT_POST, 'name');
            $short_text = filter_input(INPUT_POST, 'kopis');
            $prikaz_sata = filter_input(INPUT_POST, 'prikaz_sata');
            $long_text = filter_input(INPUT_POST, 'dopis');
            $active = filter_input(INPUT_POST, 'active');
            $amount = filter_input(INPUT_POST, 'cena', FILTER_SANITIZE_NUMBER_INT);
            $product_category_id = filter_input(INPUT_POST, 'kategorija');

            if (preg_match('[A-Za-z 0-9.,]', $name) == 1 and preg_match('[A-Za-z 0-9.,]', $short_text) == 1
                    and preg_match('[A-Za-z 0-9.,]', $long_text) == 1
                    and preg_match('/^[0-9]{1,4}$/', $amount) == 1) {
                $this->set('message', 'Neispravno ste uneli ime kategorije ili slug.');
                return;
            }

            $res = AdminProductModel::add($name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id);
            
            $last_id = AdminProductModel::getLastInsertID();
            $a = $last_id->AUTO_INCREMENT;
            if (isset($_FILES['fileToUpload'])) {
                $file_name = $_FILES['fileToUpload']['name'];
                $file_tmp = $_FILES['fileToUpload']['tmp_name'];

                list($width, $height) = getimagesize($file_tmp);
                if ($width === 600) {
                    $w = true;
                }
                if ($height === 600) {
                    $h = true;
                }

                $file_name = $a . '.jpg';
            }
            $ext = pathinfo($file_name, PATHINFO_EXTENSION);
            
            
            if ($res) {
                move_uploaded_file($file_tmp, "assets/img/" . $file_name);
                Misc::redirect('admin/proizvodi/');
            } else {
                $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u bazu podataka.');
            }
        } else {

            $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u bazu podataka.');
        }
    }
    
    
    /**
     * Metod AdminProduct kotrolera koji prikazuje formular za izmenu ili vrsi 
     * izmenu proizvoda ako su podaci poslati HTTP POST metodom.
     * @param int $product_id
     * @return void
     */
    public function edit($product_id) {
        $kategorije = AdminCategoryModel::getAll();
        $this->set('kategorije', $kategorije);
        $proizvod = AdminProductModel::getById($product_id);
        $this->set('proizvod', $proizvod);

        $name = filter_input(INPUT_POST, 'name');
        $short_text = filter_input(INPUT_POST, 'short_text');
        $long_text = filter_input(INPUT_POST, 'long_text');
        $amount = filter_input(INPUT_POST, 'amount');
        $prikaz_sata = filter_input(INPUT_POST, 'prikaz_sata');
        $active = filter_input(INPUT_POST, 'active');
        $product_category_id = filter_input(INPUT_POST, 'kategorija');

        if (preg_match('[A-Za-z 0-9.,]', $name) == 1 and preg_match('[A-Za-z 0-9.,]', $short_text) == 1
                and preg_match('[A-Za-z 0-9.,]', $long_text) == 1
                and preg_match('/^[0-9]{1,4}$/', $amount) == 1) {
            $this->set('message', 'Neispravno ste uneli ime kategorije ili slug.');
            return;
        }

        $res = AdminProductModel::edit($name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id, $product_id);

        if ($res) {
            Misc::redirect('admin/proizvodi/');
        } else {
            $this->set('message', 'Doslo je do greske prilikom izmene podataka o proizvodu.');
        }
    }
    
    /**
     * Metod AdminProduct kotrolera koji prikazuje formular za brisanje ili vrsi 
     * brisanje proizvoda ako su podaci poslati HTTP POST metodom.
     * @param int $id
     */
    public function delete($id) {
        $proizvod = AdminProductModel::getById($id);
        $this->set('product', $proizvod);
        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);
            if ($confirmed == 1) {
                $res = AdminProductModel::delete($id);
                if ($res) {
                    Misc::redirect('admin/proizvodi/');
                } else {
                    $this->setData('poruka', "Proizvod je uklonjen!");
                }
            }
        }
    }

}

