<?php
/**
 * Klasa kontrolera za rad sa korpama.
 */
class CartProductController extends Controller {
    /**
     * Klasa CartProduct kontrolera koja dodaje proizvod u korpu.
     */
    public function add() {
        $korpa = CartProductModel::getAll();
        $this->set('korpa', $korpa);
        if ($_POST) {
            $product_id = filter_input(INPUT_POST, 'proizvod');

            $res = CartProductModel::add($product_id);
            if ($res == 1) {
                Misc::redirect('admin/proizvodi/');
            } else {
                $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u korpu.');
            }
        } else {

            $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u korpu.');
        }
    }
}
