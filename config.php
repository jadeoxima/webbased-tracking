<?php
session_start();
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'clm');
 
/* Attempt to connect to MySQL database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


// --------------------------------------------------------------------------------------------------------------
// variable declaration
$username = "";
$email    = "";
$errors   = array();

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// CREATE USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $link, $errors, $username, $email;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$username    =  e($_POST['username']);
	$email       =  e($_POST['email']);
	$emp_id      =  e($_POST['emp_id']);
	$password_1  =  e($_POST['password_1']);
	$password_2  =  e($_POST['password_2']);

	// form validation: ensure that the form is correctly filled
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords do not match");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password_1);//encrypt the password before saving in the database

		if (isset($_POST['userType'])) {
			$userType = e($_POST['userType']);
			$query = "INSERT INTO tblusers (username, email, emp_id, userType, password) 
					  VALUES('$username', '$email', '$emp_id', '$userType', '$password')";
			mysqli_query($link, $query);
			$_SESSION['success']  = "New user successfully created!!";	
		}
	}
}

// escape string
function e($val){
	global $link;
	return mysqli_real_escape_string($link, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}	

function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $link, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM tblusers WHERE email='$email' AND password='$password' LIMIT 1";
		$results = mysqli_query($link, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check the user type of the user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['userType'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: adminPages/admin_homepage.php');	  
			}else if ($logged_in_user['userType'] == 'secretary') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
                header('location: secPages/sec_homepage.php');	
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
                header('location: homepage.php');
			}
		}else {
			array_push($errors, "Wrong email/password combination");
		}
	}
}

// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['userType'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

// ...
function isSecretary()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['userType'] == 'secretary' ) {
		return true;
	}else{
		return false;
	}
}

// ENTER A NEW PASSWORD
if (isset($_POST['change_pass'])) {

	$old_pass = e($_POST['old_pass']);
	// $email = $_POST['email'];
	$new_pass = $_POST['new_pass'];
	$new_pass_c = $_POST['new_pass_c'];


	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($old_pass);

		// $query = "SELECT email FROM tblusers WHERE email='$email' LIMIT 1";
		$query = "SELECT password FROM tblusers WHERE password='$password' LIMIT 1";
		$results = mysqli_query($link, $query);

		// option 1
		// if (mysqli_num_rows($results) == 1) {
		// 	$new_password = md5($new_pass);
		// 	mysqli_query($link, "UPDATE tblusers SET password='$new_password' WHERE email='$email'");
		// 	header('location: login.php');

		// option 2
		if (mysqli_num_rows($results) == 1) {
			$new_password = md5($new_pass);
			mysqli_query($link, "UPDATE tblusers SET password='$new_password' WHERE password='$password'");
			header('location: loginForm.php');

		}else {
			// array_push($errors, "Email does not exist");
			array_push($errors, "Wrong old password");
		}
		
	}

}


// RESET PASSWORD
if (isset($_POST['reset_pass'])) {

	$old_pass = e($_POST['old_pass']);
	$email = $_POST['email'];
	$new_pass = $_POST['new_pass'];
	$new_pass_c = $_POST['new_pass_c'];


	// attempt login if no errors on form
	if (count($errors) == 0) {

		$query = "SELECT email FROM tblusers WHERE email='$email' LIMIT 1";
		$results = mysqli_query($link, $query);

		if (mysqli_num_rows($results) == 1) {
			$new_password = md5('1234');
			mysqli_query($link, "UPDATE tblusers SET password='$new_password' WHERE email='$email'");
			header('location: homepage.php');

		}else {
			array_push($errors, "Email does not exist");
		}
		
	}

}
?>