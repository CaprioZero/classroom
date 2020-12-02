<?php require_once ("config/db.php"); ?>
<?php require_once ("config/redirector.php"); ?>
<?php require_once ("config/checklogin.php"); ?>
<?php require_once ("config/messages.php"); ?>
<?php Confirm_login(); ?>
<?php $ClassId = $_GET["cid"]; ?>
<?php
if (isset($_GET["uid"]) AND isset($_GET["cid"]))
{
    global $connection;
    $DeleteId = $_GET["uid"];
    $viewQuery = "DELETE FROM users_class WHERE user_id='$DeleteId'";
    $Execute = mysqli_query($connection, $viewQuery);
    if ($Execute)
    {
        $_SESSION["SuccessMessage"] = "Delete Student From Class Successfully! ";
        header("Location: studentlist.php?cid=$ClassId");
    }
    else
    {
        $_SESSION["ErrorMessage"] = "Something Went Wrong. Try Again !";
        header("Location: studentlist.php?cid=$ClassId");
    }
}
?>
