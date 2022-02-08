<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Websurfer Registration</title>
</head>
<body>
 <a href="index.php">Home</a>
 <?php
include("connection.php");  

if(isset($_POST['submit'])){
    $name = $_POST['name'];     // name of the user
    $email = $_POST['email'];   // email of the user    
    $user = $_POST['username'];     // username of the user 
    $pass = $_POST['password'];     // password of the user 


    if($name == '' || $email == '' || $user == '' || $pass == ''){
        echo "<script>alert('Please fill all the fields!')</script>";
        exit();
    }
    else{
        // check if the username is already in use
        $check = "SELECT * FROM login WHERE username='$user'";
        $run = mysqli_query($mysqli, $check);

        if(mysqli_num_rows($run) > 0){
            echo "<script>alert('Username already exists, try another one!')</script>";
            exit();
        }
        else{
            $insert = "INSERT INTO login (name, email, username, password) VALUES ('$name', '$email', '$user', '$pass')";
            if(mysqli_query($mysqli, $insert)){
                echo "<script>alert('Registration successful!')</script>";
                echo "<script>window.open('login.php', '_self')</script>";
            }
        }
    }           


}

 ?>   
<div class="form">
        <form name="form1" method="post" action="">
            <table class="table">
                    <p>Name</p>
                   <input type="text" name="name">
                     <p>Email</p>
                    <input type="text" name="email">
                    <p>Username</p>
                    <input type="text" name="username">
                    <p>Password</p>
                    <input type="password" name="password">
                    <input class="submit" type="submit" name="submit" value="Register">
                
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
    
    ?>

</body>
</html>