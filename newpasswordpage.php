<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Passwoord reset</title>
    <!-- jQuery + Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</head>

<body>
<?php

require_once 'config/db.php';
?>
    <!-- Header -->
    <?php include('header.php'); ?>
    <?php

$email = $_GET["email"];
$reset_token = $_GET["reset_token"];

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($connection, $sql);
if (mysqli_num_rows($result) > 0)
{
	$user = mysqli_fetch_object($result);
	if ($user->reset_token == $reset_token)
	{
		?>
    <!-- Login form -->
    <div class="App">
        <div class="vertical-center">
            <div class="inner-block">

                <form action="controllers/new-password.php" method="post">
                    <h3>Reset password</h3>
                    <input type="hidden" name="email" value="<?php echo $email; ?>">
			        <input type="hidden" name="reset_token" value="<?php echo $reset_token; ?>">
                    <div class="form-group">
                        <label>Enter new password</label>
                        <input type="password" class="form-control" name="password1"/>
                    </div>

                    <button type="submit" class="btn btn-outline-primary btn-lg btn-block">Reset password</button>
                </form>
            </div>
        </div>
    </div>
    <?php
	}
    else
	{
		echo "Recovery email has been expired";
	}
}
else
{
	echo "Email does not exists";
}
?>
</body>

</html>