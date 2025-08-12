

<?php require_once ('connection.php');?>

<?php 


$email = "";
$name = "";
$errors = array();

//if user signup button clicked

if(isset($_POST['signup']))
{
	$name=mysqli_real_escape_string($connection,$_POST['fullname']);

	$email=mysqli_real_escape_string($connection,$_POST['email']);

	$password=mysqli_real_escape_string($connection,$_POST['password']);


	$email_check = "SELECT * 
					FROM  `users_signup`
					WHERE email = '$email' ;";

	$resalt = mysqli_query($connection,$email_check);

	if(mysqli_num_rows($resalt) > 0)
	{
		$errors['email'] ="Email that you have entered is already exist !" ;
	}
	else

	{

	// Hash the password
    $hashed_password = password_hash($password,PASSWORD_DEFAULT);

	$query = "INSERT INTO users_signup(full_name,email,password)
			  VALUES('$name','$email','$password');"  ;

	$resalt= mysqli_query($connection,$query);

	if ($resalt) {
			  
		echo "Succesfuly  SignUp ";
	}
	else
	{
	echo "Database query Failed ". mysqli_connect_error($connection); 
	}

	}

		

}


?>