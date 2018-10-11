<?php

	$email = $_POST['email'];
	$password = $_POST['password'];

	$conn = new mysqli("localhost", "root", "", "cloud_storage");

	if(!$conn)
	{
		die("Connection Failed!" . mysqli_connect_error());
	}

	$sql = "SELECT * FROM user WHERE email = '$email'";

	$result = $conn -> query($sql);

	if($result -> num_rows > 0)
	{
		$row = $result -> fetch_assoc();
		if ($password == $row['password'])
		{
			session_start();

			$_SESSION['user_id'] = $row['id'];
			$_SESSION['isLoggedIn'] = 'true';
			$_SESSION['first_name'] = $row['first_name'];
			$_SESSION['last_name']	= $row['last_name'];

			echo "<script> alert('Logged In!!') </script>";	
		}
	}
	else
	{
		echo "Chal Bhag!!";
	}


?>