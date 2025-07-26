<?php
$conn = new mysqli('localhost','root','','devquizzer');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];

if ($password !== $confirm_password) {
  die("Passwords do not match.");
}

$stmt = $conn->prepare("INSERT INTO `devquizzer` (`serial no`, `name`, `email`, `password`, `date`) 
VALUES (NULL, ?, ?, ?, '');");

if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sss", $fullname, $email, $password);
$stmt->execute();
echo "registerd successful";
$stmt->close();
$conn->close();
?>
