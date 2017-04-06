<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller {

	public function signin() {
		unset($_SESSION['flash']);

		$this->show('user/signin');
	}

	public function signinPost() {
		debug($_POST);
	}

	public function signup() {
		unset($_SESSION['flash']);

		if (!empty($_POST)) {
			//debug($_POST);

			// recover the data in POST
			$email = isset( $_POST['emailToto'] ) ? trim(strip_tags( $_POST['emailToto']) ) : '';
			$password1 = isset( $_POST['passwordToto1'] ) ? trim(strip_tags( $_POST['passwordToto1']) ) : '';
			$password2 = isset( $_POST['passwordToto2'] ) ? trim(strip_tags( $_POST['passwordToto2']) ) : '';

			// errorList variable to be filled in case there are errors
			$errorList = array();

			// validate the data
			// email validation
			if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
				$errorList[] = 'Your email is incorrect.';
			}

			// password 1 validation
			if ( strlen($password1) < 6 ) {
				$errorList[] = 'The password has to be at least 6 characters.';
			}

			// password 1 = password 2?
			if ( $password1 != $password2 ) {
				$errorList[] = 'The two passwords do not match.';
			}

			// if there are no errors, do this
			if ( empty($errorList) ) {
				// I check to see if the email exists
				$usersModel = new \W\Model\UsersModel();
				if ( $usersModel->emailExists($email) ) {
					$this->flash('This email address already exists.', 'danger');
				}
				else {
					// encryption of the password
					$authentificationModel = new \W\Security\AuthentificationModel();
					$hashedPassword = $authentificationModel->hashPassword($password1);

					// insertion of the data into database
					$insertedUser = $usersModel->insert(array(
						'usr_username' => '',
						'usr_email' => $email,
						'usr_password' => $hashedPassword,
						'usr_role' => 'user'
					));

					// if the insertion was successful, redirect to signin
					if ( !empty($insertedUser) ) {
						$this->flash('Signup successful.', 'success');

						// redirection to the user signin page
						$this->redirectToRoute('user_signin');
					}
					else {
						$this->flash('Signup unsuccessful', 'danger');
					}
				}
			}
			else {
				$this->flash( join('<br>', $errorList), 'danger' );
			}
		}

		$this->show('user/signup');
	}

	public function forgotPassword() {

	}

}
