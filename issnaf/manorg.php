
<head>
<script>
function showUser(str) {
    var value = str.value;  
    location.replace("getuser.php?q="+value); 
}
</script>
</head>
<!DOCTYPE html>
<html>
<head>
    <title>Select Organization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style = background-color:#528B8B;>
<a href="homepage.php">
<img src="https://www.pinclipart.com/picdir/big/111-1110193_non-partisan-independent-organization-clipart.png" alt="Italian Meeting" width="200">
</a>
    <br><br/>
    <h1 style="text-align:left;float:left;">Add a New Organization</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>


<form><br><br/><br><br/><br><br/>
<label>Organization:</label>    
<select name="users" onchange="showUser(this)">
<option value=''>------- Select Organization name--------</option>

<?php 

  require_once("connect.php");

  $query = "SELECT * FROM organization";

  $result = $conn->query($query);
  $i = 1;

  if ($result !== false && $result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<option value=$i>". $row['organization_name']. "</option>";
        $tots[] = $row;
        $i++;
    }
  } 
?>
  </select>
</form>
<br>
<div id="txtHint"><b>Select an organization to view or edit their data</b></div>

</body>
</html>