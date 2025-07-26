<?php
$conn = new mysqli('localhost','root','','contact');

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

$stmt = $conn->prepare("INSERT INTO `contact` 
(`serial no`, `name`, `email`, `message`) VALUES (NULL,?,?,?)");


if ($stmt === false) {
    die('Prepare failed: ' . $conn->error);
}

$stmt->bind_param("sss", $name, $email, $message);
$stmt->execute();
echo "registerd successful";
$stmt->close();
$conn->close();
?>
