<?php
$name=$_POST['name'];
$pass=$_POST['passw'];
$phno=$_POST['phno'];
$email=$_POST['email'];

$password = password_hash($pass,PASSWORD_DEFAULT);

// echo $name,", ",$pass,", ",$phno,", ",$email,", ",$gen;

$con=mysqli_connect("localhost","root","","newsportal");

$query="insert into tbladmin(AdminUserName,AdminPassword,AdminEmailId,Is_Active) values('$name','$password','$email',0)";
// mysqli_query($con,$query);
// $loginid=mysqli_insert_id($con);
// $query="INSERT INTO creg(lid,name,gender,phno) VALUES ($loginid,'$name','$gen','$phno')";
// $query="insert into creg(lid,name,gender,mobile) values($loginid,'$name','$gen','$phno')";
if(mysqli_query($con,$query))
{
    $_SESSION['login']=$name;
    header("Location:dashboard.php");
}
else{
    echo "Something went wrong !!";
}

?>
