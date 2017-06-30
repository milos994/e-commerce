<?php

class ProductController extends Controller {

    public function index() {

        // Sortiranje po ceni
        if(isset($_GET['amount']) && $_GET['amount'] == 1) {
            $price_min = 5000;
            $price_max = 10000;
            $proizvodi = ProductModel::getByPrice($price_min, $price_max);
        } elseif (isset($_GET['amount']) && $_GET['amount'] == 2) {
            $price_min = 10000;
            $price_max = 15000;
            $proizvodi = ProductModel::getByPrice($price_min, $price_max);
        } elseif (isset($_GET['amount']) && $_GET['amount'] == 3) {
            $price_min = 15000;
            $price_max = 25000;
            $proizvodi = ProductModel::getByPrice($price_min, $price_max);
        } elseif (isset($_GET['amount']) && $_GET['amount'] == 4) {
            $price_min = 25000;
            $price_max = 50000;
            $proizvodi = ProductModel::getByPrice($price_min, $price_max);
        // sortiranje po imenu
        } elseif (isset($_GET['name']) && $_GET['name'] == "FranckMuller") {
            $name = "FranckMuller";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "JacquesLemans") {
            $name = "JacquesLemans";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "MichaelKors") {
            $name = "MichaelKors";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "Armani") {
            $name = "Armani";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "Casio") {
            $name = "Casio";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "Festina") {
            $name = "Festina";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "Fossil") {
            $name = "Fossil";
            $proizvodi = ProductModel::getByName($name);
        } elseif (isset($_GET['name']) && $_GET['name'] == "Diesel") {
            $name = "Diesel";
            $proizvodi = ProductModel::getByName($name);
        }  else {
            $proizvodi = ProductModel::getAll();
        }
        
        $this->set('products', $proizvodi);
    }

    public function view($id) {
        $proizvod = ProductModel::getById($id);
        $this->set('products', $proizvod);
    }

}