<?php
    function request($username, $password) {

        $dbServerName = 'localhost:3308'; //specify the port number 3307 where the phpmyadmin listen to
        $user = 'root';
        $pass = '';
        $db = 'testbd';

        // create connection
        $conn = new mysqli($dbServerName, $user, $pass, $db);

        if ($username == "") {
            echo "<div style='float:left;width:100%; '>Please enter a username</div>";
            return;
        }      
        try {
            $sql =<<<EOF
            SELECT * from account WHERE user_name = '$username';
EOF;
            $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {  
                    $sql2 =<<<EOF
                    UPDATE account SET password ='$password' WHERE user_name = '$username';
EOF;
                    $result2 = $conn->query($sql2);
                    header("Location: fill.php"); 
                    exit();      
                }

            $conn->close();
        }
        catch (Exception $e) {
            echo "<h2 style='width:100%; color:#ffffff;text-align:center;'>Database error!</h2><br/>" . $e;
        }
    }
    // Perform action
    session_start();
    $name = $_SESSION["name"];
    request($name, $_GET["newPass"]);
?>