<?php 
$connection = mysqli_connect("localhost","root","root","encryption");
$password = $_POST['password'];
$passwordescaped = mysqli_real_escape_string($connection,$password);
$hashFormat = "$2y$10$";
$salt = "mynameisqwerty12345622";
$hashF_and_salt = $hashFormat . $salt;
$encrypted_password = crypt($passwordescaped,$hashF_and_salt);
$query = "INSERT INTO information(password,encrypted_password)";
$query.= "VALUES ('$password','$encrypted_password')";
$result = mysqli_query($connection,$query);
echo mysqli_error($connection);
$flag = false;
if($result){
    $flag = true;
}
$data = array("flag" => $flag, "encryptedPassword" => $encrypted_password);
echo json_encode($data);
?>