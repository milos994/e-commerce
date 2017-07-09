<?php

class MainController extends Controller {
   
    function index() {

        $listaProizvoda = ProductModel::getAll();
        $this->set('proizvodi', $listaProizvoda);

        $listaKategorija = AdminCategoryModel::getAll();
        $this->set('kategorije', $listaKategorija);
    }
 
    public function login() {

        if ($_POST) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');

            if (!preg_match('/^[a-z0-9]{4,}$/', $username) or !preg_match('/^[a-z0-9]{4,}$/', $password)) {
                $this->set('message', 'Neispravno ste uneli korisničko ime ili lozinku.');
                return;
            }
            $passwordHash = hash('sha512', $password . Configuration::USER_SALT);
            $user = UserModel::getByUsernameAndPasswordHash($username, $passwordHash);

            if (!$user) {
                $this->set('message', 'Korisničko ime ili lozinka nisu dobro uneti ili korisnik nije aktivan.');
                return;
            }

            Session::set('user_id', $user->user_id);
            Session::set('username', $username);
            Session::set('user_ip', filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_FLAG_IPV4));
            Session::set('user_login', filter_input(INPUT_SERVER, 'HTTp_USER_AGENT'));

            Misc::redirect('');
        }
    }

    public function logout() {
        Session::end();
        Misc::redirect('login');
    }
    
    
    
    /*
     * metod koji salje view-u spisak proizvoda za kategoriju za datum slug
     * @param type $categorySlug
     */
    function listByCategory($categorySlug) {
        
        $category = AdminCategoryModel::getBySlug($categorySlug);
        
//        if(!$category) {
//            Misc::redirect('');
//        }
        
        $products = AdminCategoryModel::getProductsByProductCategoryId($category->product_category_id);
        $this->set('products', $products);
        
    }
    
    public function register () {
        
        $name = filter_input(INPUT_POST, 'name');
        $surname = filter_input(INPUT_POST, 'surname');
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_FLAG_IPV4);
        $passwordhash = hash('sha512', $password . Configuration::USER_SALT);
        $rezultat = UserModel::getByUsernameAndEmail($username, $email);
        if($rezultat == null){
            $res = UserModel::add($name, $surname, $email, $username, $passwordhash, $ip);
            if($res){
                Misc::redirect('login');
            }else{
                 $this->set('message', 'Korisnik nije unet');
            }
            
        }else{
            $this->set('message', 'Korisnik sa ovim emailom i usenamemom vec postoji');
        }
        
    }
    
}
