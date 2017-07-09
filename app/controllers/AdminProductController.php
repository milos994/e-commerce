<?php

class AdminProductController extends AdminController {

    public function index() {
        $proizvodi = AdminProductModel::getAll();
        $this->set('products', $proizvodi);
    }

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

            if (preg_match('/^[A-Z][a-z]+/', $name) == 1 and preg_match('/^[A-Z][a-z]+/', $short_text) == 1
                    and preg_match('/^[A-Z][a-z]+/', $long_text) == 1
                    and preg_match('/^[0-9]{1,4}$/', $amount) == 1) {
                $this->set('message', 'Neispravno ste uneli ime kategorije ili slug.');
                return;
            }

            $res = AdminProductModel::add($name, $short_text, $prikaz_sata, $long_text, $active, $amount, $product_category_id);
            if ($res == 1) {
                Misc::redirect('admin/proizvodi/');
            } else {
                $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u bazu podataka.');
            }
        } else {

            $this->set('message', 'Doslo je do greske prilikom dodavanja proizvoda u bazu podataka.');
        }
    }

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

        if (preg_match('/^[A-Z][a-z]+/', $name) == 1 and preg_match('/^[A-Z][a-z]+/', $short_text) == 1
                and preg_match('/^[A-Z][a-z]+/', $long_text) == 1
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
}

