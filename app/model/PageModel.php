<?php

class PageModel {

	public static function getAll() {

		$SQL  = 'SELECT * FROM page;';
		$prep = DataBase::getInstance()->prepare( $SQL );
		$res  = $prep->execute();

		if ( $res ) {
			return $prep->fetchAll( PDO::FETCH_OBJ );
		} else {
			return [];
		}

	}

	public static function getById( $id ) {

		$SQL  = 'SELECT * FROM page WHERE page_id = ?;';
		$prep = DataBase::getInstance()->prepare( $SQL );
		$res  = $prep->execute( [ $id ] );

		if ( $res ) {
			return $prep->fetch( PDO::FETCH_OBJ );
		} else {
			return null;
		}

	}

	public static function getByPermalink( $link ) {

		$SQL  = 'SELECT * FROM page WHERE permalink = ?;';
		$prep = DataBase::getInstance()->prepare( $SQL );
		$res  = $prep->execute( [ $link ] );

		if ( $res ) {
			return $prep->fetch( PDO::FETCH_OBJ );
		} else {
			return null;
		}

	}

}
