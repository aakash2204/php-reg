<?php
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phonenumber = $_POST['phonenumber'];
$gender = $_POST['gender'];
$username = $_POST['username'];
$password = $_POST['password'];

$conn = new mysqli('localhost','root','','test');
if($conn->connect_error){
    die('connection failed:'.$conn->connect_error);
}else{
    $stmt=$conn->prepare("insert into registration(firstname,lastname,email,phonenumber,gender,username,password)values(?,?,?,?,?,?,?)");
    $stmt->bind_param("sssisss",$firstname,$lastname,$email,$phonenumber,$gender,$username,$password);
    $stmt->execute();
    echo"registration successfully...";
    $stmt->close();
    $conn->close();
}
