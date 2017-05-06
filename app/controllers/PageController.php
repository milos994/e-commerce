<?php

class PageController extends Controller {
	public function show( $link ) {
		$page = PageModel::getByPermalink( $link );
		if ( ! $page ) {
			Misc::redirect( 'page/e404' );
		}

		$this->set( 'page', $page );
	}
}
