<?php
 
$con = mysqli_connect("localhost","root","","register");
if(!$con){
    die('Connection failed');
}

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pswd = $_POST['pswd'];
    $confrim_password = $_POST['confrim_password'];


        $sql_query = "INSERT into signup(username,email,pswd,confrim_password)values('$username','$email','$pswd','$confrim_password');";
        if($pswd==$confrim_password){
			echo "<script> window.location='login.php'</script>";
		}
		else{
			echo "<script>alert('Your password and Confrim Password is not match'); window.location='signup.html'</script>";
		}
        if(mysqli_query($con,$sql_query))
        {
            echo "success";
        }
        else{
            echo "error";
        }
    
    mysqli_close($con);
   
}
?>