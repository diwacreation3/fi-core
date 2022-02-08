<?php session_start(); ?>
<html>
<head>
    <title>Homepage</title>
    <link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div class="content">
    <div id="header">
        Welcome to Fire-Ice Testing Site
    </div>
    <?php
    if(isset($_SESSION['valid'])) {			
        include("connection.php");					
        $result = mysqli_query($mysqli, "SELECT * FROM login");
    ?>				
        Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
        <br/>
        <a class="add" href='view.php'>View and Add client</a>
        <br/><br/>
    <?php	
    } else {
        echo "You must be logged in to view this page.<br/><br/>";
        echo " <button><a href='login.php'>Login</a></button> | <button><a href='register.php'>Register</a></button>";
    }
    ?>
    <div id="footer">
        Created by <a href="http://samarimausam.ml/profile" title="Diwakar Phuyal">Diwakar Phuyal<br>
    For Fire-Ice</a>
    </div>
    </div>
<style>
    button{
        background-color: #5ca1e1;
        border: none;
        color: white;
        padding: 10px 20px;
        text-align: center;
        display: inline-block;
        font-size: 16px;
        margin: 4px 2px;
        cursor: pointer;
        border-radius: 25px;
    }
    button a{
        text-decoration: none;
        color: white;
    }
    button:hover{
        background-color: #ccc;
    }
</style>
</body> 
</html>
