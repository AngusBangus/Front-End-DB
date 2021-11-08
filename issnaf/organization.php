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
                while ($row = $result->fetch_assoc()) {  
                    if ($username == $row['organization_name']) {
                        echo "<div style='float:left;width:100%; '>Organization Name already exist!</div>";
                        return; 
                    }     
                }
                echo "<div style='float:left;width:100%; '>'$username', '$url',$loc, '$type');</div>";


                $sql5 =<<<EOF
                SELECT MAX(organization_id) as oMAX FROM organization;
EOF;
                $ret5=$conn->query($sql5);

                while($row5 = $ret5->fetch_assoc()){
                    $orgMax = $row5['oMAX']+1;
                }

                $sql12 =<<<EOF
                INSERT INTO organization (organization_id, organization_name, organization_url, location_id , organization_type) VALUES ($orgMax, '$username','$url', $loc,'$type');
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