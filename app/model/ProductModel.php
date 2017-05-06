<?php

class ProductModel {

	public static function getAll() {

		$SQL = 'SELECT * FROM satovi;';
		$prep = DataBase::getInstance()->prepare($SQL);
		$res = $prep->execute();

		if ($res) {
			return $prep->fetchAll(PDO::FETCH_OBJ);
		} else {
			return [];
		}

	}

	public static function getById($id) {

		$SQL = 'SELECT * FROM satovi WHERE id = ?;';
		$prep = DataBase::getInstance()->prepare($SQL);
		$res = $prep->execute([$id]);

		if ($res) {
			return $prep->fetch(PDO::FETCH_OBJ);
		} else {
			return null;
		}

	}
}
