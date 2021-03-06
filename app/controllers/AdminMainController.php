<?php
/**
 * Klasa kontrolera AdminMain panela. 
 */
class AdminMainController extends Controller {
    
    /**
     * Indeks metod AdminMain kontrolera.
     */
    public function index() {
        $korisnici = UserModel::getAll();
        $this->set('korisnici', $korisnici);
    }
    
    /**
     * Delete metod AdminMain kotrolera koji brise korisnika iz baze.
     * @param int $user_id
     */
    public function delete($user_id) {

        $user = UserModel::getById($user_id);
        $this->set('user', $user);

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

            if ($confirmed == 1) {
                $res = UserModel::delete($user_id);
                if ($res) {
                    Misc::redirect('admin/korisnici');
                } else {
                    $this->setData('message', "Korisnik je uspeŠno obrisan!");
                }
            }
        }
    }
    
    /**
     * Login metod AdminMain kontrolera koji vrsi logovanje admin korisnika.
     * @return boolean
     */
    public function login() {
        if (!empty($_POST)) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');
            
            if (!preg_match('/^[a-z0-9]{4,}$/', $username) or !preg_match('/^[a-z0-9]{4,}$/', $password)) {
                $this->set('message', 'Neispravno ste uneli korisničko ime ili lozinku.');
                return;
            }
            
            $passwordHash = hash('sha512', $password . Configuration::USER_SALT);

            $admin = AdminModel::getByUsernameAndPasswordHash($username, $passwordHash);
            if ($admin) {
                Session::set('admin_id', $admin->admin_id);
                Session::set('username', $username);
                Misc::redirect('admin/proizvodi/');
            } else {
                $this->set('message', 'Korisničko ime ili lozinka nisu dobro uneti.');
            }
        }
    }
    
    /**
     * Logout metod AdminMain kotnrolera koji vrsi logout admin korisnika.
     */
    public function logout() {
        Session::end();
        Misc::redirect('admin');
    }

}
