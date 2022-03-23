<?php
	class Account {

		private $errorArray;

		public function __construct() {
			$this->errorArray = array();
		}

		public function register($un, $fn, $ln, $em, $em2, $pw, $pw2) {
			$this->validateRegistration($un, $fn, $ln, $em, $em2, $pw, $pw2);

			if(empty($this->errorArray) == true) {
				//Insert into db
				return true;
			}
			else {
				return false;
			}
		}

		public function getError($error) {
			if(!in_array($error, $this->errorArray)) {
				$error = "";
			}
			return "<span class='errorMessage'>$error</span>";
		}

		private function validateRegistration($un, $fn, $ln, $em, $em2, $pw, $pw2) {

			if(strlen($un) > 25 || strlen($un) < 5) {
				array_push($this->errorArray, "Your username must be between 5 and 25 characters.");
			}

			//TODO: Check if username exists

			if(strlen($fn) > 25 || strlen($fn) < 2) {
				array_push($this->errorArray, "Your first name must be between 2 and 25 characters.");
			}

			if(strlen($ln) > 25 || strlen($ln) < 2) {
				array_push($this->errorArray, "Your last name must be between 2 and 25 characters.");
			}

			if($em != $em2) {
				array_push($this->errorArray, "Your emails do not match.");
			}

			if(!filter_var($em, FILTER_VALIDATE_EMAIL)) {
				array_push($this->errorArray, "The Email entered is invalid.");
			}

			//TODO: Check that username hasn't already been used

			if($pw != $pw2) {
				array_push($this->errorArray, "Your passwords do not match.");
			}

			if(preg_match('/[^A-Za-z0-9]/', $pw)) {
				array_push($this->errorArray, "Your password can only contain numbers and letters.");
			}

			if(strlen($pw) > 30 || strlen($pw) < 5) {
				array_push($this->errorArray, "Your password must be between 5 and 30 characters.");
			}
			return;
		}
	}
?>