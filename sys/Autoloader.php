<?php

function __autoload( $className ) {

	if ( $className == 'Configuration' ) {
		require_once 'config/' . $className . '.php';
	} elseif ( in_array( $className, [ 'Controller', 'DataBase', 'Misc' ] ) ) {
		require_once 'sys/' . $className . '.php';
	} elseif ( preg_match( '/^([A-Z][a-z]+)+Controller$/', $className ) ) {
		$fileName = 'app/controllers/' . $className . '.php';
		if ( file_exists( $fileName ) ) {
			require_once $fileName;
		} else {
			throw new Exception( 'Controller file ' . $className . ' does not exist.' );
		}
	} elseif ( preg_match( '/^([A-Z][a-z]+)+Model$/', $className ) ) {
		$fileName = 'app/model/' . $className . '.php';
		if ( file_exists( $fileName ) ) {
			require_once $fileName;
		} else {
			throw new Exception( 'Model file ' . $className . ' does not exist.' );
		}
	}

}
