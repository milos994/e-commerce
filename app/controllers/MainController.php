<?php
    include 'sys/Session.php';

session_start();
/*
 * Ovo je osnovni kontroler aplikacije koji se koristi za izvrsavanje 
 * zahteva upucenih prema podrazumevanim rutama koje poznaje vebsajt
 */
class MainController extends Controller {
    
    /*
     * Ovaj metod prepisuje podrazumevani index metod kontrolera i njegova 
     * uloga je da proveri da li postoji prijavljeni korisnik u sesiji.
     * Ako ne postoji, metod preusmerava posetioca na stranicu za odjavu.
     * Stranica za odjavu ce izvrsiti logout metod ovog kontrolera, koji ce 
     * na kraju, kada ocisti sesiju da preusmeri posetioca na login stranu.
     */
    
    
    function index() {
//        if (!Session::exists('user_id')) {
//            Misc::redirect('logout');
//        }
    }
    
    
    
    /*
     * Ovaj metod proverava da li postoje podaci za prijavu poslati HTTP POST
     * metodom, vrsi njihovu validaciju, proverava postojanje korisnika sa tim
     * pristupnim parametrima i u slucaju da sve provere prodju bez greske
     * metod kreira sesiju za korisnika i preusmerava korisnika na default rutu.
     * @return void Metod ne vraca nista, vec koristi return naredbu za prekid izvrsavanja u odredjenim situacijama
     */
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
        
        $category = ProductCategoryModel::getBySlug($categorySlug);
        
//        if(!$category) {
//            Misc::redirect('');
//        }
        
        $products = ProductCategoryModel::getProductsByProductCategoryId($category->product_category_id);
        $this->set('products', $products);
        
    }
    
}
