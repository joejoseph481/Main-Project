<?php
$con=mysqli_connect("localhost","root","","newsportal")or die("couldn't connect");

 ?>


<?php
$id = $_GET['id'];
$status = $_GET['status'];


if($status==0)
{
$query = "UPDATE tbladmin SET Is_Active=1 WHERE id='$id'";
$res = mysqli_query($con,$query);
if(isset($res))
{
  $_SESSION['unblock'] == "Account Unblocked";
  header("location:admindashboard.php");
}

}

elseif($status==1)
{
  $query1 = "UPDATE tbladmin SET Is_Active=0 WHERE id='$id'";
  $res1 = mysqli_query($con,$query1);
  if(isset($res1))
  {
    $_SESSION['block'] == "Account Blocked";
    header("location:admindashboard.php");
  }
}


 ?>
