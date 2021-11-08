<!DOCTYPE html>
<html>
<head>
    <title>Add Member Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style = background-color:#528B8B;>
    <a href="homepage.php">
    <img src="https://lh3.googleusercontent.com/proxy/ncS5X2DUIbuecMunYD_uRtXil8cUiMdrK2ALR-rKQqf99sZXKlstaXy9oV_XuK-fd8lcvycgf4PQaO8h7Elcv8Rtc1dhWdFf1DRWjBVh0Wg23V4" alt="Italian Meeting" width="200" >
    </a>
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
        <label>Member First Name:</label>
          <input type="text" name="first" >
        <label>Member Last Name:</label>
          <input type="text" name="last" >
          <p></p>
        <label>Discipline ID:</label>
          <input type="text" name="disID">
          <p></p>
          <input type="submit" value="Add Member">
    </form> 
    <br><br/>
    <p></p>
  </body>
</html>