<?php

class AdminMainController extends Controller {
    
    public function login() {
        if ($_POST) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');

            if (!preg_match('/^[a-z0-9]{4,}$/', $username) or !preg_match('/^[a-z0-9]{4,}$/', $password)) {
                $this->set('message', 'Neispravno ste uneli korisničko ime ili lozinku.');
                return;
            }
            $passwordHash = hash('sha512', $password . Configuration::USER_SALT);
            $admin = AdminModel::getByUsernameAndPasswordHash($username, $passwordHash);

            if (!$admin) {
                $this->set('message', 'Korisničko ime ili lozinka nisu dobro uneti.');
                return;
            }

            Session::set('admin_id', $admin->admin_id);
            Session::set('username', $username);
            Session::set('user_login', filter_input(INPUT_SERVER, 'HTTp_USER_AGENT'));

            Misc::redirect('');
        }
    }

    public function logout() {
        Session::end();
        Misc::redirect('login');
    }
}
