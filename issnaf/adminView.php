<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style = background-color:#528B8B;>
        <img src="https://cdn5.euraxess.org/sites/default/files/styles/news_and_events_details/public/domains/north-america/diaspora_events01.jpg?itok=bAG5fNhX" alt="Italian Org2" width="270" >
  
        <br></br>
    <h1 style="text-align:left;float:left;">Admin Viewer</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>
    <hr style="clear:both;"/>
    <div></div>
    <form action="login.php" method="get">
        <label>Username:</label>
          <input type="text" name="username" >
        <label>Password:</label>
          <input type="password" name="password" >
          <p></p>
          <input type="submit" value="Login">
    </form> 
    <br><br/>
    <a href="change.php">Change Password</a><p>    </p><a href="fulfill.php">View Forgot Password Request</a>
  </body>
</html>