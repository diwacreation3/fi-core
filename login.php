<?php session_start(); ?>
<html>
<head>
    <title>Login</title>
</head>

<body>

<?php
include("connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($mysqli, $_POST['username']);
    $pass = mysqli_real_escape_string($mysqli, $_POST['password']);

    if($user == "" || $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($mysqli, "SELECT * FROM login WHERE username='$user' AND password=md5('$pass')")
        or die("Could not execute the select query.");
		
        $row = mysqli_fetch_assoc($result);
		
        if(is_array($row) && !empty($row)) {
            $validuser = $row['username'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['name'] = $row['name'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "Invalid username or password.";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');			
        }
    }
} else {
?>
     <div class="form">
    <p>Login</p>
    <form name="form1" method="post" action="">
        <table class="table">
                 <p>username</p>
                <input type="text" name="username">
                <p>Password</p>
                <input type="password" name="password">
                <p><input class="submit" type="submit" name="submit" value="Login">
            </p>
            <a class="submit" href="index.php">Home</a>
        </table>
    </form>
    </div>
    <style>
    .form {
        border: 1px solid #ccc;
        background-color: aqua;
        border-radius: 25px;
        padding: 30px 20px;
        margin: 2px auto;
        width: 200px;
        
    }
    .table{
        align-items: center;
        justify-content: center;
        font-family: sans-serif;
        color: black;
        padding-left: 10px;

    }
    p{
        font-family: sans-serif;
        font-size: 20px;
        align-items: center;
        justify-content: center;
    }
    .submit{
        background-color: royalblue;
        border: none;
        color: white;
        padding: 10px 20px;
        text-decoration: none;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 25px;
    }
   
    input{
        border-radius: 25px;
        padding: 10px;

    }


    </style>
<?php
}
?>
</body>
</html>