<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller {

	public function signin() {
		$this->show('user/signin');
	}

	public function signinPost() {
		debug($_POST);
	}

	public function signup() {

	}

	public function forgotPassword() {

	}

}
