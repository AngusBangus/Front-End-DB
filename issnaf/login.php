<?php

include 'connect.php';

    function login($username, $password) {

        // create connection
        

        if ($username == "") {
            echo "<div style='float:left;width:100%; '>Please enter a username</div>";
            return;
        }      
        try {
            $sql =<<<EOF
            SELECT * from account WHERE user_name = '$username';
EOF;
include 'connect.php';
            $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) {  
                    if ($row['user_type']=='Admin'& $row['password']==$password) {
                        echo "Admin detected 5\n";
                        session_start();
                        $name = $row['user_name'];
                        $_SESSION['name'] = $name;

                        header("Location: homepage.php"); //send to homepage
                        return $row;
                    }
                    elseif($row['user_type']=='Viewer'& $row['password']==$password){
                        echo "Viewer detected 5\n";
                        session_start();
                        $name = $row['user_name'];
                        $_SESSION['name'] = $name;

                        header("Location: viewerHomePage.php"); //send to homepage
                        return $row;
                    }
                    else{
                        echo "User Not Found\n";
                    }
                    
                }

            $conn->close();
        }
        catch (Exception $e) {
            echo "<h2 style='width:100%; color:#ffffff;text-align:center;'>Database error!</h2><br/>" . $e;
        }
    }
    // Perform action
    login($_GET["username"], $_GET["password"]);
?>