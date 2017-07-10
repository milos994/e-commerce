<?php
/**
 * Klasa Main kontrolera.
 */
class MainController extends Controller {
    
    /**
     * Indeks metod Main kontrolera.
     */
    function index() {
        $listaProizvoda = AdminProductModel::getAll();
        $this->set('products', $listaProizvoda);
        $listaKategorija = AdminCategoryModel::getAll();
        $this->set('kategorije', $listaKategorija);
    }
    
    /**
     * Login metod Main kontrolera koji vrsi logovanje korisnika na ecommerc.
     * @return boolean
     */
    public function login() {
        if ($_POST) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');

            if (!preg_match('/^[a-z0-9]{4,}$/', $username) or ! preg_match('/^[a-z0-9]{4,}$/', $password)) {
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
    
    /**
     * Logout metod Main kotnrolera koji vrsi logout korisnika sa ecommerc-a.
     */
    public function logout() {
        Session::end();
        Misc::redirect('login');
    }
    
    /**
     * Register metod Main kotrolera koji vrsi registrovanje korisnika na
     *  ecommerc.
     */
    public function register() {
        $name = filter_input(INPUT_POST, 'name');
        $surname = filter_input(INPUT_POST, 'surname');
        $email = filter_input(INPUT_POST, 'email');
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $ip = filter_input(INPUT_SERVER, 'REMOTE_ADDR', FILTER_FLAG_IPV4);
        if (preg_match('/^[A-Z][a-z]+/', $name) == 1 and preg_match('/^[A-Z][a-z]+(-[A-Z][a-z]+)*/', $surname) == 1
                and preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/', $email) == 1
                and preg_match('/^[a-z0-9]{4,}$/', $username) == 1 and preg_match('/^[a-z0-9]{4,}$/', $password) == 1) {

            $passwordhash = hash('sha512', $password . Configuration::USER_SALT);
            $rezultat = UserModel::getByUsernameAndEmail($username, $email);
            if ($rezultat == null) {
                $res = UserModel::add($name, $surname, $email, $username, $passwordhash, $ip);
                if ($res) {
                    Misc::redirect('login');
                } else {
                    $this->set('message', 'Korisnik nije unet');
                }
            } else {
                $this->set('message', 'Korisnik sa ovim emailom i usenamemom vec postoji');
            }
        } else {
            $this->set('message', 'Niste uneli ispravne podatke.');
        }
    }

}
