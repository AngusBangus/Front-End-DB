<!DOCTYPE html>
<html>
<head>
<style>
table {
  width: 100%;
  border-collapse: collapse;
}

table, td, th {
  border: 1px solid black;
  padding: 5px;
}

.tab {
  display: inline-block;
    margin-left: 300px;
    }

th {text-align: left;}
</style>
</head>
<body>
<!DOCTYPE html>
<html>
<head>
    <title>Manage Organization</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style = background-color:#528B8B;>
    <img src="https://www.pinclipart.com/picdir/big/111-1110193_non-partisan-independent-organization-clipart.png" alt="Italian Meeting" width="200" >
    <br><br/>
    <h1 style="text-align:left;float:left;">Change Organization Data</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>

<br><br/><br><br/><br><br/>
<?php
$q = ($_GET['q']);

session_start();
$_SESSION['q'] = $q;

require_once("connect.php");

$query = "SELECT * FROM organization where organization_id = ".$q."";

$result = $conn->query($query);

echo "<table>
<tr>
<th>Organization ID</th>
<th>Organization Name</th>
<th>Organization URL</th>
<th>Location ID</th>
<th>Organization Type</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
  echo "<tr>";
  echo "<td>" . $row['organization_id'] . "</td>";
  echo "<td>" . $row['organization_name'] . "</td>";
  echo "<td>" . $row['organization_url'] . "</td>";
  echo "<td>" . $row['location_id'] . "</td>";
  echo "<td>" . $row['organization_type'] . "</td>";
  echo "</tr>";
  $fetid = $row['organization_id'];
  $fetname = $row['organization_name'];
  $feturl = $row['organization_url'];
  $fetloc = $row['location_id'];
  $fettype = $row['organization_type'];

}
echo "</table>";
echo "<br><br/>";
echo "<div></div>";
    echo "<form action='uporg.php?q=$q' method='get' onsubmit='return InsertDefaultValues()'>";
        echo "<label class='tab'>Organization Name:</label>";
            echo "<input type='text' id = name name='name' >";
            echo "<label>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Organization URL:</label>";
            echo "<input type='text' id = url name='url' >"; 
            echo "<label>&emsp;&nbsp;&nbsp;&nbsp;&nbsp;Location ID:</label>";
        echo "<input type='text' id ='location' name='location' >";
        echo "<label>&nbsp;&nbsp;&nbsp;&nbsp;Organization Type:</label>";
        echo " <input type='text' id = 'type' name='type' >";
        echo "<p></p>";
        echo "<input type='submit' value='Add Organization'style='float: right;''>";
        echo "</form>";
        echo "<br><br/>";
        echo "
        <script type='text/javascript'>
function InsertDefaultValues()
{
   // Leave this line as is. Customization follows.
   var FieldsAndDefault = new Array();

   // Customization:
   // For each field that will have custom information is 
   //   submitted blank, use this format:
   //     FieldsAndDefault.push('FieldIDvalue Default value');
   FieldsAndDefault.push('name $fetname');
   FieldsAndDefault.push('url $feturl');
   FieldsAndDefault.push('location $fetloc');
   FieldsAndDefault.push('type $fettype');
   FieldsAndDefault.push('id $fetid');

   // End of customization.
   ///////////////////////////////////////
   for( var i=0; i<FieldsAndDefault.length; i++ )
   {
      FieldsAndDefault[i] = FieldsAndDefault[i].replace(/^\s*/,'');
      var pieces = FieldsAndDefault[i].split(' ');
      var field = pieces.shift();
      var f = document.getElementById(field);
      if( f.value.length < 1 ) { f.value = pieces.join(' '); }
   }
   return true;
}
</script>";
mysqli_close($conn);
?>
</body>
</html>