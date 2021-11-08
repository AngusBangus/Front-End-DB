<?php
    function request($username, $url, $loc, $type) {

        $dbServerName = 'localhost:3306'; //specify the port number 3307 where the phpmyadmin listen to
        $user = 'root';
        $pass = '';
        $db = 'testdb';

        // create connection
        $conn = new mysqli($dbServerName, $user, $pass, $db);

        if ($username == "") {
            echo "<div style='float:left;width:100%; '>Please enter a username</div>";
            return;
        }      
        try {
            $sql =<<<EOF
            SELECT * from person;
EOF;
            $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {  
                    if ($username == $row['first_name']) {
                        echo "<div style='float:left;width:100%; '>First Name already exist!</div>";
                        return; 
                    }     
                }
                echo "<div style='float:left;width:100%; '>'$username', '$url',$loc, '$type');</div>";


                $sql5 =<<<EOF
                SELECT MAX(person_id) as oMAX FROM person;
EOF;
                $ret5=$conn->query($sql5);

                while($row5 = $ret5->fetch_assoc()){
                    $orgMax = $row5['oMAX']+1;
                }

                $sql12 =<<<EOF
                INSERT INTO person (person_id, first_name, last_name, middle_name , primary_email, primary_phone, birthday, gender, image_url, na_arrival, na_departure, linkedin_page, researchgate_page,web_page,specialty_name) VALUES ($orgMax, '$username','$url', $loc,'$type');
EOF;

                $ret12 = $conn->query($sql12);
                
                
                if(!$ret12) {
                    echo "<div style='float:left;width:100%; '>Person already exist!</div>";

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
    request($_GET["first"], $_GET["last"],$_GET["middle"], $_GET["email"], $_GET["phone"], $_GET["birthdate"], $_GET["imgurl"], $_GET["arrive"], $_GET["depart"], $_GET["Linkedin"], $_GET["Researchgate"], $_GET["WebPage"], $_GET["SpecialtyName"]);
?>