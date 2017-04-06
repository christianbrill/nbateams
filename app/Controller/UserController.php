<?php

namespace Controller;

use \W\Controller\Controller;

class UserController extends Controller {

	/*=====================================
		SIGNIN FUNCTION
	=====================================*/
	public function signin() {
		unset($_SESSION['flash']);

		$this->show('user/signin');
	}


	/*=====================================
		SIGNINPOST FUNCTION
	=====================================*/
	public function signinPost() {
		// Recovery of the data in POST.
		$email = isset( $_POST['emailToto'] ) ? trim(strip_tags( $_POST['emailToto']) ) : '';
		$password = isset( $_POST['passwordToto1'] ) ? trim(strip_tags( $_POST['passwordToto1']) ) : '';

		$errorList = array();

		if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
			$errorList[] = 'Your email is incorrect.';
		}

		// password 1 validation
		if ( strlen($password) < 6 ) {
			$errorList[] = 'The password has to be at least 6 characters.';
		}

		if (empty($errorList)) {
			$authentificationModel = new \W\Security\AuthentificationModel();
			$userId = $authentificationModel->isValidLoginInfo($email, $password);
			// This is done if the user email and password are correct.
			if ($userId > 0) {
				// Here, the user information is retrieved from the DB.
				$userModel = new \W\Model\UsersModel();
				$userInfo = $userModel->find($userId);
				// Then the user is added to the session.
				$authentificationModel->logUserIn($userInfo);
				$this->flash('You have been connected with the following email: ' . $userInfo['usr_email'], 'success');
				// Now the user is redirected to the home page.
				$this->redirectToRoute('default_home');
			} else {

			}
		} else {
			$this->flash( join('<br>', $errorList), 'danger' );
		}
	}


	/*=====================================
		SIGNUP FUNCTION
	=====================================*/
	public function signup() {
		unset($_SESSION['flash']);

		if (!empty($_POST)) {

			// Recovery of the data in POST
			$email = isset( $_POST['emailToto'] ) ? trim(strip_tags( $_POST['emailToto']) ) : '';
			$password1 = isset( $_POST['passwordToto1'] ) ? trim(strip_tags( $_POST['passwordToto1']) ) : '';
			$password2 = isset( $_POST['passwordToto2'] ) ? trim(strip_tags( $_POST['passwordToto2']) ) : '';

			// errorList variable to be filled in case there are errors
			$errorList = array();

			// Data validation
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

			// If there are no errors, do this
			if ( empty($errorList) ) {
				// I check to see if the email exists
				$usersModel = new \W\Model\UsersModel();
				if ( $usersModel->emailExists($email) ) {
					$this->flash('This email address already exists.', 'danger');
				} else {
					// Encryption of the password
					$authentificationModel = new \W\Security\AuthentificationModel();
					$hashedPassword = $authentificationModel->hashPassword($password1);

					// insertion of the data into database
					$insertedUser = $usersModel->insert(array(
						'usr_email' => $email,
						'usr_password' => $hashedPassword,
						'usr_role' => 'user'
					));

					// If the insertion was successful, redirect to signin
					if ( !empty($insertedUser) ) {
						$this->flash('Signup successful.', 'success');

						// redirection to the user signin page
						$this->redirectToRoute('user_signin');
					} else {
						$this->flash('Signup unsuccessful', 'danger');
					}
				}
			} else {
				$this->flash( join('<br>', $errorList), 'danger' );
			}
		}

		$this->show('user/signup');
	}


	/*=====================================
		FORGOT PASSWORD FUNCTION
	=====================================*/
	public function forgotPassword() {

	}

}
