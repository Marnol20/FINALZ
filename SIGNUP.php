<?php
   $host = "localhost";
   $dbname = "database";
   $username = "root";
   $password = "";


   $conn = new mysqli($host, $username, $password, $dbname);


   if ($conn->connect_error) {
       die("Connection failed: " . $conn->connect_error);
   }


   $name = $_POST['name'];
   $email = $_POST['email'];
   $password = $_POST['password'];


   $sql = "INSERT INTO users (name, email, password_harsh) VALUES ('$name', '$email', '$password')";

   if ($conn->query($sql) === TRUE) {
       echo "Signup successful!";
   } else {
       echo "Error: " . $sql . "<br>" . $conn->error;
   }

   $conn->close();
   ?>