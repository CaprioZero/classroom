<?php require_once ("config/db.php"); ?>
<?php require_once ("config/redirector.php"); ?>
<?php require_once ("config/checklogin.php"); ?>
<?php require_once ("config/messages.php"); ?>
<?php Confirm_login(); ?>
<?php
$PostIdFromGet = $_GET["id"];
if (isset($_POST["submit"]))
{
   $className = $_POST["className"];
   $classSubject = $_POST["classSubject"];
   $classRoom = $_POST["classRoom"];
   $Image = $_FILES["imageSelect"]["name"];
   $Target = "uploads/" . basename($_FILES["imageSelect"]["name"]);
   if (empty($className))
   {
       $_SESSION["ErrorMessage"] = "Please fill out class name";
       Redirect_to("addclass.php");
   }
   else if (empty($classSubject))
   {
       $_SESSION["ErrorMessage"] = "Please fill out class subject";
       Redirect_to("addclass.php");
   }
   else if (empty($classRoom))
   {
       $_SESSION["ErrorMessage"] = "Please fill out class room";
       Redirect_to("addclass.php");
   }
    else
    {
        // Query to insert category in DB When everything is fine
        global $connection;
        if (!empty($_FILES["imageSelect"]["name"]))
        {
            $Query = "UPDATE class SET class_name='$className', subject='$classSubject', room='$classRoom', image='$Image' WHERE class_id='$PostIdFromGet'";
        }
        else
        {
            $Query = "UPDATE class SET class_name='$className', subject='$classSubject', room='$classRoom' WHERE class_id='$PostIdFromGet'";
        }

        $Execute = mysqli_query($connection, $Query) or die( mysqli_error($connection));
        move_uploaded_file($_FILES["imageSelect"]["tmp_name"], $Target);
        if ($Execute)
        {
            $_SESSION["SuccessMessage"] = "Class update Successfully";
            Redirect_to("dashboard.php");
        }
        else
        {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again !";
            Redirect_to("dashboard.php");
        }
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
      <title>Edit class</title>
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
      <!-- Custom styles for this template -->
      <link href="css/style1.css" rel="stylesheet">
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
                  </ul>
               </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
               <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                  <h1 class="h2">Add class</h1>
               </div>
               <div class="container-fluid">
               <?php
echo ErrorMessage();
echo SuccessMessage();
global $connection;
$viewQuery = "SELECT * FROM class WHERE class_id='$PostIdFromGet'";
$Execute = mysqli_query($connection, $viewQuery);
while ($DataRows = mysqli_fetch_array($Execute))
{
    $OldClassName = $DataRows["class_name"];
    $OldSubject = $DataRows["subject"];
    $OldRoom = $DataRows["room"];
    $OldThumbnail = $DataRows["thumbnail"];
}
?>
                  <form class="" action="editclass.php?id=<?php echo $PostIdFromGet; ?>"  method="post" enctype="multipart/form-data">
                     <div class="form-group">
                        <label for="postTitle">Class name</label>
                        <input type="text" name="className" class="form-control" id="className" value="<?php echo $OldClassName; ?>">
                     </div>
                     <div class="form-group">
                        <label for="postTitle">Class subject</label>
                        <input type="text" name="classSubject" class="form-control" id="classSubject" value="<?php echo $OldSubject; ?>">
                     </div>
                     <div class="form-group">
                        <label for="postTitle">Class room</label>
                        <input type="text" name="classRoom" class="form-control" id="classRoom" value="<?php echo $OldRoom; ?>">
                     </div>
                     <div class="form-group">
                        <span class="FieldInfo">Current Image: </span>
                        <img  class="mb-1" src="uploads/<?php echo $OldThumbnail; ?>" style="object-fit: contain; width: 100%; height: 150px;" >
                        <label for="imageSelect">Select Image</label>
                        <input class="form-control" type="file" name="imageSelect" id="imageSelect">
                     </div>
                     <button type="submit" name="submit" class="btn btn-success">Edit class</button>
                  </form>
               </div>
            </main>
         </div>
      </div>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
      <script src="js/myScript.js"></script>
      <script language="JavaScript" type="text/javascript">
         $(document).ready(function(){
            window.setTimeout(function() {
               $(".alert").fadeTo(500, 0).slideUp(500, function(){
                  $(".alert").remove(); 
               });
            }, 2000);
         });
      </script>
   </body>
</html>