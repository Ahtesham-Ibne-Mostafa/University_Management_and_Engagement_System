<?php
session_start();
error_reporting(0);
include("includes/config.php");
if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=md5($_POST['password']);
$query=mysqli_query($con,"SELECT * FROM admin WHERE username='$username' and password='$password'");
$num=mysqli_fetch_array($query);
if($num>0)
{
$_SESSION['alogin']=$_POST['username'];
$_SESSION['id']=$num['id'];
header("location:session.php");
exit();
}
else
{
$_SESSION['errmsg']="Invalid username or password";
header("location:index.php");
exit();
}
}
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />

    <title>Faculty Login</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/style.css" rel="stylesheet" />
    <style>
    body {
      background-image: url('assets/img/BracuNcamp.jpg');
      background-size: cover;
      background-position: center;
      color: #FAF9F6;
    }
  </style>
</head>
<body>
    <?php include('includes/header.php');?>

    <section class="menu-section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="navbar-collapse collapse ">
                        <ul id="menu-top" class="nav navbar-nav navbar-right">
                
                            <li><a href="../index.php">Student Login</a></li>
        

                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <h4 class="page-head-line" style="color: white;">Please Login To Enter into Advising Panel as Faculty member</h4>


                </div>

            </div>
             <span style="color:red;" ><?php echo htmlentities($_SESSION['errmsg']); ?><?php echo htmlentities($_SESSION['errmsg']="");?></span>
            <form name="admin" method="post">
            <div class="row">
                <div class="col-md-6">
                     <label>Enter Username : </label>
                        <input type="text" name="username" class="form-control" required />
                        <label>Enter Password :  </label>
                        <input type="password" name="password" class="form-control" required />
                        <hr />
                        <button type="submit" name="submit" class="btn btn-info"><span class="glyphicon glyphicon-user"></span> &nbsp;Log Me In </button>&nbsp;
                </div>
                </form>
                <div class="col-md-6">
                    <div class="alert alert-info">
                
                         <strong> Latest News / Updates</strong>
                         <marquee direction='up'  scrollamount="2" onmouseover="this.stop();" onmouseout="this.start();">
                        <ul>
                            <?php
$sql=mysqli_query($con,"select * from news");
$cnt=1;
while($row=mysqli_fetch_array($sql))
{
?>
                            <li>
                              <a href="news-details.php?nid=<?php echo htmlentities($row['id']);?>"><?php echo htmlentities($row['newstitle']);?>-<?php echo htmlentities($row['postingDate']);?></a>
                            </li>
                           <?php } ?> 
                     
                        </ul>
                    </marquee>
                       
                    </div>
                                    </div>

            </div>
        </div>
    </div>
    
    <?php include('includes/footer.php');?>

    <script src="../assets/js/jquery-1.11.1.js"></script>
  
    <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
