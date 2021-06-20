<?php
$con=mysqli_connect("localhost","root","","newsportal")or die("couldn't connect");

 ?>
 <?php
 
 session_start();
 include('../admin/includes/config.php');
 error_reporting(0);
 if(strlen($_SESSION['login'])==0)
   {
 header('location:index.php');
 }
 else{
     ?>


 <!DOCTYPE html>
 <html lang="en">
     <head>
         <meta charset="utf-8">
         <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
         <meta name="author" content="Coderthemes">
         <!-- App title -->
         <title>News On | Dashboard</title>
 		<link rel="stylesheet" href="../plugins/morris/morris.css">

         <!-- App css -->
         <link href="../admin/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
         <link href="../admin/assets/css/core.css" rel="stylesheet" type="text/css" />
         <link href="../admin/assets/css/components.css" rel="stylesheet" type="text/css" />
         <link href="../admin/assets/css/icons.css" rel="stylesheet" type="text/css" />
         <link href="../admin/assets/css/pages.css" rel="stylesheet" type="text/css" />
         <link href="../admin/assets/css/menu.css" rel="stylesheet" type="text/css" />
         <link href="../admin/assets/css/responsive.css" rel="stylesheet" type="text/css" />
 		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
         <script src="../admin/assets/js/modernizr.min.js"></script>

     </head>
<style media="screen">

  .logoutname
  {
    position: relative;
    left: 870px;
    bottom: 70px;
  }
</style>

     <body class="fixed-left">

         <!-- Begin page -->
         <div id="wrapper">

             <!-- Top Bar Start -->
             <div class="topbar">

                 <!-- LOGO -->
                 <div class="topbar-left">
                     <a href="index.html" class="logo"><span>NEWSON<span> Admin</span></span><i class="mdi mdi-layers"></i></a>
                     <!-- Image logo -->
                     <!--<a href="index.html" class="logo">-->
                         <!--<span>-->
                             <!--<img src="assets/images/logo.png" alt="" height="30">-->
                         <!--</span>-->
                         <!--<i>-->
                             <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                         <!--</i>-->
                     <!--</a>-->
                 </div>

                 <!-- Button mobile view to collapse sidebar menu -->
             <?php include('includes/topheader.php');?>
             </div>
             <!-- Top Bar End -->


             <!-- ========== Left Sidebar Start ========== -->
     <?php include('includes/leftsidebar.php');?>
             <!-- Left Sidebar End -->



             <!-- ============================================================== -->
             <!-- Start right Content here -->
             <!-- ============================================================== -->
             <div class="content-page">
                 <!-- Start content -->
                 <div class="content">
                     <div class="container">
                         <div class="row">
 							<div class="col-xs-12">
 								<div class="page-title-box">
                                     <h4 class="page-title">Notifications</h4>

                                     <div class="clearfix"></div>
                                     <div class="logout">
                                       <a href="adminlogout.php"> LogOut </a>
                                         </div>
                                       <div class="logoutname">
                                         <?php echo $_SESSION['login']; ?>
                                       </div>

                                 </div>

 							</div>
 						</div>
<style media="screen">
  table
  {
    width: 80%;
    padding: 1%;
    line-height: 25px;

  }
  input[type=button]
  {
    padding: 1%;
    width: 64px;
  }
  table tr td a
  {
    text-decoration: none;
    color: #797979;


  }
  table tr td i
  {
color: green;

  }
</style>
<br><br>
<?php
if(isset($_SESSION['block']))
{
 ?>
<div>
<strong>Well done!</strong> <?php echo $_SESSION['block']?>
</div>

<?php
 }
 ?>
<br><br><br>
    <?php
$query = "SELECT * FROM tbladmin";
$res = mysqli_query($con,$query);
?>
<table>
<tbody>
<tr>
<th>Username</th>
<th>Email</th>
<th>Status</th>
<th>Action</th>
</tr>
<?php
while($rows=mysqli_fetch_array($res))
{
  $id = $rows['id'];
  $username = $rows['AdminUserName'];
  $email = $rows['AdminEmailId'];
  $status = $rows['Is_Active'];
?>
<tr>
<td><?php echo $username; ?></td>
<td><?php echo $email; ?></td>
<td>
  <?php
  if($status==0)
  {
    ?>
    Account Blocked
  <?php
  }
  elseif($status==1)
  {
  ?>
    Account Active
  <?php
  }

   ?>


</td>
<td>
<?php
if($status==0)
{
  ?>
<a href="accountaction.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>"><input type="button" name="unblock" value="Unblock"></a>
<?php
}
elseif($status==1)
{
?>
<a href="accountaction.php?id=<?php echo $id; ?>&status=<?php echo $status; ?>"><input type="button" name="block" value="Block"></a>
<?php
}

 ?>

 </td>
</tr>


<?php

}






     ?>
   </tbody>
   </table>



   <br><br>
   <h4 class="page-title">Active Users</h4> <br><br>

   <?php
$query2 = "SELECT * FROM tbladmin WHERE Is_Active=1";
$res2 = mysqli_query($con,$query2);
?>
<table>
<tbody>
<tr>
<th>Username</th>
<th>Email</th>

</tr>
<?php
while($rowss=mysqli_fetch_array($res2))
{
  $id = $rowss['id'];
  $username = $rowss['AdminUserName'];
  $email = $rowss['AdminEmailId'];


?>
<tr>
<td><?php echo $username; ?></td>
<td><?php echo $email; ?></td>
<td><i class="fa fa-check" aria-hidden="true" title="account active"></i></td>

</tr>

<?php
}
 ?>
</tbody>
</table>



     </body>
 </html>
 <?php } ?>
