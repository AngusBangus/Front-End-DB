<?php
    function request($username, $url, $loc, $type) {

        include 'connect.php';
        if ($username == "") {
            echo "<div style='float:left;width:100%; '>Please enter a username</div>";
            return;
        }      
        try {
            $sql =<<<EOF
            SELECT * from organization;
EOF;
            $result = $conn->query($sql);
            session_start();
            $q = $_SESSION["q"];
                while ($row = $result->fetch_assoc()) {  
                    if ($username == $row['organization_name'] && $q != $row['organization_id'] ) {
                        echo "<div style='float:left;width:100%; '>Organization Name already exist!</div>";
                        return; 
                    }     
                }
                echo "<div style='float:left;width:100%; '>'$username', '$url',$loc, '$type');</div>";


                
                $sql12 =<<<EOF
                UPDATE `organization` SET `organization_name`='$username',`organization_url`='$url',`location_id`=$loc,`organization_type`='$type' WHERE `organization_id`=$q;
EOF;

                $ret12 = $conn->query($sql12);
                
                
                if(!$ret12) {
                    echo "<div style='float:left;width:100%; '>Organization Name already exist!</div>";

                    echo $conn->lastErrorMsg();
                } else {
                    echo "Records created successfully\n";
                    header("Location: homepage.php"); 
                    exit();
                
                }

            $conn->close();
        }
        catch (Exception $e) {
            echo "<h2 style='width:100%; color:#ffffff;text-align:center;'>Database error!</h2><br/>" . $e;
        }
    }
    // Perform action
    request($_GET["name"], $_GET["url"],$_GET["location"], $_GET["type"]);
?>