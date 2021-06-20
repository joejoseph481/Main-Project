<?php
// print_r($_POST);die();
$email=$_POST["email"];
$pass=$_POST["pass"];

$con=mysqli_connect("localhost","root","","newsportal")or die("couldn't connect");
$query="select * from tbladmin where AdminEmailId='$email'";
$result=mysqli_query($con,$query);









if($result)
{



    if(mysqli_num_rows($result)==1){
        $row = mysqli_fetch_array($result);
        // print_r($row);
        // echo $pass; die();
        if($row['Is_Active']==0)
        {
          header("Location: ./index.php?errormessage=NOTACTIVE");
        }

        elseif(password_verify($pass,$row['AdminPassword'])){
            session_start();
            $_SESSION['login']=$email;
            header("Location: ./dashboard.php");
        }
        else{
            header("Location: ./index.php?errormessage=p");
        }

    }
    else{
         header("Location: ./index.php?errormessage=WRONGPASSWORD");
    }
}
else{
    die("something went wrong");
}

?>
