 <?php
$con = mysqli_connect("localhost","root","","register") or die(mysqli_error());
session_start();

include("dp.php");

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];

    if(!empty($email) || !empty($pswd))
    {
        $sql = "SELECT*From signup WHERE email='$email' AND pswd='$pswd'";
        $result = mysqli_query($con,$sql);

        if($result && mysqli_num_rows($result) > 0)
        {
            $user_data = mysqli_fetch_assoc($result);

            if($user_data['pswd'] == $pswd)
            {
                header("location:index.php");
                die;

            }
        }
        else{
            echo "Email or Password Incorrect";
        }
    }
    else{
        echo "Email or Password Incorrect";
    }
}
?>



                     <!-- HTML CONTENT -->




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <div class="main">
        <form action="login.php" method="post">
            <div><h1>log in</h1></div>
            <div>
              <input type="email" name="email"  class="box" placeholder="Email ID">
            </div>
            <div >
                <input type="password" name="pswd" class="box" placeholder="Password"><br>
                <a href="password.php">forget password ?</a>
            </div>

            <div>
                <input type="submit" value="log in"class="button" placeholder="Log in" name="submit">
            </div>
           <div id="account">
            <p  id="new">new to DK page ?</p><a href="signup.html">Creat a new account</a>
           </div>
           
        </form>
    </div>
</body>
</html>