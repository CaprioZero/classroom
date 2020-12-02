<?php require_once ("config/db.php"); ?>
<?php require_once ("config/redirector.php"); ?>
<?php require_once ("config/checklogin.php"); ?>
<?php require_once ("config/messages.php"); ?>
<?php Confirm_login(); ?>
<?php
// SELECT * FROM `posts` WHERE class_id ='5'
$PostIdFromGet = $_GET["id"];
global $connection;
if (isset($_GET["submit"]))
{
  $Query = "SELECT * FROM posts WHERE class_id='$PostIdFromGet' ORDER BY class_id desc";
$run = mysqli_query($connection, $Query);
$DataRows = mysqli_fetch_array($run);
  $PostId = $DataRows["post_id"];
   $Comment = $_GET["commentArea"];
   $Commenter = $_SESSION['firstname'] ." ". $_SESSION['lastname'];
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $CurrentTime = time();
    $DateTime = strftime("%d-%m-%Y %H:%M:%S", $CurrentTime);
    $DateTime; 
    if (empty($Comment))
    {
        $_SESSION["ErrorMessage"] = "Please enter comment";
        header("Location: infoclass.php?id=$PostIdFromGet");
    }
    else
    {
        // Query to insert category in DB When everything is fine
        
        $Query = "INSERT INTO comments(commenter,datetime,content,posts_id) VALUES ('$Commenter','$DateTime','$Comment','$PostId')";
        $Execute = mysqli_query($connection, $Query) or die( mysqli_error($connection));
        if ($Execute)
        {
            $_SESSION["SuccessMessage"] = "Comment added Successfully";
            header("Location: infoclass.php?id=$PostIdFromGet");
        }
        else
        {
            $_SESSION["ErrorMessage"] = "Something went wrong. Try Again !";
            header("Location: infoclass.php?id=$PostIdFromGet");
        }
    }
} //Ending of Submit Button If-Condition

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="stylesheet" href="asset/fontawesome-free-5.11.2-web/css/all.css">
  <link rel="stylesheet" href="asset/css/style.css">
  

  <?php

global $connection;
$viewQuery = "SELECT * FROM class WHERE class_id='$PostIdFromGet'";
$Execute = mysqli_query($connection, $viewQuery);
while ($DataRows = mysqli_fetch_array($Execute))
{
    $ClassTitle = $DataRows["class_name"];
?>
      <title><?php echo htmlentities($ClassTitle); ?></title>
      <?php
} ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="background-inclass">
    <div class="top ">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">Classroom</a>
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
          </ul>

        </div>
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
               <a class="nav-link" href="logout.php">Sign out</a>
            </li>
         </ul>
      </nav>
    </div>

    <div class="mid mg-t">
      <div class="container">
      <?php
echo ErrorMessage();
echo SuccessMessage();
?>
        <div class="row">





      <div class="col-md-8 col-xs-12 settings mb-5">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            
  
            <div class="list-group mb-5">
              <a href="#" class="list-group-item list-group-item-action oranges">
               <i class="fas fa-map"></i></i> Stream
             </a>
             <?php
global $connection;
$viewQuery = "SELECT * FROM posts WHERE class_id='$PostIdFromGet' ORDER BY post_id desc";
$Execute = mysqli_query($connection, $viewQuery);
while ($DataRows = mysqli_fetch_array($Execute))
{
    $PostId = $DataRows["post_id"];
    $Author = $DataRows["author"];
    $DateTime = $DataRows["datetime"];
    $Content = $DataRows["content"];
    $File = $DataRows["file"];
?>
             <div class="card text-center mb-5">
  <div class="card-header">
  <?php echo htmlentities($Author); ?><br><?php echo htmlentities($DateTime); ?>
  </div>

  <div class="card-body">
    <p class="card-text"><?php echo htmlentities($Content); ?></p>
    <?php         if (!empty($File))
        {?><a href="uploads/<?php echo $File; ?>" class="btn btn-primary" download>Download</a> <?php }?>

  </div>
  <div class="card-footer text-muted">
  <form class="" action="infoclass.php?id=<?php echo $PostIdFromGet; ?>" method="get" enctype="multipart/form-data">
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($PostIdFromGet, ENT_QUOTES); ?>" />
										<textarea name="commentArea" id="commentArea" placeholder="Add class comment..." ></textarea>
										<button type="submit" name="submit" class="btn btn-success green"><i class="fa fa-share"></i> Send</button>
                  </form>

                  <?php
$commentQuery = "SELECT * FROM comments WHERE posts_id='$PostId' ORDER BY id desc";
$dothis = mysqli_query($connection, $commentQuery);
while ($DataRows = mysqli_fetch_array($dothis))
{
    $CommentId = $DataRows["id"];
    $Commenter = $DataRows["commenter"];
    $CommentDateTime = $DataRows["datetime"];
    $Content = $DataRows["content"];
?>


        <p class="lead">User: <?php echo $Commenter; ?></p>
        <p class="small">Comment at: <?php echo $CommentDateTime; ?></p>
        <p>Said: <?php echo $Content; ?></p>



<?php } ?>
  </div>
</div>
<?php
} ?>




          </div>
        </div>
      </div>
    </div>









  </div>
</div>
</div>
</div>
</div>
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