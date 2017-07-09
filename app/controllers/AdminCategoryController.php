<?php

class AdminCategoryController extends AdminController {

    public function index() {
        $kategorije = AdminCategoryModel::getAll();
        $this->set('kategorije', $kategorije);
    }

    public function add() {
        if ($_POST) {
            $category_name = filter_input(INPUT_POST, 'category_name');
            $slug = filter_input(INPUT_POST, 'slug');

            if (!preg_match('/^[A-Z][a-z]+/', $category_name) or ! preg_match('/^[a-z]+/', $slug)) {
                $this->set('message', 'Neispravno ste uneli ime kategorije ili slug.');
                return;
            }

            $res = AdminCategoryModel::add($category_name, $slug);

            if ($res) {
                Misc::redirect('admin/kategorije/');
            } else {
                $this->set('message', 'Doslo je do greske prilikom dodavanja kategorije u bazu podataka.');
            }
        }
    }

    public function edit($id) {
        $category = AdminCategoryModel::getById($id);
        $this->set('category', $category);

        if ($_POST) {
            $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);
            $slug = filter_input(INPUT_POST, 'slug');

            if (!preg_match('/^[A-Z][a-z]+/', $category_name) or ! preg_match('/^[a-z]+/', $slug)) {
                $this->set('message', 'Neispravno ste uneli ime kategorije ili slug.');
                return;
            }

            $res = AdminCategoryModel::edit($category_name, $slug, $id);
            if ($res) {
                Misc::redirect('admin/kategorije/');
            } else {
                $this->set('message', 'Doslo je do greske prilikom izmene podataka o kategoriji.');
            }
        } else {
            $this->set('message', 'Doslo je do greske prilikom izmene podataka o kategoriji.');
        }
    }

    public function delete($id) {

        $category = AdminCategoryModel::getById($id);
        $this->set('category', $category);

        if ($_POST) {
            $confirmed = filter_input(INPUT_POST, 'confirmed', FILTER_SANITIZE_NUMBER_INT);

            if ($confirmed == 1) {
                $res = AdminCategoryModel::delete($id);
                if ($res) {
                    Misc::redirect('admin/kategorije/');
                } else {
                    $this->setData('message', "Proizvod je uspeŠno obrisan!");
                }
            }
        }
    }

}
