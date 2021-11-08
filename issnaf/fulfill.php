<!DOCTYPE html>
<html>
<head>
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style = background-color:#528B8B;>
        <a href="homepage.php">
        <img src="https://cdn5.euraxess.org/sites/default/files/styles/news_and_events_details/public/domains/north-america/diaspora_events01.jpg?itok=bAG5fNhX" alt="Italian Org2" width="270" >
        </a>
        <br></br>
    <h1 style="text-align:left;float:left;">Admin Viewer</h1> 
    <?php
    session_start();
    $name = $_SESSION["name"];
    echo "<h2 style='text-align:right;float:right;'>Logged in as: $name</h2>";
    ?>
    <hr style="clear:both;"/>
    <div></div>
    <TABLE BORDER="1" BORDERCOLOR=RED   WIDTH="50%"   CELLPADDING="2" CELLSPACING="3">
    <TR>
      <TH COLSPAN="2"><BR><H3>Password Change Request</H3>
      </TH>
    </TR>
    <TR>
          <TH>Username</TH>
          <TH>New Password</TH>
        </TR>
    <?php
        include 'connect.php';
        $sql =<<<EOF
        SELECT * from account WHERE new_password is not NULL;
EOF;
        $result = $conn->query($sql);
            while ($row = $result->fetch_assoc()) {  
             echo '<TR ALIGN="CENTER">';
             echo "<TD>".$row['user_name']."</TD>";
             echo "<TD>".$row['new_password']."</TD>";
             echo '</TR>';
                
            }

        $conn->close();
    ?>
    </TABLE>
    <br><br/>
    <a href="homepage.php">Admin Viewer Page</a>
  </body>
</html>