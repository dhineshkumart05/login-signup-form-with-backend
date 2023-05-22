<?php

$conn_db = mysqli_connect("localhost","root","","register") or die();
if(isset($_POST['change_password']))
{
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confrim_password = $_POST['confrim_password'];

    $sql = "SELECT pswd From signup WHERE  pswd='$old_password'";

    $result = mysqli_query($conn_db,$sql);
    $resultcheck =mysqli_num_rows($result);

		$data_pwd=$resultcheck['pswd'];
		if($data_pwd==$old_password){
		if($new_password==$confrim_password){
			$update_pwd=mysql_query("UPDATE signup set pswd='$new_password' where  pswd='$pswd'");
			echo "<script>alert('Update Sucessfully'); window.location='index.php'</script>";
		}
		else{
			echo "<script>alert('Your new and Retype Password is not match'); window.location='index.php'</script>";
		}
		}
		else
		{
		echo "<script>alert('Your old password is wrong');  window.location='password.php'</script>";
		}}
?>



                         <!-- HTML CONTENT -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>forget password</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="main">
        <form action="password.php" method="post">
            <div><h1>Reset Password</h1></div>
            <div >
                <input type="password" name="old_password" class="box" placeholder="Old Password" required>
            </div>
            <div >
                <input type="password" name="new_password" class="box" placeholder="New Password" required>
            </div>
            <div >
                <input type="password" name="confrim_password" class="box" placeholder="Confrim Password" required>
            </div>
            <div>
                <input type="submit" value="update" class="button" placeholder="update" name="change_password">
            </div>
            <div id="account">
            <p  id="new">new to DK page ?</p><a href="signup.html">Creat a new account</a>
           </div>
        </form>
    </div>
</body>
</html>
