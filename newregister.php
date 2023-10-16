<?php

if (isset($_POST['submitted'])){

	$name = $_POST['name']; 
	$surname = $_POST['surname'];
	$username = $_POST['username'];
	$email = $_POST['email'];
	$pass = $_POST['pass'];

	// call to API 
	$endpoint = "http://localhost/moodsapi/api.php?createaccount";

	$postdata = http_build_query(
		
		array(
			'name'=>$name,
			'surname'=>$surname,
			'username'=>$username,
			'email'=>$email,
			'pass'=>$pass
		)

		);

		$opts = array(

			'http'=>array(

				'method'=>'POST',
				'header'=>'Content-Type: application/x-www-form-urlencoded',
				'content'=>$postdata


			)

			);


			$context = stream_context_create(
				$opts
			);

			$resource = file_get_contents(
				$endpoint, false, $context
			);

		





	//if variables haven't been added to database print error, otherwise redirect to login page
	if ($resource === FALSE){
		exit("Unable to create account - try again. Username may already exist.");
	} else {
		
		echo "<p>You have registered successfully! <a href=loginpage.php>Go to Login</a></p>";

	
	}
}
?>






<!DOCTYPE html>
<html lang="en" class="mx-5 my-5 has has-background-danger-light">
	<head>
		<meta charset="utf-8">
		<title>Register</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
        <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
	</head>
	<body>


<section class="hero is-normal is-danger">
  <div class="hero-body">
    <p class="title is-1 has-text-white has-text-centered">
     Create an account:
    </p>
  </div>
</section>

    <div class="container px-6 py-6">

        <form action=<?php echo $_SERVER['PHP_SELF'];?> method="post">

		<div class="field">
			<label class="label is-medium" for="name-input">Name</label>
		<div class="control has-icons-left">
	<input class="input is-white" name="name" type="text" placeholder="Enter name" id="name-input">
	<span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
		</div>
	</div>


	<div class="field">
			<label class="label is-medium" for="surname-input">Surname</label>
		<div class="control has-icons-left">
	<input class="input" name="surname" type="text" placeholder="Enter surname" id="surname-input">
	<span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>
		</div>
	</div>


	<div class="field">
			<label class="label is-medium" for="username-input">Username</label>
		<div class="control has-icons-left">
	<input class="input" name="username" type="text" placeholder="Enter username" id="username-input" required>
	<span class="icon is-small is-left">
            <i class="fas fa-user"></i>
          </span>		
</div>
	</div>

	<div class="field">
			<label class="label is-medium" for="email-input">Email</label>
		<div class="control has-icons-left">
	<input class="input is-white" name="email" type="text" placeholder="Enter email" id="email-input" required>
	<span class="icon is-small is-left">
            <i class="fas fa-envelope"></i>
          </span>
		</div>
	</div>

	<div class="field">
			<label class="label is-medium" for="password-input">Password</label>
		<div class="control has-icons-left">
	<input class="input is-white" name="pass" type="password" placeholder="Enter password" id="password-input" required>
	<span class="icon is-small is-left">
            <i class="fas fa-lock"></i>
          </span>
		</div>

	<div class="field pt-4">
		<div class="control">
			<input class="button is-danger is-rounded" type="submit" value="Submit" name="submitted">
		</div>
	</div>
		</form>

		
		


	</div>
</section>
