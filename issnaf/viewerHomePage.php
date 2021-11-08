<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

body {
  margin: 0;
  font-family: Arial, Helvetica, sans-serif;
}
.topnav {
  overflow: hidden;
  background-color: #e9e9e9;
}

.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}

.topnav .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.topnav .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .topnav .search-container {
    float: none;
  }
  .topnav a, .topnav input[type=text], .topnav .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .topnav input[type=text] {
    border: 1px solid #ccc;  
  }
}
/* The grid: Three equal columns that floats next to each other */
.column {
  float: left;
  width: 100%;
  padding: 50px;
  text-align: center;
  font-size: 25px;
  cursor: pointer;
  color: white;
}

.containerTab {
  padding: 20px;
  color: white;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Closable button inside the container tab */
.closebtn {
  float: right;
  color: white;
  font-size: 35px;
  cursor: pointer;
}
</style>
</head>
<body>
<div class="topnav">

  <a class="active" href="fill.php">Member</a>
  <a href="change.php">Change Password</a>
 

  
 
 
  <div class="search-container">
    <form method = "post">
      <input type="text" placeholder="Search.." name="search">
      <input type="submit" name="submit">
    </form>
  </div>
</div>
<?php
include 'connect.php';
if(isset($_POST["submit"])){
  $Key = $_POST["search"];
  $sql = "SELECT * FROM `chapter` WHERE `chapter_name` LIKE '%$Key%'";
  $result = $conn->query($sql);
  while ($row = $result->fetch_assoc()) {  
    
    echo "<p>".$row['chapter_id']."</p>";
    echo "<p>".$row['chapter_name']."</p>";
    
       
   }
  
}
?>
<title>ISSNAF30 HomePage</title>

<div style="text-align:center">
  <h2>ISSNAF Databse</h2>
  <p>Click on the table name to expand information</p>
</div>

<h1 style="text-align:left;float:left;">Admin Viewer</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>

<!-- Three columns -->
<div class="row">
  <div class="column" onclick="openTab('b1');" style="background:green;">
    Chapter Table
  </div>
  <div class="column" onclick="openTab('b2');" style="background:blue;">
    Discipline Table
  </div>
  <div class="column" onclick="openTab('b3');" style="background:red;">
    Location Table
  </div>
  <div class="column" onclick="openTab('b4');" style="background:orange;">
    Education Table
  </div>
  <div class="column" onclick="openTab('b5');" style="background:green;">
    Organization Table
  </div>
  <div class="column" onclick="openTab('b6');" style="background:blue;">
    Skill Table
  </div>
  <div class="column" onclick="openTab('b7');" style="background:red;">
    Person Table
  </div>
</div>

<!-- Full-width columns: (hidden by default) -->
<div id="b1" class="containerTab" style="display:none;background:green">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Chapter</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="2"><BR><H3>Chapter table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#FF0000";>Chapter ID</TH>
          <TH style="color:#FF0000";>Chapter Name</TH>
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM chapter";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['chapter_id']. "</TH>";
            echo"<TH>". $row['chapter_name']. "</TH>";
        }
       } 
    ?>    
    </TABLE>
</div>

<div id="b2" class="containerTab" style="display:none;background:blue">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Box 2</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="4"><BR><H3>Chapter table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#FF0000";>Discipline ID</TH>
          <TH style="color:#FF0000";>Discipline Full Name</TH>
          <TH style="color:#FF0000";>Discipline Branch</TH>
          <TH style="color:#FF0000";>Discipline Area</TH>
          
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM discipline";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['discipline_id']. "</TH>";
            echo"<TH>". $row['discipline_full_name']. "</TH>";
            echo"<TH>". $row['discipline_branch']. "</TH>";
            echo"<TH>". $row['discipline_area']. "</TH>";
        }
       } 
    ?>    
    </TABLE>
</div>

<div id="b3" class="containerTab" style="display:none;background:red">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Box 3</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="5"><BR><H3>Location table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#0000FF";>Location ID</TH>
          <TH style="color:#0000FF";>City</TH>
          <TH style="color:#0000FF";>State</TH>
          <TH style="color:#0000FF";>Zip Code</TH>
          <TH style="color:#0000FF";>Country</TH>
          
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM location";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['location_id']. "</TH>";
            echo"<TH>". $row['city']. "</TH>";
            echo"<TH>". $row['state']. "</TH>";
            echo"<TH>". $row['zip_code']. "</TH>";
            echo"<TH>". $row['country']. "</TH>";
        }
       } 
    ?>    
    </TABLE>
</div>
<div id="b4" class="containerTab" style="display:none;background:orange">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Education</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="9"><BR><H3>Education table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#FF0000";>Person ID</TH>
          <TH style="color:#FF0000";>Organization ID</TH>
          <TH style="color:#FF0000";>Institute</TH>
          <TH style="color:#FF0000";>Department</TH>
          <TH style="color:#FF0000";>Degree</TH>
          <TH style="color:#FF0000";>Degree_spec</TH>
          <TH style="color:#FF0000";>Start Date</TH>
          <TH style="color:#FF0000";>End Date</TH>
          <TH style="color:#FF0000";>id</TH>
          
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM education";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['person_id']. "</TH>";
            echo"<TH>". $row['organization_id']. "</TH>";
            echo"<TH>". $row['institute']. "</TH>";
            echo"<TH>". $row['department']. "</TH>";
            echo"<TH>". $row['degree']. "</TH>";
            echo"<TH>". $row['degree_spec']. "</TH>";
            echo"<TH>". $row['start_date']. "</TH>";
            echo"<TH>". $row['end_date']. "</TH>";
            echo"<TH>". $row['id']. "</TH>";
        }
       } 
    ?>    
    </TABLE>
</div>
<div id="b5" class="containerTab" style="display:none;background:green">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Organization Table</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="5"><BR><H3>Organization table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#0000FF";>Organization ID</TH>
          <TH style="color:#0000FF";>Organization Name</TH>
          <TH style="color:#0000FF";>Organization URL</TH>
          <TH style="color:#0000FF";>Location ID</TH>
          <TH style="color:#0000FF";>Organization Type</TH>
          
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM organization";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['organization_id']. "</TH>";
            echo"<TH>". $row['organization_name']. "</TH>";
            echo"<TH style = 'max-width: 800px'>". $row['organization_url']. "</TH>";
            echo"<TH>". $row['location_id']. "</TH>";
            echo"<TH>". $row['organization_type']. "</TH>";
        }
       } 
    ?>    
    </TABLE>
</div>
<div id="b6" class="containerTab" style="display:none;background:blue">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Skill</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="2"><BR><H3>Skill table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#FF0000";>Person ID</TH>
          <TH style="color:#FF0000";>Skill</TH>
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM skill";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['person_id']. "</TH>";
            echo"<TH>". $row['skill_text']. "</TH>";
        }
       } 
    ?>    
    </TABLE>
</div>
<div id="b7" class="containerTab" style="display:none;background:red">
  <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>
  <h2>Person</h2>
  <TABLE BORDER="1" BORDERCOLOR=BLACK   WIDTH="100%"   CELLPADDING="1" CELLSPACING="1">
    <TR>
      <TH COLSPAN="21"><BR><H3>Person Table</H3>
      </TH>
    </TR>
    <TR>
          <TH style="color:#0000FF";>Person ID</TH>
          <TH style="color:#0000FF";>First Name</TH>
          <TH style="color:#0000FF";>Last Name</TH>
          <TH style="color:#0000FF";>Middle Name</TH>
          <TH style="color:#0000FF";>Full Name</TH>
          <TH style="color:#0000FF";>Primary Email</TH>
          <TH style="color:#0000FF";>Primary Phone</TH>
          <TH style="color:#0000FF";>Birthdate</TH>
          <TH style="color:#0000FF";>Gender</TH>
          <TH style="color:#0000FF";>Image URL</TH>
          <TH style="color:#0000FF";>na_arrival</TH>
          <TH style="color:#0000FF";>na_deperature</TH>
          <TH style="color:#0000FF";>Linkedin</TH>
          <TH style="color:#0000FF";>ResearchGate</TH>
          <TH style="color:#0000FF";>Webpage</TH>
          <TH style="color:#0000FF";>Specialty</TH>
          <TH style="color:#0000FF";>LI</TH>
          <TH style="color:#0000FF";>Dicsipline_id</TH>
          <TH style="color:#0000FF";>Profile ID</TH>
          <TH style="color:#0000FF";>Dispora ID</TH>
          <TH style="color:#0000FF";>Timestamp</TH>
          
        </TR>
        <?php
        require_once("connect.php");
        $query = "SELECT * FROM person";
        $result = $conn->query($query);

       if ($result !== false && $result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<TR ALIGN='CENTER'>";
            echo"<TH>". $row['person_id']. "</TH>";
            echo"<TH>". $row['first_name']. "</TH>";
            echo"<TH>". $row['last_name']. "</TH>";
            echo"<TH>". $row['middle_name']. "</TH>";
            echo"<TH>". $row['full_name']. "</TH>";
            echo"<TH>". $row['primary_email']. "</TH>";
            echo"<TH>". $row['primary_phone']. "</TH>";
            echo"<TH>". $row['birthdate']. "</TH>";
            echo"<TH>". $row['gender']. "</TH>";
            echo"<TH>". $row['iamge_url']. "</TH>";
            echo"<TH>". $row['na_arrival']. "</TH>";
            echo"<TH>". $row['na_departure']. "</TH>";
            echo"<TH>". $row['linkedin_page']. "</TH>";
            echo"<TH>". $row['researchgate_page']. "</TH>";
            echo"<TH>". $row['web_page']. "</TH>";
            echo"<TH>". $row['specialty_name']. "</TH>";
            echo"<TH>". $row['li_description']. "</TH>";
            echo"<TH>". $row['discipline_id']. "</TH>";
            echo"<TH>". $row['profile_id']. "</TH>";
            echo"<TH>". $row['disapora_id']. "</TH>";
            echo"<TH>". $row['linkedin_timestamp']. "</TH>";
            
            
            
        }
       } 
    ?>    
    </TABLE>
</div>
<script>
function openTab(tabName) {
  var i, x;
  x = document.getElementsByClassName("containerTab");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  document.getElementById(tabName).style.display = "block";
}
</script>

</body>
</html> 