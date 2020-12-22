<?php
$name=$_POST['name'];
$email=$_POST['email'];
$address=$_POST['address'];
$mobilenumber=$_POST['mobilenumber'];
$password=$_POST['password'];
$confirmpassword=$_POST['confirmpassword'];

$conn=new mysqli("localhost","root","","frontend");
if($conn->connect_error)
{
die('connection failed : '.$conn->connect_error);
}
else
{
$stmt=$conn->prepare("insert into signup(name,email,address,mobilenumber,password,confirmpassword)values(?,?,?,?,?,?)");
$stmt->bind_param("sssiss",$name,$email,$address,$mobilenumber,$password,$confirmpassword);
$stmt->execute();
echo "signed up successfully...";
$stmt->close();
$conn->close();
}
?>