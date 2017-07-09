<?php

class AdminMainController extends Controller {

    public function login() {
        if (!empty($_POST)) {
            $username = filter_input(INPUT_POST, 'username');
            $password = filter_input(INPUT_POST, 'password');

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

    public function logout() {
        Session::end();
        Misc::redirect('admin');
    }

}
