<?php require_once ("config/db.php"); ?>
<?php require_once ("config/redirector.php"); ?>
<?php require_once ("config/checklogin.php"); ?>
<?php require_once ("config/messages.php"); ?>
<?php Confirm_login(); ?>
<?php if ($_SESSION['user_type'] == "student"){
   $_SESSION["ErrorMessage"] = "You do not have the permission to enter admin zone";
   Redirect_to("loginpage.php");
} ?>
<?php $ClassId = $_GET["cid"]; ?>
<?php
if (isset($_GET["submit"]))
{
   global $connection;
   $email = mysqli_real_escape_string($connection, $_GET["choosemail"]);
   $viewQuery = "SELECT * FROM users WHERE email='$email'";
   $run = mysqli_query($connection, $viewQuery) or die( mysqli_error($connection));
       $DataRows = mysqli_fetch_array($run);
       $uid = $DataRows["id"];
   $Query = "INSERT INTO users_class(user_id,class_id) VALUES ('$uid','$ClassId')";

        $Execute = mysqli_query($connection, $Query);
        if ($Execute)
        {
            $_SESSION["SuccessMessage"] = "Add student to class Successfully";
            header("Location: studentlist.php?cid=$ClassId");
        }
        else
        {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again !";
            header("Location: studentlist.php?cid=$ClassId");
        }
} //Ending of Submit Button If-Condition

?>
<!doctype html>
<html lang="en">
   <head>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css">
      <title>Student list</title>
      <!-- Custom styles for this template -->
      <link href="css/style1.css" rel="stylesheet">
      <style>
         .bd-placeholder-img {
         font-size: 1.125rem;
         text-anchor: middle;
         -webkit-user-select: none;
         -moz-user-select: none;
         -ms-user-select: none;
         user-select: none;
         }
         @media (min-width: 768px) {
         .bd-placeholder-img-lg {
         font-size: 3.5rem;
         }
         }
      </style>
   </head>
   <body>
      <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
         <a class="navbar-brand col-md-3 col-lg-2 mr-0 px-3" href="#">Classroom</a>
         <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
         </button>
         <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
               <a class="nav-link" href="logout.php">Sign out</a>
            </li>
         </ul>
      </nav>
      <div class="container-fluid">
         <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
               <div class="sidebar-sticky pt-3">
                  <ul class="nav flex-column">
                     <li class="nav-item">
                        <a class="nav-link" href="dashboard.php"><i class="fas fa-columns"></i>
                        <span data-feather="home"></span>
                        Dashboard
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="postdashboard.php"><i class="fas fa-columns"></i>
                        <span data-feather="home"></span>
                        Post Dashboard
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="commentdashboard.php"><i class="fas fa-columns"></i>
                        <span data-feather="home"></span>
                        Comment Dashboard
                        </a>
                     </li>
                     <?php if ($_SESSION['user_type'] == "admin"){ ?>
                     <li class="nav-item">
                        <a class="nav-link" href="editpermission.php"><i class="fas fa-plus"></i>
                        <span data-feather="file"></span>
                        Change user permission
                        </a>
                     </li>
                     <?php } ?>
                     <li class="nav-item">
                        <a class="nav-link" href="addclass.php"><i class="fas fa-tags"></i>
                        <span data-feather="shopping-cart"></span>
                        Add class
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="addnewpost.php"><i class="fas fa-tags"></i>
                        <span data-feather="shopping-cart"></span>
                        Add post
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" rel="noopener noreferrer" target="_blank" href="index.php"><i class="far fa-eye"></i>
                        <span data-feather="layers"></span>
                        View classroom
                        </a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-users-cog"></i>
                        <span data-feather="users"></span>
                        Student list <span class="sr-only">(current)</span>
                        </a>
                     </li>
                  </ul>
               </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
               <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">Student list</h1>
               </div>
               <?php
echo ErrorMessage();
echo SuccessMessage();
?>
               <div class="container-fluid">
               <form class="" action="studentlist.php?cid=<?php echo $ClassId; ?>" method="get" enctype="multipart/form-data">
               <input type="hidden" name="cid" value="<?php echo htmlspecialchars($ClassId, ENT_QUOTES); ?>" />
<div class="form-group">
   <label for="choosemail">Choose student to add to class</label>
   <select class="form-control" id="choosemail" name="choosemail">
      <?php

if (isset($_GET["cid"]))
{
global $connection;
$viewQuery = "SELECT * FROM users WHERE user_type != 'admin' and id NOT IN (Select u.id from users u, users_class uc where uc.user_id = u.id and (u.user_type = 'student' OR u.user_type = 'teacher') and uc.class_id = '$ClassId')";
$Execute = mysqli_query($connection, $viewQuery);
while ($DataRows = mysqli_fetch_array($Execute))
{
$email = $DataRows["email"];
?>

      <option><?php echo $email; ?></option>
      <?php
} 
?>
      <?php
} 
?>
   </select>
</div>

<button type="submit" name="submit" class="btn btn-success">Add student to class</button>
</form>
                  <table class="table table-striped table-hover">
                     <thead class="thead-dark">
                        <tr>
                           <th>No.</th>
                           <th>Student first name</th>
                           <th>Student last name</th>
                           <th>Email</th>
                           <th>Phone number</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                             <!-- SELECT * FROM users WHERE user_type != 'admin' and id NOT IN (Select u.id from users u, users_class uc where uc.user_id = u.id and (u.user_type = 'student' OR u.user_type = 'teacher') and uc.class_id = '6')
 -->
                     <?php
if (isset($_GET["cid"]))
{
global $connection;
$ClassId = $_GET["cid"];
$newQuery = "SELECT u.id,firstname,lastname,email,mobilenumber FROM users u, users_class uc WHERE uc.user_id = u.id and (u.user_type = 'student' OR u.user_type = 'teacher') and uc.class_id = '$ClassId'";
$result = mysqli_query($connection, $newQuery) or die( mysqli_error($connection));
$SrNo = 0;
while ($DataRows = mysqli_fetch_array($result))
{
    $StudentId = $DataRows["id"];
    $FirstName = $DataRows["firstname"];
    $LastName = $DataRows["lastname"];
    $Email = $DataRows["email"];
    $PhoneNum = $DataRows["mobilenumber"];
    $SrNo++;
?>
                     <tbody>
                        <tr>
                           <td><?php echo $SrNo; ?></td>
                           <td><?php echo $FirstName; ?></td>
                           <td><?php echo $LastName; ?></td>
                           <td><?php echo $Email; ?></td>
                           <td><?php echo $PhoneNum; ?></td>
                           <td>
                              <a class="delete" href="deletestudent.php?cid=<?php echo $ClassId; ?>&uid=<?php echo $StudentId; ?>">
                              <button type="submit" class="btn btn-danger">Delete</button>
                              </a>
                           </td>
                        </tr>
                     </tbody>
                     <?php
}
} ?>
                  </table>
               </div>
            </main>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
      <script language="JavaScript" type="text/javascript">
         $(document).ready(function(){
             $("a.delete").click(function(e){
                 if(!confirm('Are you sure?')){
                     e.preventDefault();
                     return false;
                 }
                 return true;
             });
         });
         window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideUp(500, function(){
               $(".alert").remove(); 
            });
         }, 2000);
      </script>
   </body>
</html>
