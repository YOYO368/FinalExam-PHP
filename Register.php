<?php
 
    if(isset($_POST['register_btn']))
    {
        require('../database.php');
	    global $connection;

        $userId = $_POST['userId'];
        $password = $_POST['password'];
        $password2 = $_POST['password2'];
		$email = $_POST['email'];
		$phonenumber = $_POST['phone'];

        if($userId == "")
        {
           echo "<script>alert('You have to input username');</script>";
        }
        else if($email == "")
        {
            echo "<script>alert('You have to input email address');</script>";
        }
        else if($password == "")
        {
           echo "<script>alert('You have to input password');</script>";
        }
        else if($password2 == "")
        {
           echo "<script>alert('You have to input confirm password');</script>";
        }
        else
        {  
            $query = "Select customerId from tbcustomer where customerId = '" .$userId. "';";
	
			$result = mysqli_query($connection, $query);
             if ($result = $mysqli->query($query)) {
                while ($row = $result->fetch_assoc()) {
                    $User_Name = $row['customerId'];
 
                    if($User_Name == $userId) 
                    {
                        $_SESSION['message'] = "'$userId' is already exist";
                        $mysqli->close();
                        header("Location: Index.php");
                        exit();
                    }
                }
            }
            if($password == $password2)
            {
                $sql = "INSERT INTO user_info(customerId, customerPassword, email,phoneNumber) VALUES('$userId','$password','$email','$phonenumber')";
                $result = mysqli_query($connection, $query);
                $mysqli->close();
                if (!$result) {
                    echo "<div id='error_msg'>". $con->error."</div>";
                    exit();
                }
                else
                {
                    $_SESSION['message'] = "Register success !!!!!!!!!!!!!";
                    header("Location: Login.php");
                }
            }
            else
            {
                $mysqli->close();
                echo "<script>alert('The two passwords do not match. Try to check again');</script>";
            }  
        }
     }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Register </title>
    <link rel="stylesheet" type="text/css" href="MainPageStyle.css">
</head>
<body class="body1">
    <div class="header">
        <h1> Register </h1>
    </div>
    <?php
		if(isset($_SESSION['message'])){
            $msg=$_SESSION['message'];
            echo "<div id='error_msg'>".$msg."</div>";
			unset($_SESSION['message']);
		}
	?>
    <form class="form1" method="post" action="Register.php">
        <table>
            <tr>
                <td colspan="2">User ID:</td>
                <td><input type="text" name="userId" class="textInput"></td>
            </tr>
            <tr>
                <td colspan="2">Password:</td>
                <td><input type="password" name="password" class="textInput"></td>
            </tr>
            <tr>
                <td colspan="2">Password again:</td>
                <td><input type="password" name="password2" class="textInput"></td>
            </tr>
			<tr>
                <td colspan="2">Email:</td>
                <td><input type="text" name="email" class="textInput"></td>
            </tr>
			<tr>
                <td colspan="2">PhoneNumber:</td>
                <td><input type="text" name="phone" class="textInput"></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><input type="submit" name="register_btn" value="Register" style="padding:15px 25px;border:none;background-color: lightpink;color: black;margin-top: 40px;"></td>
            </tr>
        </table>
    </form>
</body>
</html>