<?php
// print_r($_POST);die();
$email=$_POST["email"];
$pass=$_POST["pass"];



$con=mysqli_connect("localhost","root","","newsportal")or die("couldn't connect");
$query="select * from offadmin where admin_username='$email'";
$result=mysqli_query($con,$query);


if($result)
{



    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        // print_r($row);
        // echo $pass; die();
      if(password_verify($pass,$row['admin_password'])){
            session_start();
            $_SESSION['login']=$email;
            header("Location: admindashboard.php");
        }
        else{
            header("Location: ./adminlogin.php?errormessage=p");
        }

    }
    else{
         header("Location: ./adminlogin.php?errormessage=WRONGPASSWORD");
    }
}
else{
    die("something went wrong");
}

?>
