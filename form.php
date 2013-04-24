<?php

  //variables
	$fname = $_POST['fname'];
	$sname = $_POST['sname'];
	
	echo $fname;
	echo $sname;

	//Connect to MySQL database
	$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "form";
	$dbh = mysql_connect("localhost", "root", "");
	
	echo $dbh;
	
	//Check connection
	if (!$dbh)
	{
		die('Sorry, could not connect: ' . mysql_error());
	}
	
	//Select database
	mysql_select_db("form", $dbh);
	
	//Create table
	$sql = "CREATE TABLE queries
	(
	PID INT NOT NULL AUTO_INCREMENT,
	PRIMARY KEY(PID),
	FirstName CHAR(15),
	LastName CHAR(15)
	)";
	
	//Execute database creation
	if (mysql_query($sql))
		{
		echo "Table queries created successfully";
		}
	else
		{
		echo "Error creating table: " . mysql_error();
		}
	
	$sql = "INSERT INTO queries (FirstName, LastName)
	VALUES
	('$fname', '$sname')";
	
	if (!mysql_query($sql))
		{
		die('Error: ' . mysql_error($dbh));
		}
	
	echo "1 record added";
	
	mysql_close($dbh); 
	
?>
