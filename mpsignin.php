<?php
$name=$_POST['name'];
$password=$_POST['password'];
$conn=new mysqli("localhost","root","","frontend");
if($conn->connect_error)
{
die('connection failed : '.$conn->connect_error);
}
else
{
$stmt=$conn->prepare("select * from signup where name=?");
$stmt->bind_param("s",$name);
$stmt->execute();
$stmt_result=$stmt->get_result();
if($stmt_result->num_rows > 0)
{
$data=$stmt_result->fetch_assoc();
if($data['password']==$password)
{
echo "<h2>login successfully</h2>";
}
}else
{
echo "<h2>Invalid email or password</h2>";
}
}
?>