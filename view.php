<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
    header('Location: login.php');
}
?>

<?php
//including the database connection file
include_once("connection.php");

//fetching data in descending order (lastest entry first)
$result = mysqli_query($mysqli, "SELECT * FROM products WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<html>
<head>
    <title>Homepage</title>
</head>

<body>
<div >
<nav>
  <h2>Fire-Ice Simple Data entry test site.</h2>
  <ul>
    <li><a href="index.php">Home</a></li>
    <li><a href="add.html">Enter New Data</a></li>
    <li><a href="logout.php">Logout</a></li>
  </ul>
</nav>
</div>
	
<table class="table" >
    <tr class="tr">
        <td>Name</td>
        <td>Quantity</td>
        <td>Price(Rs)</td>
        <td>Update</td>
    </tr>
    <?php
    while($res = mysqli_fetch_array($result)) {		
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['qty']."</td>";
        echo "<td>".$res['price']."</td>";	
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
    }
    ?>
</table>
<style>
    .table{
        margin: 0;
        padding: 0;
        background-color: #fff;
        border:2px solid #ccc;
        border-radius: 25px;
        width:100%;
        height:auto;
        text-align: center;
        font-family: arial;
    }
    .tr{
        border:none;

        padding: 10px;
        text-align: center;
    }
    td{
        border:inline;
        padding: 10px;  
    }
    nav {
  display: flex;
  justify-content:space-between; 
  align-items: center;
  padding: 1rem 2rem;
  background: #fff; 
}

nav ul {
  display: flex;
  list-style: none; 
}

nav li {
  padding-left: 1rem;
  border:2px solid #ccc;
  border-radius: 25px;
  padding:5px;
  background: #5ca1e1;
  cursor: pointer;

}


nav li:hover{
   background-color:lightblue;
}
  
nav a {
  text-decoration: none;
  color: #fff;
}

</style>	
</body>
</html>