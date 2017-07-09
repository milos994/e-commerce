<?php

abstract class Controller {

    private $data = [];

    public function index() {

    }

    final protected function set( $name, $value ) {
        if ( preg_match( '/^[a-z]+[a-z_]*$/', $name ) ) {
                $this->data[$name] = $value;
        }
    }

    final public function get() {
        return $this->data;
    }

}