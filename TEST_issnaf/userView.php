<!DOCTYPE html>
<html>
<head>
    <title>User</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bitnami.css">
</head>
<body style = background-color:#528B8B;>
  <img src="https://cdn5.euraxess.org/sites/default/files/styles/news_and_events_details/public/domains/north-america/diaspora_events01.jpg?itok=bAG5fNhX" alt="Italian Org2" width="270" >
  <br></br>
    <h1 style="text-align:left;float:left;">User Viewer</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>
    <hr style="clear:both;"/>
    <div></div>

    <label>Violator:</label>
          <select name="purge" id="purge">
            <option value=''>------- Select --------</option>


    <?php
        require_once("connect.php");
        //echo "test0\n";
        $query = "SELECT * FROM chapter";
        //echo "test1\n";   
        $result = $conn->query($query);
        //echo "test2\n";
        //$result->execute();
        //echo "test3";

       if ($result !== false && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<option value=''>". $row['chapter_name']. "</option>";
            $tots[] = $row;
        }
       } 
       else {
            echo "0 results";
       }
        echo json_encode($tots);
    ?>

      <label>Violator:</label>
          <select name="purge2" id="ch">
            <option value=''>------- Select --------</option>


    <?php
        require_once("connect.php");
        //echo "test0\n";
        $query = "SELECT * FROM chapter";
        //echo "test1\n";   
        $result = $conn->query($query);
        //echo "test2\n";
        //$result->execute();
        //echo "test3";

       if ($result !== false && $result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<option value=''>". $row['chapter_id']. "</option>";
            $tots[] = $row;
        }
       } 
       else {
            echo "0 results";
       }
        echo json_encode($tots);
    ?>





    <form action="login.php" method="get">
        <label>Username:</label>
          <input type="text" name="username" >
        <label>Password:</label>
          <input type="password" name="password" >
          <p></p>
          <input type="submit" value="Login">
    </form> 
    <br><br/>
    <a href="change.php">Change Password</a>
  </body>
</html>