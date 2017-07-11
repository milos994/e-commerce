<?php
/**
 * Klasa kontrolera za rad sa korpama.
 */
class CartProductController extends Controller {
    
    public function index() {
        $this->set('title', 'Korpa');
        
        $user_id = Session::get('user_id');
        $proizvodi_u_korpi = CartProductModel::cartGetAll($user_id);
        
        $this->set('proizvodi', $proizvodi_u_korpi);
    }
    
    /**
     * Metod CartProduct kontrolera koja dodaje proizvod u korpu.
     */
    public function add() {
        $user_id = Session::get('user_id');
        $korpa = CartProductModel::cartGetAll($user_id);
        $this->set('korpa', $korpa);
        if (isset($_POST['proizvod'])) {
            $product_id = filter_input(INPUT_POST, 'proizvod');
            $user_id = Session::get('user_id');

            $res = CartProductModel::add($product_id, $user_id);
            if ($res == 1) {
                Misc::redirect('cart/');
            } else {
                $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u korpu.');
            }
        } else {

            $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u korpu.');
        }
    }
    
    /**
     * Metod CartProduct kontrolera koja brise proizvod iz korpe.
     */
    public function remove() {
        
        $user_id = Session::get('user_id');
        $cart_id = filter_input(INPUT_POST, 'cart_id');
        $res = CartProductModel::remove($cart_id, $user_id);
        
        if($res) {
            Misc::redirect('');
        } else {
            $this->set('message', 'Doslo je do greske prilikom praznjenja korpe.');
        }
        
    }
    
    public function buy() {
        
        
        
    }
}
