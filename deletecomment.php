<?php require_once ("config/db.php"); ?>
<?php require_once ("config/redirector.php"); ?>
<?php require_once ("config/checklogin.php"); ?>
<?php require_once ("config/messages.php"); ?>
<?php Confirm_login(); ?>
<?php
if (isset($_GET["id"]))
{
    global $connection;
    $DeleteId = $_GET["id"];
    $viewQuery = "DELETE FROM comments WHERE id='$DeleteId'";
    $Execute = mysqli_query($connection, $viewQuery);
    if ($Execute)
    {
        $_SESSION["SuccessMessage"] = "Comment Deleted Successfully! ";
        Redirect_to("commentdashboard.php");
    }
    else
    {
        $_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
        Redirect_to("commentdashboard.php");
    }
}
?>
