<!DOCTYPE html>
<html>
<head>
    <title>Adding Member</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bitnami.css">
</head>
<body style = background-color:#528B8B;>
    <img src="https://lh3.googleusercontent.com/proxy/CqbzEq9gmdhgsoF3S7q22OqXTzGqh3fLUCj8iMERzF8beNxZeKJnejT3rPAkSMXJ9BN6tvDMrMvxSONaM38s0-h9Tg" alt="Italian Meeting" width="200" >
    <br><br/>
    <h1 style="text-align:left;float:left;">Add a New Member</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>
    <hr style="clear:both;"/>
    <div></div>
    
    <div></div>
    <form action="addmem.php" method="get">
        <label>First Name:</label>
          <input type="text" name="first" >
        <label>Last Name:</label>
          <input type="text" name="last" >
        <label>Middle Name:</label>
          <input type="text" name="middle" >
        <label>Email:</label>
          <input type="text" name="email" >
          <p></p>
        <label>Phone:</label>
          <input type="text" name="phone" >
        <label>Birthdate:</label>
          <input type="text" name="birthdate" >
        <label>Gender:</label>
          <input type="text" name="gender" >
        <label>Image URL:</label>
          <input type="text" name="imgurl" >
        <label>NA Arrival:</label>
          <input type="text" name="arrive" >
          <p></p>
        <label>NA Depart:</label>
          <input type="text" name="depart" >
        <label>Linkedin:</label>
          <input type="text" name="Linkedin" >
        <label>Researchgate:</label>
          <input type="text" name="Researchgate" >
        <label>Web Page:</label>
          <input type="text" name="WebPage" >
        <label>Specialty Name:</label>
          <input type="text" name="SpecialtyName" >
          <p></p>
          <input type="submit" value="Add Member">
    </form> 
    <br><br/>
    <p></p>
  </body>
</html>