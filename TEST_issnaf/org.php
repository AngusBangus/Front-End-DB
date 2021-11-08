<!DOCTYPE html>
<html>
<head>
    <title>Organization Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bitnami.css">
</head>
<body style = background-color:#528B8B;>
    <img src="https://www.pinclipart.com/picdir/big/111-1110193_non-partisan-independent-organization-clipart.png" alt="Italian Meeting" width="200" >
    <br><br/>
    <h1 style="text-align:left;float:left;">Add a New Organization</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>
    <hr style="clear:both;"/>
    <div></div>
    
    <div></div>
    <form action="organization.php" method="get">
        <label>Organization Name:</label>
          <input type="text" name="name" >
        <label>Organization URL:</label>
          <input type="password" name="url" >
          <p></p>
        <label>Location ID:</label>
          <input type="text" name="location" >
        <label>Organization Type:</label>
          <input type="text" name="type" >
          <p></p>
          <input type="submit" value="Add Organization">
    </form> 
    <br><br/>
    <p></p>
  </body>
</html>