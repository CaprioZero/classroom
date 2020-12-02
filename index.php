<?php require_once ("config/db.php"); ?>
<?php require_once ("config/redirector.php"); ?>
<?php require_once ("config/checklogin.php"); ?>
<?php require_once ("config/messages.php"); ?>
<?php Confirm_login(); ?>
<?php
$UserId = $_SESSION['id'];
if (isset($_POST["submit"]))
{
  global $connection;
  $classCode = $_POST["classCode"];
  $viewQuery = "SELECT * FROM class WHERE class_code='$classCode'";
  $Execute = mysqli_query($connection, $viewQuery) or die( mysqli_error($connection));
      $DataRows = mysqli_fetch_array($Execute);
      $ClassId = $DataRows["class_id"];
      $ClassCode = $DataRows["class_code"];
    if (empty($classCode))
    {
        $_SESSION["ErrorMessage"] = "Please fill out class code";
        Redirect_to("index.php");
    }
    else if ($classCode == $ClassCode)
    {
      $Query = "INSERT INTO users_class(user_id,class_id) VALUES ('$UserId','$ClassId')";
        $Execute = mysqli_query($connection, $Query) or die( mysqli_error($connection));
        if ($Execute)
        {
            $_SESSION["SuccessMessage"] = "Your have enter the class";
            Redirect_to("index.php");
        }
        else
        {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again !";
            Redirect_to("index.php");
        }
        

        
    }
} //Ending of Submit Button If-Condition

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/fontawesome-free-5.11.2-web/css/all.css">
    <link rel="stylesheet" href="asset/css/style.css">

    <title>Main page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>

    <div>
      <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Classroom</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#"><i class="fas fa-user"></i><span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="#"><?php echo $_SESSION['firstname']; ?>
                        <?php echo $_SESSION['lastname']; ?></i><span class="sr-only">(current)</span></a>
            </li>
                <?php if ($_SESSION['user_type'] != "student"){ ?>
                  <li class="nav-item"><a class="nav-link" href="addclass.php">Add a class</a>   </li>                  <?php } ?>
            <?php if ($_SESSION['user_type'] != "student"){ ?>
            <li class="nav-item">
        <a class="nav-link" href="dashboard.php">Dashboard</a>
        </li>
            <?php } ?>
            <li>        <form class="form-inline"action="index.php" method="post">
        <div class="form-group">
                        <input type="text" name="classCode" class="form-control" id="classCode" placeholder="Enter class code">
                        <button type="submit" name="submit" class="btn btn-primary">Join class</button>
                     </div>
        </form>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control" type="search" placeholder="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
          <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
               <a class="nav-link" href="logout.php">Sign out</a>
            </li>
         </ul>
        </div>
      </nav>
    </header>


      <div class="container mt-5">
      <?php
echo ErrorMessage();
echo SuccessMessage();
?>
        <!-- Three columns of text below the carousel -->
        <div class="row row-cols-1 row-cols-md-3">
        <?php
        $uid = $_SESSION['id'];
global $connection;
if ($_SESSION['user_type'] == "admin") {
  $viewQuery = "SELECT * FROM class ORDER BY class_id desc";
}
else if ($_SESSION['user_type'] == "teacher") {
  $viewQuery = "SELECT * FROM class WHERE user_id = '$uid' ORDER BY class_id desc";
} else if ($_SESSION['user_type'] == "student") {

  $viewQuery = "SELECT c.class_id,class_name,thumbnail,subject,room,class_code FROM 
  users u, class c, users_class uc WHERE uc.user_id = u.id AND u.id = '$UserId' AND uc.class_id = c.class_id
  ";
}
$Execute = mysqli_query($connection, $viewQuery);
$SrNo = 0;
while ($DataRows = mysqli_fetch_array($Execute)  or die( mysqli_error($connection)))
{
  $ClassId = $DataRows["class_id"];
  $ClassName = $DataRows["class_name"];
  $Thumbnail = $DataRows["thumbnail"];
  $Subject = $DataRows["subject"];
  $Room = $DataRows["room"];
  $ClassCode = $DataRows["class_code"];
?>
<div class="col mb-4">
<div class="card-deck">
  <div class="card h-100">
    <img src="uploads/<?php echo htmlentities($Thumbnail); ?>" class="card-img-top img-fluid img-thumbnail" alt="...">
    <div class="card-body">
      <h5 class="card-title"><?php echo htmlentities($ClassName); ?></h5>
      <ul class="list-group list-group-flush">
    <li class="list-group-item">Subject: <?php echo htmlentities($Subject); ?></li>
    <li class="list-group-item">Room: <?php echo htmlentities($Room); ?></li>
    <?php if ($_SESSION['user_type'] != "student"){ ?><li class="list-group-item">Class code: <?php echo htmlentities($ClassCode); ?></li>                     <?php } ?>
  </ul>
    </div>
    <div class="card-footer">
    <a rel="noopener noreferrer" target="_blank" href="$" class="btn btn-primary">View class &rarr;</a>
    </div>
</div>
  </div>
        </div>
<?php
} ?>
        </div>

      </div><!-- /.container -->

    


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